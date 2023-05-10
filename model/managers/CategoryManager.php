<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    

    class CategoryManager extends Manager{

        protected $className = "Model\Entities\Category";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }
      public function findCategoryTopics($id){
        $sql="select *
        FROM ".$this->tableName." t WHERE t.category_id=:id";
        return $this->getMultipleResults(
            DAO::select($sql,['id'=>$id]),
            $this->className
        );
     

      }

    }