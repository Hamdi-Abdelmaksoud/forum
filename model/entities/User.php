<?php
    namespace Model\Entities;

    use App\Entity;

    final class User extends Entity{

        private $id;
        private $pseudo;
        private $password;
        private $inscriptionDate;
        private $role;
        private $email;

        public function __construct($data){         
            $this->hydrate($data);        
        }
 
        /**
         * Get the value of id
         */  
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of pseudo
         */ 
        public function getPseudo()
        {
                return $this->pseudo;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setPseudo($pseudo)
        {
                $this->pseudo = $pseudo;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }


        /**
         * Get the value of closed
         */ 
        public function getInscriptionDate()
        {
                return $this->inscriptionDate->format("d/m/Y, H:i:s");
        }

        /**
         * Set the value of inscriptionDate
         *
         * @return  self
         */ 
        public function setInscriptionDate($inscriptionDate)
        {
                $this->inscriptionDate =  new \DateTime($inscriptionDate);

                return $this;
        }

        /**
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role =  $role;

                return $this;
        }
        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of publishDate
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email =  $email;

                return $this;
        }



        public function hasRole($role){
            
                 return $role === $this->getRole() ? true : false; // ternory operator
        }
    }
