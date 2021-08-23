<?php

//Exercice 1 ===============================================================================
//factorial function using for loop

function factorial($n){
    if($n <0){
        return;
    }
    $r = 1;
    for($x = $n; $x > 0; $x--){
        $r = $r * $x;
    }
    return $r;
}


?>