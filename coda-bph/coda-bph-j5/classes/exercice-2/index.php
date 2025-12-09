<?php 
    require "character.php";

    $chara = new Character(1);
    echo $chara->getFullName();
    echo "<br/>";
    $chara->setFirstName("Sarah");
    $chara->setLastName("Connor");
    echo $chara->getFullName();

?>