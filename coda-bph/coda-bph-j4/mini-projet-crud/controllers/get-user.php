<?php 
    require "controllers/connexion.php";

    $query = $db->prepare("SELECT users.*, jobs.name FROM users JOIN jobs ON users.job=jobs.id WHERE users.id=:id");

    $parameters = [
        'id' => $_GET['user']
    ];

    $query->execute($parameters);
    $user = $query->fetch(PDO::FETCH_ASSOC); 
?>