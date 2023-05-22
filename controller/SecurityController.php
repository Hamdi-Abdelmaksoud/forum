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
         $session=new Session();
         
         
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
                                    $session->addFlash("success","inscription réussite ");
                                    }
                                    else
                                    {
                                        $session->addFlash("error","probléme d'inscription");
                                    }/*fin id user->add */
                                    
                        }
                        else
                        {
                            $session->addFlash("error","les mots de passe ne sont pas identiques");
                                    return [
                                        "view" => VIEW_DIR . "security/accueil.php",];
                        }/*fin mot de passe identique*/
                    }
                    else
                    {
                        $session->addFlash("error","pseudo déja utilisé");
                    }/*fin pseudo*/
        }
        else
        {
            $session->addFlash("error","email déja utilisé");
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

                           $session->addFlash("success", "Connexion réussi ! Bienvenue " . Session::getUser()->getPseudo());
                            return ["view" => VIEW_DIR . "security/profile.php",];
                     }else{ 
                        $session->addFlash("error","le mot de passe n'est pas bon !");
                        return ["view" => VIEW_DIR . "security/accueil.php",];
                     }
                   

                }else{ 
                    $session->addFlash("error","cet email n'existe pas !");
                    return ["view" => VIEW_DIR . "security/accueil.php",];
                }

            }else{
                $session->addFlash("error","les inputs invalides ");
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


 
    public function showEditPasswordForm(){
        return[
            "view" => VIEW_DIR . "security/editPassword.php"
        ];
    }
    public function editPassword(){
      
        $userManager = new userManager();
        $topicManager = new TopicManager();
        $postManager = new PostManager();
        $session = new Session();
 
        if(isset($_POST["btn_edit"])){ // button cliquer
            
           
            $old_pass = filter_input(INPUT_POST, "old_pass", FILTER_SANITIZE_EMAIL);
            $new_pass = filter_input(INPUT_POST, "new_pass", FILTER_SANITIZE_SPECIAL_CHARS);
            $confirm_pass = filter_input(INPUT_POST, "confirm_pass", FILTER_SANITIZE_SPECIAL_CHARS);

            
            if($old_pass && $new_pass && $confirm_pass){

                // get password connected user

                $passwordConnectedUser = $userManager->getUserPassword(Session::getUser()->getId())->getPassword();
                // Comparaison anc pass , current pass

                if (  password_verify( $old_pass,$passwordConnectedUser ) ){
                    // comparaison new , confirm

                    if ($new_pass  == $confirm_pass){
                        // modification de mot passe
                        // hashage mot de passe
                        $hash_pass = password_hash($new_pass,PASSWORD_DEFAULT);

                        // update password
                        $userManager->updatePassword($hash_pass);
                        $session->addFlash("success","Mot de passe modifie avec succes");
                        $this->redirectTo("security", "showEditPasswordForm");

                    }else{
                        $session->addFlash("error","le 2 mots de passe ne sont pas identiques");
                    $this->redirectTo("security", "showEditPasswordForm");
                    }
                   

                }else{
                    $session->addFlash("error","Ancienne mot de passe errone");
                    $this->redirectTo("security", "showEditPasswordForm");
                }


               
                return[
                    "view" => VIEW_DIR . "security/editPassword.php"
                ];
            }
          
        }
        else{
            $session->addFlash("error", "Échec de la modification du mot de passe !");
            $this->redirectTo("security", "showEditPasswordForm");
        }
    }



 }


 