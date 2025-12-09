<?php
    $users = [
        [
            "firstName" => "Bugs",
            "lastName" => "Bunny",
            "age" => 29
        ],
        [
            "firstName" => "Roger",
            "lastName" => "Rabbit",
            "age" => 17
        ]
    ];
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 4</title>
    </head>
    <body>
        <h1>
            Liste des utilisateurs
        </h1>
        <ul>
            <?php foreach($users as $key => $val){ ?>
                <?php if ($val['age']<18){ ?>
                    <?php $majorite = "mineur" ?>
                <?php } else { ?>
                    <?php $majorite = "majeur" ?>
                <?php }?>
                <li><?= $val['firstName']." ".$val['lastName']." ".$majorite ?></li>
            <?php } ?>
        </ul>
    </body>
</html>