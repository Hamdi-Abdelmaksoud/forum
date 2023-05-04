<?php
namespace Controller;
use app\Session;
use app\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\CategoryManager;
use Model\Managers\UserManager;

class CategoryController extends AbstractController implements ControllerInterface{
    public function index(){
        $catrgoryManager=new CategoryManager();
        $userManager =new UserManager();
        if(!empty($_SESSION["user"]))
        {
            $userConnectedRoleFromBdd="notConnected";
        
        }
        return [
            "view"=>VIEW_DIR."forum/listCategories.php",
            "data"=>[
                "categories"=>$catrgoryManager->findAllAndCount(),
                "userConnectedRoleFromBdd"=>$userConnectedRoleFromBdd

            ]
            ];

    }
}

?>