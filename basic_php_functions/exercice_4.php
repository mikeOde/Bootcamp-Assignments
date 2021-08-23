<?php

//Exercice 4 =================================================================================
//a php function to reverse elements in an array


function reverseArray($arr2){
    $rev_arr = [];
    $rep = count($arr2);                     // had to remove the count(arr2) from the loop because $arr2 is decreasing with each step 
    for($c = 0; $c < $rep; $c++){
        $to_push = array_pop($arr2);
        $rev_arr[] = $to_push;
    }
    return $rev_arr;
}

?>