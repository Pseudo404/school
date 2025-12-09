<?php 
    class Router
    {
        public function handleRequest(array $get) : void
        {
            
            $blog_controller = new BlogController;
            if (empty($get) || !isset($get['path']))
            {
                $blog_controller->index();
            }
            else{
                $url = explode('/', $get['path']);
                if ($url[0] ==="article")
                {
                    $blog_controller->article($url[1]);
                }
                else
                {
                    $blog_controller->notFound();
                }
            }
        }
    }