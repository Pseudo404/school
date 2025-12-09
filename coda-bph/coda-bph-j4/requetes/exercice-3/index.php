<?php

    $host = "localhost";
    $port = "3306";
    $dbname = "sqlintro";
    $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

    $user = "root";
    $password = "";

    $db = new PDO(
        $connexionString,
        $user,
        $password
    );

    $query = $db->prepare("INSERT INTO users (id, username, email, job) VALUES (NULL, :username, :email, :job)");

    $parameters = [
        'username' => 'Batman',
        'email' => 'bruce@wayne.com',
        'job' => 3
    ];

    $query->execute($parameters);

    $id = $db->lastInsertId();

?>