<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Entities\Topic;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use Model\Managers\CategoryManager;
use Model\Managers\UserManager;

class ForumController extends AbstractController implements ControllerInterface
{

    public function index()
    {


        $topicManager = new TopicManager();

        return [
            "view" => VIEW_DIR . "forum/listTopics.php",
            "data" => [
                "topics" => $topicManager->findAll(["publishDate", "DESC"])
            ]
        ];
    }


    public function listCategories()
    {
        $categoryManager = new CategoryManager();

        return [
            "view" => VIEW_DIR . "forum/listCategories.php",
            "data" => [
                "categories" => $categoryManager->findAll()


            ]
        ];
    
    }
    public function listPostsTopic()
    {
        $post=new PostManager();
        $topic= new TopicManager();
        $id=filter_input(INPUT_GET,"id",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        return[
            "view"=>VIEW_DIR."forum/listPOstsTopic.php",
            "data"=>[
                "posts"=>$post->findPostsByTopic($id)
            ] ];
    }

}
