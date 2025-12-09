<?php 
    class Routeur
    {
        public function handleRequest(array $get) : void
        {
            if (isset($get["route"]))
            {
                if ($get["route"]==="a-propos")
                {
                    $page = new PageController();
                    $page->about();
                }
                elseif ($get["route"]==="contact")
                {
                    $page = new PageController();
                    $page->contact();
                }
                else
                {
                    $page = new PageController();
                    $page->notFound();
                }
            }
            else
            {
                $page = new PageController();
                $page->home();
            }
        }
    }


?>