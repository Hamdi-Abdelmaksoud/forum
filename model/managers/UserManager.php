<?php

namespace Model\Managers;

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

 
}
