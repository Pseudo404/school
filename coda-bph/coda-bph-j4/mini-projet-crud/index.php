<?php

if(isset($_GET["route"]))
{
    $route = $_GET["route"];
}

else
{
    $route = "list";
}

if($route==='delete'){
    header('Location: controllers/delete-user.php?user='.$_GET["user"]);
}

require "templates/layout.phtml";

?>
