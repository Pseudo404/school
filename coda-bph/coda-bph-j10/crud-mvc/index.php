<?php
    require "config/autoload.php";

    $root = new Router;
    $root->handleRequest($_GET);