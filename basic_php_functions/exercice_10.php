<?php

//Exercice 10 =================================================================================
//a PHP function to set union of two arrays (no duplicates)

function unite($first_array, $second_array){
    $unified_array = [];
    foreach($first_array as $item_10){
        if(in_array($item_10, $unified_array) == FALSE){
            $unified_array[] = $item_10;
        }
    }
    foreach($second_array as $item_11){
        if(in_array($item_11, $unified_array) == FALSE){
            $unified_array[] = $item_11;
        }
    }
    return $unified_array;
}

?>