<?php

//Exercice 6 =================================================================================
//a function that converts binary number to decimal

function convertBinaryToDecimal($binary){
    $temp_binary = $binary;
    $decimal = 0;
    $fac = 0;
    while($temp_binary != 0){
        $key = $temp_binary % 10;
        $decimal = $decimal + $key*(2**$fac);
        $fac++;
        $temp_binary = intdiv($temp_binary, 10);
    }
    return $decimal;
}

?>