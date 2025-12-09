<?php 

    require "traits.php";

    abstract class AbstractUser
    {
        protected int $id = 0;

        public function __construct(protected string $username, protected string $password, protected string $role){}

        public function setId(int $id) : void
        {
            $this->id = $id;
        }
        public function setUsername(string $username) : void
        {
            $this->username = $username;
        }
        public function setPassword(string $password) : void
        {
            $this->password = $password;
        }
        public function setRole(string $role) : void
        {
            $this->role = $role;
        }

        public function getId() : int
        {
            return $this->id;
        }
        public function getUsername() : string
        {
            return $this->username;
        }
        public function getPassword() : string
        {
            return $this->password;
        }
        public function getRole() : string
        {
            return $this->role;
        }
    }

    require "Admin.php";
    require "Member.php";
?>