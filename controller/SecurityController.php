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
         $user=new UserManager();
         
         if(isset($_POST["inscription"]))
         {
             $pseudo=filter_input(INPUT_POST,'pseudo',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
             $motDePasse=filter_input(INPUT_POST,'password1',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             $motDePasseConfirmation=filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             
             if($pseudo && $email && $motDePasse && $motDePasseConfirmation)
             {
                 if(!$user->trouverEmail($email))/*si l'email n'existe pas */
                 {
                     if(!$pseudo->trouverPseudo($pseudo))/*si le pseudo  n'est pas utilisé */
                     {
                         if($motDePasse==$motDePasseConfirmation)
                         {
                             $motDePasse=password_hash($motDePasse,PASSWORD_DEFAULT);
                             /*on ajoute le user */
                             if($user->add([
                                 "pseudo"=>$pseudo,
                                 "email"=>$email,
                                 "password"=>$motDePasse,
                                 "role"=>"User"
                                 ]))
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
return [
    "view" => VIEW_DIR . "security/accueil.php",];
}
 }