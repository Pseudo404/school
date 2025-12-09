<?php 
    require 'connexion.php';

    $query = $db->prepare("DELETE FROM users WHERE id=:id");

    $parameters = [
        'id' => $_GET['user']
    ];

    $query->execute($parameters);

    header("Location: ../index.php");
?>