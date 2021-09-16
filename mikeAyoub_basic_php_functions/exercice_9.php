<?php

//Exercice 9 =================================================================================
//a PHP a function to remove a specified entry from an array

function removeFromArray($array, $entry){
    $index = 0;
    foreach($array as $y){
        if($y == $entry){
            unset($array[$index]);           // we can remove an array item by using unset with the proper index of the item.
        }                                    // I looped over the array to find the index and then remove it.
        else{
            $index++;
        }
    }
    return $array;
}

?>