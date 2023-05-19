<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;

use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use Model\Managers\CategoryManager;
use Model\Managers\UserManager;
 class SecurityController extends AbstractController implements ControllerInterface
 {
   

     
     public function inscription()
     {
         $user = new UserManager(); // new instance [ UserManager ]
         
         
         if(isset($_POST["inscription"])) // GET , POST ( POST ) login.php [$_POST]
         {
             $pseudo=filter_input(INPUT_POST,'pseudo',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
             $motDePasse=filter_input(INPUT_POST,'password1',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $motDePasseConfirmation=filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             
             if($pseudo && $email && $motDePasse && $motDePasseConfirmation)
             {
                 if(!$user->trouverEmail($email))/*si l'email n'existe pas */
                 {
                     if(!$user->trouverPseudo($pseudo))/*si le pseudo  n'est pas utilisé */
                     {
                         if( $motDePasse == $motDePasseConfirmation )
                         {
                             $motDePasse=password_hash($motDePasse,PASSWORD_DEFAULT); // hashaage mot de passe ( MD5 , Bcrypt ....) 
                             /*on ajoute le user */
                             if($user->add([
                                 "pseudo"=>$pseudo,
                                 "email"=>$email,
                                 "password"=>$motDePasse,
                                 "role"=>"User"]))
                                 {
                                     $session['inscription']="inscrition réussite";
                                    }
                                    else
                                    {
                                      $session['inscription']="erreur d'inscription";
                                    }/*fin id user->add */
                                    
                        }
                        else
                        {
                                    $session['message']="les mots de passes ne sont pas identiques";
                                    return [
                                        "view" => VIEW_DIR . "security/accueil.php",];
                        }/*fin mot de passe identique*/
                    }
                    else
                    {
                        $session['message']="pseudo existe déja";
                    }/*fin pseudo*/
        }
        else
        {
            $session['message']="pseudo email déja";
        }/*fin id user->add */
    }
    }/*fin if */
    return ["view" => VIEW_DIR . "security/accueil.php",];
    }


    public function connexion(){


        $session = new Session();

        $userManager = new UserManager();


        if (isset($_POST['connexion'])){

            // action connexion

            $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_FULL_SPECIAL_CHARS); ;
            $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ( $email && $password ){

              
                if ( $user = $userManager->trouverEmail( $email ) ){ // Class User ( Entity ) 
                    // user existe 
                 
                    // var_dump($user);
                    // die("user data");
                     if (password_verify(  $password ,$user->getPassword())){
                           // die("existe");


                           // user sauvgarder session
                           $session->setUser($user);


                            return ["view" => VIEW_DIR . "security/profile.php",];
                     }else{ // password ghalta
                        //die("n'existe pas password ghalta");
                        $session['message'] = "Password Invalid";
                        return ["view" => VIEW_DIR . "security/accueil.php",];
                     }
                   

                }else{ // User NUll email ghalet 
                    // user n'existe pas ( wrong credentials )
                    //die("n'existe pas email ghalet");
                    $session['message'] = "Email Invalid";
                    return ["view" => VIEW_DIR . "security/accueil.php",];
                }

            }else{
                $session['message'] = "les input invalide";
                return ["view" => VIEW_DIR . "security/accueil.php",];
            }

        }
       
        // 
      



    }

    public function deconnexion(){

        $session = new Session();
        unset($_SESSION['user']);
        $session->addFlash("success","Deconnexion");
        

        return ["view" => VIEW_DIR . "security/accueil.php",];

        
    }



 }