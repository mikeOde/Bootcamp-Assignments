<?php

//Exercice 8 =================================================================================
//a PHP script to merge two commas separated lists with unique value only

$list1 = "4, 5, 6, 7";
$list2 = "4, 5, 7, 8";
$arr_list1 = explode(', ', $list1);     // the function explode is used to target the numbers in the string and put them in an array
$arr_list2 = explode(', ', $list2);     // excluding ', '

$arr_result_list = $arr_list1;
foreach($arr_list2 as $item_8){
    if(in_array($item_8, $arr_list1) == FALSE){
        $arr_result_list[] = $item_8;
    }
}

$list1_length = strlen($list1);  
$list2_length = strlen($list2);
$result_list = implode(", ", $arr_result_list);      // the function implode is the opposite of the function explode from earlier

?>