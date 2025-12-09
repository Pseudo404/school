<?php 
    class Router
    {
        public function handleRequest() : void
        {
            $auth = new AuthController;
            if (empty($_GET))
            {
                $auth->login();
                
            }
            else
            {
                $auth->notFound();
            }
        }
    }