<?php

    class Character {

        private string $firstName = "Jane";
        private string $lastName = "Doe";

        public function __construct(public int $id){}

        public function getFirstName() : string
        {
            return $this->firstName;
        }
        public function getLastName() : string
        {
            return $this->lastName;
        }
        public function getId() : int
        {
            return $this->id;
        }

        public function setFirstName(string $firstName) : void
        {
            $this->firstName = $firstName;
        }
        public function setLastName(string $lastName) : void
        {
            $this->lastName = $lastName;
        }
        public function setId(int $id) : void
        {
            $this->id = $id;
        }
        public function getFullName() : string{
            return $this->firstName. " ". $this->lastName;
        }
    }
?>