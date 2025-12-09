<?php
    class Router
    {
        public function handleRequest(array $get)
        {
            $user_c = new UserController;

            if (!empty($get))
            {
                if ($get['route'] === "show_user")
                {
                    $user_c->show();
                }
                elseif ($get['route'] === "create_user")
                {
                    $user_c->create();
                }
                elseif ($get['route'] === "check_create_user")
                {
                    $user_c->checkCreate();
                }
                elseif ($get['route'] === "update_user")
                {
                    $user_c->update();
                }
                elseif ($get['route'] === "check_update_user")
                {
                    $user_c->checkUpdate();
                }
                elseif ($get['route'] === "delete_user")
                {
                    $user_c->delete();
                }
            }
            else
            {
                $user_c->list();
            }
        }
    }