<?php

namespace Model\Managers;
use App\Session;
use App\Manager;
use App\DAO;

class UserManager extends Manager
{

    protected $className = "Model\Entities\User";
    protected $tableName = "user";


    public function __construct()
    {
        parent::connect();
    }


    // email ==> table 
    // requette 

    public function trouverEmail($email)
    {
        $sql = "select * FROM " . $this->tableName . " u WHERE u.email=:email";
        return $this->getOneOrNullResult(DAO::select($sql, ['email' => $email], false), $this->className); 
    }
    public function trouverPseudo($pseudo)
    {
        $sql = "select * FROM " . $this->tableName . " u WHERE u.pseudo=:pseudo";
        return $this->getOneOrNullResult(DAO::select($sql, ['pseudo' => $pseudo], false), $this->className);
    }

    public function getUserPassword($idUser){
        $sql = "select * FROM " . $this->tableName . " u WHERE u.id_user=:id";
        return $this->getOneOrNullResult(DAO::select($sql, ['id' => $idUser], false), $this->className); 

    }

    public function updatePassword($password){
        $sql = "UPDATE " . $this->tableName . " set password='$password'  WHERE id_user=:id";
        return $this->getOneOrNullResult(DAO::update($sql, ['id' => Session::getUser()->getId()], false), $this->className); 


    }

    

 
}
