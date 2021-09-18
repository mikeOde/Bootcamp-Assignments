<?php 
session_start();
include "connection.php";
$id = $_SESSION["user_id"];

$query = "SELECT *, expenses.id AS expenses_id FROM `expenses`,`categories` WHERE expenses.user_id = ? AND categories.id = expenses.category_id;";  //adds the category name to the result
$obj = $connection->prepare($query);
$obj-> bind_param("s",$id);
$obj->execute();

$results = $obj->get_result();

$expenses_arr = [];
while($expense = $results->fetch_assoc()){
	$expenses_arr[] = $expense;
}

$expenses_json = json_encode($expenses_arr);
echo $expenses_json;

?>