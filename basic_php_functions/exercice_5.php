<?php

//Exercice 5 =================================================================================
// a php script to put even and odd elements of array in two separate arrays

$initial_arr = [5, 6, 7, 2, 43, 123, 90];
$odd_arr = [];
$even_arr = [];
foreach($initial_arr as $y){
    if($y % 2 == 0){
        $even_arr[] = $y;
    }
    else{
        $odd_arr[] = $y;
    }
}

?>