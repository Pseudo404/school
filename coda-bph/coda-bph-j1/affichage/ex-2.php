<?php
    $connectedUser = false;
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 2</title>
    </head>
    <body>
        <header>
            <nav>
                <?php if ($connectedUser == false){ ?>
                    <a href="#">Connexion</a>
                <?php }else if ($connectedUser == true){ ?>
                    <a href="#">Déconnexion</a>
                <?php } ?>
            </nav>
        </header>
    </body>
</html>