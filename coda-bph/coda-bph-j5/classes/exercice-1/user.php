<?php

    class User {

        public function __construct(public int $id, public string $username, public string $password)
        {

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

        public function setId(int $id) : void
        {
            $this->id = $id;
        }
        public function setUsername(string $uesrname) : void
        {
            $this->uesrname = $uesrname;
        }
        public function setPassword(string $password) : void
        {
            $this->password = $password;
        }
    }
?>