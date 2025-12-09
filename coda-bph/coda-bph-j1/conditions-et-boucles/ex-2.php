<?php
	$numbers = [28, 32, 44, -67, 18, 24, -98];

    $i = 0;
    while($i < count($numbers))
    {
        if ($numbers[$i] < 0){
            echo $numbers[$i];
            echo "<br>";
        }
        $i++;
    }
?>