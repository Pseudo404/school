<?php     
    class Member extends AbstractUser
    {
        use Debug;
        private array $favorites = [];
        protected string $role = "MEMBER";

        public function __construct(protected string $username, protected string $password, private string $biography){}

        public function setRole(string $role) : void
        {
            $this->role = $role;
        }
        public function setBiography(string $biography) : void
        {
            $this->biography = $biography;
        }
        public function setFavorites(string $favorites) : void
        {
            $this->favorites = $favorites;
        }

        public function getRole() : string
        {
            return $this->role;
        }
        public function getBiography() : string
        {
            return $this->biography;
        }
        public function getFavorites() : array
        {
            return $this->favorites;
        }

        public function getAll() : string
        {
            $var = "";
            foreach ($this->favorites as $favoris)
                {
                    $var = $var.' '.$favoris;
                }
            return $this->username." ".$this->password." ".$this->role." ".$this->biography." ".$var."<br>";
        }
        
    }
?>