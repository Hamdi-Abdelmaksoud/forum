<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class PostManager extends Manager
    {

        protected $className = "Model\Entities\Post";
        protected $tableName = "post";


        public function __construct()
        {
            parent::connect();
        }
        public function findPostsByTopic($id)
        {
        $sql="select * FROM ".$this->tableName." p WHERE p.topic_id=:id";
        return $this->getMultipleResults(DAO::select($sql,['id'=>$id]), $this->className);
        }

        public function findPostsByUser($iduser){
        $sql = "Select * FROM ".$this->tableName." p WHERE p.user_id=:id";
        return $this->getMultipleResults(DAO::select($sql,['id'=>$iduser]), $this->className);
        }

        public function deletePostById($idpost){
          
            return $this->delete($idpost);
        }

}
