<?php
    class User
    {
        public function __construct(private string $firstName, private string $lastName, private string $email, private string $password, private datetime $created_at, private ?int $id=NULL){}

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
		    return $this->firstName;
        }
        public function setFirstName(string $firstName)
        {
            $this->firstName = $firstName;
        }
        public function getLastName()
        {
            return $this->lastName;
        }
        public function setLastName(string $lastName)
        {
            $this->lastName = $lastName;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail(string $email)
        {
            $this->email = $email;
        }
        public function getPassword()
        {
            return $this->password;
        }
        public function setPassword(string $password)
        {
            $this->password = $password;
        }
        public function getCreated_at()
        {
            return $this->created_at;
        }
        public function setCreated_at(datetime $created_at)
        {
            $this->created_at = $created_at;
        }
    }