<?php

//Exercice 3 =================================================================================
//a script to find maximum and minimum elements in an array

$arr1 = [5, 23, 0, -5, 10];
$max_item = $arr1[0];
$min_item = $arr1[0];
foreach($arr1 as $temp_value){
    if($temp_value > $max_item){
        $max_item = $temp_value;
    }
    if($temp_value < $min_item){
        $min_item = $temp_value;
    }    
}


?>