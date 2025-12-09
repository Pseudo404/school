<?php
    class User
    {
        public function __construct(private string $email, private string $first_name, private string $last_name, private ?int $id=NULL){}

        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail(string $email)
        {
            $this->email = $email;
        }
        public function getId()
        {
            return $this->id;
        }
        public function setId(int $id)
        {
            $this->id = $id;
        }
        public function getFirstName()
        {
		    return $this->first_name;
        }
        public function setFirstName(string $first_name)
        {
            $this->first_name = $first_name;
        }
        public function getLastName()
        {
            return $this->last_name;
        }
        public function setLastName(string $last_name)
        {
            $this->last_name = $last_name;
        }
    }