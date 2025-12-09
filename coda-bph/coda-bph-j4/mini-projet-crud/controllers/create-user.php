<?php 
    require "connexion.php";

    $query = $db->prepare("INSERT INTO users (username, email, job) VALUES (:username, :email, :job)");

    $parameters = [
        'username' => $_POST['name'],
        'email' => $_POST['email'],
        'job' => $_POST['job']
    ];

    $query->execute($parameters);

    header("Location: ../index.php");

?>