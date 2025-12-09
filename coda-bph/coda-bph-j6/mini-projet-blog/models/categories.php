<?php
    class Categorie
    {
        private ? int $id = NULL;
        private array $posts = [];

        public function __construct(private string $title, private string $description){}
        
        public function setId(int $id) : void
        {
            $this->id = $id;
        }
        public function setTitle(string $title) : void
        {
            $this->title = $title;
        }
        public function setDescription(string $description) : void
        {
            $this->description = $description;
        }
        public function setPosts($posts) : void
        {
            $this->posts[] = $posts;
        }

        public function getId() : int
        {
            return $this->id;
        }
        public function getTitle() : string
        {
            return $this->title;
        }
        public function getDescription() : string
        {
            return $this->description;
        }
        public function getPosts()
        {
            foreach ($this->posts as $post_list)
            {
                echo $post_list;
            }
        }

        public function addPosts(Post $post)
        {
            foreach ($this->posts as $post_list)
            {
                if ($post_list === $post)
                {
                    return;
                }
            }
            $this->setPosts($post);
        }

        public function removePosts(Post $post)
        {
            foreach ($this->posts as $key => $post_list)
            {
                if ($post_list === $post) {
                    unset($this->posts[$key]);
                }
            }
            $this->posts = array_values($this->posts);
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