<?php
    require "user.php";
    require "connexion.php";

    /*
    $superman = [
        "first_name" => "Clark",
        "last_name" => "Kent",
        "email" => "clark.kent@test.fr"
    ];

    $superman_user = new Users(0, $superman["first_name"], $superman["last_name"], $superman["email"]);

    echo $superman_user->getAll(); */

    $query = $db->prepare('SELECT * FROM users');
    
    $query->execute();
    // $user = $query->fetch(PDO::FETCH_ASSOC);
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    /*
    $user1 = new Users($user["first_name"], $user["last_name"], $user["email"]);
    echo $user1->getAll();
    */
    
    foreach ($users as $user){
        new Users($user["first_name"], $user["last_name"], $user["email"]);
    }

    $clark = new Users("Clark", "Kent", "clark.kent@test.fr");

    $query = $db->prepare('INSERT INTO users(first_name, last_name, email) VALUES(:first_name, :last_name, :email)');
    $parameters = [
        'first_name' => $clark->getFirstName(),
        'last_name' => $clark->getLastName(),
        'email' => $clark->getEmail()
    ];

    $query->execute($parameters);
    

?>