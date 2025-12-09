<?php

require 'config.php';

session_start();

// Source utiliser : https://www.w3schools.com/php/php_sessions.asp 

if (!isset($_SESSION['mort'])) {
    $_SESSION['mort'] = FALSE;
}

if (isset($_POST['action'])) {

    if ($_POST['action'] === 'choose_class' && isset($_POST['class'])) {
        $_SESSION['class'] = $_POST['class'];
        $_SESSION['step'] = 2;
    }

    if ($_POST['action'] === 'continue_step_2') {
        $_SESSION['action0'] = $_POST['action0'];
        $_SESSION['step'] = 3;
    }
    if ($_POST['action'] === 'continue_step_3') {
        $_SESSION['step'] = 4;
    }
    if ($_POST['action'] === 'continue_step_4') {
        $_SESSION['item_step4'] = $_POST['item_step4'];
        $_SESSION['step'] = 5;
    }
    if ($_POST['action'] === 'continue_step_5') {
        $_SESSION['action_step5'] = $_POST['action_step5'];
        $_SESSION['step'] = 6;
    }
    if ($_POST['action'] === 'continue_step_6') {
        $_SESSION['step'] = 7;
    }

    if ($_POST['action'] === 'restart') {
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['mort'] = FALSE;
        $_SESSION['step'] = 1;
    }


} else {

    if (!isset($_SESSION['step'])) {
        $_SESSION['step'] = 1;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hisoire ⚔️🏹🛡️🧙🏻🥚</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="story-container">

    <!-- Texte -->
    <div id="story-text">
        <?php echo Texte(); ?>
    </div>

    <!-- Choix -->
    <div id="choices">

        <?php if ($_SESSION['step'] === 1): ?>

            <form method="POST">
                <select name="class">
                    <option value="warrior">Guerrier</option>
                    <option value="assassin">Assassin</option>
                    <option value="mage">Mage</option>
                    <option value="tank">Tank</option>
                    <option value="healer">Guérisseur</option>
                    <option value="ranger">Archer</option>
                </select>

                <button type="submit" name="action" value="choose_class">Continuer</button>
            </form>

        <?php elseif ($_SESSION['step'] === 2): ?>

            <form method="POST">
                <select name="action0">
                    <option value="attaque">Attaque direct</option>
                    <option value="passive">Attaque passive</option>
                    <option value="fuite">Changement de plan et tu prends la fuite</option>
                </select>

                <button type="submit" name="action" value="continue_step_2">Continuer</button>
            </form>

        <?php elseif ($_SESSION['step'] === 3): ?>
            
            <?php if ($_SESSION['class'] === "healer"){ ?>
                
            <form method="POST">
                <button type="submit" name="action" value="restart">Recommencer</button>
            </form>

            <?php } else{ ?>

                <form method="POST">
                    <button type="submit" name="action" value="continue_step_3">Continuer</button>
                </form>

            <?php } ?>

        <?php elseif ($_SESSION['step'] === 4): ?>

            <form method="POST">
                <select name="item_step4">
                    <option value="piolets">Piolets</option>
                    <option value="ailes">Ailes d'elfe</option>
                    <option value="serum">Sérum d'agilité</option>
                    <option value="cle">Clé qui ouvre n'importe quel porte</option>
                    <option value="chaussure">Chaussure d'éscalade</option>
                    <option value="boutiquaire">Le boutiquaire vous enmène</option>
                    <option value="rien">Rien à l'audace</option>
                </select>
                <button type="submit" name="action" value="continue_step_4">Continuer</button>
            </form>
        
        <?php elseif ($_SESSION['step'] === 5): ?>

            <?php if ($_SESSION['mort'] === TRUE){ ?>
                
            <form method="POST">
                <button type="submit" name="action" value="restart">Recommencer</button>
            </form>

            <?php } else{ ?>

                <form method="POST">
                    <select name="action_step5">
                        <option value="rapprocher">Se rapprocher méfieusement</option>
                        <option value="fuite">Prendre la fuite</option>
                    </select>
                    <button type="submit" name="action" value="continue_step_5">Continuer</button>
                </form>

            <?php } ?>
        
        <?php elseif ($_SESSION['step'] === 6): ?>

            <?php if ($_SESSION['mort'] === TRUE){ ?>
                
            <form method="POST">
                <button type="submit" name="action" value="restart">Recommencer</button>
            </form>

            <?php } else{ ?>

                <form method="POST">
                    <button type="submit" name="action" value="continue_step_6">Continuer</button>
                </form>

            <?php } ?>
        
        <?php elseif ($_SESSION['step'] === 7): ?>

            <?php if ($_SESSION['mort'] === TRUE){ ?>
                
            <form method="POST">
                <button type="submit" name="action" value="restart">Recommencer</button>
            </form>

            <?php } else{ ?>

                <form method="POST">
                    <button type="submit" name="action" value="restart">Rejouer !</button>
                </form>

            <?php } ?>

        <?php endif; ?>

    </div>
</div>
</body>
</html>
