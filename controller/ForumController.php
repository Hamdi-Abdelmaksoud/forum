<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Entities\Category;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use Model\Managers\CategoryManager;
use Model\Managers\UserManager;

class ForumController extends AbstractController implements ControllerInterface
{

    public function index()
    {


        $topicManager = new TopicManager();
        $category = new CategoryManager();

        return [
            "view" => VIEW_DIR . "forum/listTopics.php",
            "data" => [
                "topics" => $topicManager->findAll(["publishDate", "DESC"]),
                "categories" => $category->findAll()
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
        $post = new PostManager();
        $topic = new topicManager();

        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        return [
            "view" => VIEW_DIR . "forum/listPostsTopic.php",
            "data" => [
                "posts" => $post->findPostsByTopic($id),
                "topic" => $topic->findOneById($id)
            ]
        ];
    }
    public function ajouterPost()
    {
        $post = new PostManager();
        $topic = new TopicManager();
        $commentaire = filter_input(INPUT_POST, "commentaire", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $post->add(["texte" => $commentaire, "user_id" => 1, "topic_id" => $id]);
        return [
            "view" => VIEW_DIR . "forum/listPostsTopic.php",
            "data" => [
                "posts" => $post->findPostsByTopic($id),
                "topic" => $topic->findOneById($id)
            ]
        ];
    }
    public function listTopicsCategorie()
    {
        $topics = new TopicManager();
        $category = new CategoryManager();
        $post = new PostManager();
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        return [
            "view" => VIEW_DIR . "forum/listTopicsCategorie.php",
            "data" => [
                "topics" => $topics->findCategoryTopics($id),
                "category" => $category->findOneById($id),
                "firstPost" => $post->findOneById($id)
            ]
        ];
    }
    public function ajoutCategory()
    {
        $categoryManager = new CategoryManager();
        $categoryName = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($categoryManager->trouverCategory($categoryName)) {
            $_SESSION['message'] = "cette catégroie existe déja";
        }
        else{
            $categoryManager->add(["nom"=>$categoryName]);

        }
        return [
            "view" => VIEW_DIR . "forum/listCategories.php",
            "data" => [
                "categories" => $categoryManager->findAll()
                
                
                ]
            ];
    }
}
