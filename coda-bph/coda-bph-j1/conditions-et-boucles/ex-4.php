<?php
	$users = [
        [
            "firstName" => "Hugues",
            "lastName" => "Froger"
        ],
        [
            "firstName" => "Mari",
            "lastName" => "Doucet"
        ]
    ];

    foreach($users as $key => $val)
    {
        echo "{$val['firstName']} {$val['lastName']} <br>";
    }
?>