<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    

    class CategoryManager extends Manager{

        protected $className = "Model\Entities\Category";
        protected $tableName = "category";


        public function __construct(){
            parent::connect();
        }
        public function trouverCategory($category)
        {
             $sql="select *
             FROM ".$this->tableName." c WHERE c.nom=:nom";
             return $this->getOneOrNullResult(DAO::select($sql,['nom'=>$category],false),$this->className);
        }

    }