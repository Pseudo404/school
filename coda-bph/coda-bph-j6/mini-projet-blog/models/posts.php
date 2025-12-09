<?php
    class Post extends User
    {
        private ? int $id = NULL;
        private array $categories = [];

        public function __construct(private string $title, private string $excerpt, private string $content, private int $author, private datetime $created_at){}
        
        public function setId($id) : void
        {
            $this->id = $id;
        }
        public function setTitle($title) : void
        {
            $this->title = $title;
        }
        public function setExcerpt($excerpt) : void
        {
            $this->excerpt = $excerpt;
        }
        public function setContent($content) : void
        {
            $this->content = $content;
        }
        public function setAuthor($author) : void
        {
            $this->author = $author;
        }
        public function setCreated_at($created_at) : void
        {
            $this->created_at = $created_at;
        }
        public function setPosts($posts) : void
        {
            $this->posts = $posts;
        }
        public function setCategories($categories) : void
        {
            $this->categories[] = $categories;
        }

        public function getId()
        {
            return $this->id;
        }
        public function getTitle()
        {
            return $this->title;
        }
        public function getExcerpt()
        {
            return $this->excerpt;
        }
        public function getContent()
        {
            return $this->content;
        }
        public function getAuthor()
        {
            return $this->author;
        }
        public function getCreated_at()
        {
            return $this->created_at;
        }
        public function getPosts()
        {
            return $this->posts;
        }
        public function getCategories()
        {
            foreach ($this->categories as $categorie_list)
            {
                echo $categorie_list;
            }
        }

        public function addCategories(Categorie $categorie)
        {
            foreach ($this->categories as $categorie_list)
            {
                if ($categorie_list === $categorie)
                {
                    return;
                }
            }
            $this->setCategories($categorie);
        }

        public function removeCategories(Categorie $categorie)
        {
            foreach ($this->categories as $key => $categorie_list)
            {
                if ($categorie_list === $categorie) {
                    unset($this->categories[$key]);
                }
            }
            $this->categories = array_values($this->categories);
        }

        // public function getAll() : string
        // {
        //     $var = "";
        //     foreach ($this->favorites as $favoris)
        //         {
        //             $var = $var.' '.$favoris;
        //         }
        //     return $this->username." ".$this->password." ".$this->role." ".$this->biography." ".$var."<br>";
        // }
    
    
    }


?>