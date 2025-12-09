<?php
    $host = "localhost";
    $port = "3306";
    $dbname = "coda_bph_j5";
    $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

    $user = "root";
    $password = "";

    $db = new PDO(
        $connexionString,
        $user,
        $password
    );
?>