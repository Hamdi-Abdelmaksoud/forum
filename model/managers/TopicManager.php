<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
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
         $sqlnbr="select *
         FROM ".$this->tableName." t WHERE t.category_id=:id";
         return $this->getOneOrNullResult(DAO::select($sqlnbr,['id'=>$id]),$this->className);
    
        }


        public function findUserTopics($id)
          {
            // var_dump($id);die;
            $sql="select * FROM ".$this->tableName." t WHERE t.user_id=:id";
            return $this->getMultipleResults(DAO::select($sql,['id'=>$id]),$this->className);
        }
        public function verouillerTopic($id)
        {
            $sql = "UPDATE " . $this->tableName . " t SET t.closed=0 WHERE t.id_topic=:id";
            return $this->getOneOrNullResult(DAO::update($sql, ['id' =>$id], false),$this->className);
        }
        public function ouvrirTopic($id)
        {
            $sql = "UPDATE " . $this->tableName . " t SET t.closed=1 WHERE t.id_topic=:id";
            return $this->getOneOrNullResult(DAO::update($sql, ['id' =>$id], false),$this->className);
        }

    }