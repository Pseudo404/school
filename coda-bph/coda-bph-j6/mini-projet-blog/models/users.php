<?php
    class User
    {

        private ?int $id = NULL;

        public function __construct(private string $username, private string $email, private string $password, private string $role, private DateTime $created_at)
        {

        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getUsername()
        {
            return $this->username;
        }

        public function setUsername($username)
        {
            $this->username = $username;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getRole()
        {
            return $this->role;
        }

        public function setRole($role)
        {
            $this->role = $role;
        }

        public function getCreated_at()
        {
            return $this->created_at;
        }

        public function setCreated_at($created_at)
        {
            $this->created_at = $created_at;
        }
    }
?>