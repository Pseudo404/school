<?php

$students = [
    [
        "firstName" => "Hannah",
        "lastName" => "Fields",
        "grades" => [12, 11, 15],
        "average" => -1
    ],
    [
        "firstName" => "Richard",
        "lastName" => "Stein",
        "grades" => [18, 12, 13],
        "average" => -1
    ],
    [
        "firstName" => "Mark",
        "lastName" => "Hartoff",
        "grades" => [9, 11, 10],
        "average" => -1
    ],
    [
        "firstName" => "Charlie",
        "lastName" => "Nestle",
        "grades" => [9, 8, 5],
        "average" => -1
    ],
    [
        "firstName" => "Suzy",
        "lastName" => "Brent",
        "grades" => [18, 15, 16],
        "average" => -1
    ]
];

function computeAverage(array $grades) : float
{
    $compteur = 0;
    $total = 0;

    foreach($grades as $grade){
        $compteur ++;
        $total = $total + $grade;
    }

    return $total/$compteur;
}

?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css">
        <title>Bulletin de notes</title>
    </head>
    <body>
        <h1>
            Bulletin de notes
        </h1>
        <h2>
            Liste des étudiants
        </h2>
        <ul id="students">
            <li>
                <?php foreach($students as $key => $student){ ?>
                        <?php if (computeAverage($student['grades'])<10){ ?>
                            <article class="red">
                        <?php }else if (computeAverage($student['grades'])<=13){ ?>
                            <article class="orange">
                        <?php }else{ ?>
                            <article class="green">
                        <?php } ?>
                    <header>
                            <h1><?= $student['firstName']." ".$student['lastName'] ?></h1>
                    </header>
                    <section>
                        <h2>Notes : </h2>
                        <ul>
                            <?php foreach($student['grades'] as $grades){ ?>
                                <li><?= $grades ?></li>
                            <?php } ?>
                        </ul>
                    </section>
                    <footer>
                        <h3>Moyenne des notes de l'étudiant </h3>
                        <h3> <?=computeAverage($student['grades']) ?></h3>
                    </footer>
                </article>
                <?php } ?>
            </li>
        </ul>
    </body>
</html>