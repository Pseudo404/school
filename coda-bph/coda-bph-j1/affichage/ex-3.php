<?php
    $users = [
        [
            "firstName" => "Bugs",
            "lastName" => "Bunny"
        ],
        [
            "firstName" => "Roger",
            "lastName" => "Rabbit"
        ]
    ];
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 3</title>
    </head>
    <body>
        <h1>
            Liste des utilisateurs
        </h1>
        <ul>
            <?php foreach($users as $key => $val){ ?>
                <li><?= $val['firstName']." ".$val['lastName'] ?></li>
            <?php } ?>
        </ul>
    </body>
</html>