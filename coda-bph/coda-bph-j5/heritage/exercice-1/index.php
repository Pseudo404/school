<?php 
    class User
    {
        protected string $email;
        protected string $password;

        public function __construct(){

        }

        public function login() : array {
            return ["login" => $this->email, "password" => $this->password];
        }
    }

    class Reader extends User
    {
        private array $favoriteBooks = [];

        public function __construct(string $email, string $password){
            $this->email = $email;
            $this->password = $password;
        }

        public function addBookToFavorites(string $book): array {
            $this->favoriteBooks[] = $book;

            return $this->favoriteBooks;
        }

        public function removeBookFromFavorites(string $book): array {
            foreach($this->favoriteBooks as $key => $favoriteBook)
            {
                if($favoriteBook === $book)
                {
                    unset($this->favoriteBooks[$key]);
                }
            }

            return $this->favoriteBooks;
        }
    }

    $lecteur = new Reader("exemple@exemple.com", "motDePasse");
    $books = $lecteur->addBookToFavorites("livre0");
    $books = $lecteur->addBookToFavorites("livre1");
    foreach ($books as $book){
        echo $book."<br>";
    }

    $books = $lecteur->removeBookFromFavorites("livre1");

    foreach ($books as $book){
        echo $book."<br>";
    }

    echo $lecteur->login()['login']."<br>".$lecteur->login()['password'];
?>