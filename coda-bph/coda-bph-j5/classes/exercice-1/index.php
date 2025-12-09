<?php
    require "user.php";

    $admin = new User(1, "admin", "admin");
    $user = new User(2, "user", "user");

    echo "id : ", $admin->getId(), " username : ", $admin->getUsername(), " password : ", $admin->getPassword(), "<br />";
    echo "id : ", $user->getId(), " username : ", $user->getUsername(), " password : ", $user->getPassword();
?>