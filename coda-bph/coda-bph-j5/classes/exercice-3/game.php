<?php 

    require "character.php";

    $joueur0 = new Character("Ragnar");

    $weapon0 = new Weapon("Sword", 10);

    $joueur0->setWeapon($weapon0->getName(), $weapon0->getDamages());

    $var = $joueur0->getWeapon();


    echo $joueur0->getName()." ".$var->getName()." ".$var->getDamages()."<br>";
    echo $var->strike();

?>