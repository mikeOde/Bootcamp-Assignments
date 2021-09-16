<?php

//Exercice 7 =================================================================================
//a PHP script to get the index of the highest value in an associative array
// Please note that this algorithms gets both: the key index and the numerical index of the highest value
$ages = ["Emma"=>5, "Mathiew"=>4, "Omar"=>47, "Maria"=>26];
$index = 0;
$temp_index = 0;
$temp_age = 0;
$temp_key = "";
foreach($ages as $name=>$a){         
if($a > $temp_age){
    $temp_age = $a;
    $temp_key = $name;
    $temp_index = $index;
}
$index++;
}

?>