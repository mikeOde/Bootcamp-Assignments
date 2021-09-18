<?php 
include "connection.php";
session_start();
$user_id = $_SESSION["user_id"];
$expense_id = $_GET["id"];

$category = $_POST["category"];
$date = $_POST["date"];
$amount = $_POST["amount"];

$query1 = "SELECT id FROM categories WHERE name = ? AND user_id = ?;";
$obj1 = $connection->prepare($query1);
$obj1->bind_param("ss", $category, $user_id);
$obj1->execute();
$result1 = $obj1->get_result();
$row1 = $result1->fetch_assoc();
$category_id = $row1["id"];

//echo($category_id);

$query2 = "UPDATE expenses SET `user_id` = ?, `date` = ?, `amount` = ?, category_id= ? where id = ?";
$obj2 = $connection->prepare($query2);
$obj2->bind_param("sssss", $user_id, $date, $amount, $category_id, $expense_id);
$obj2->execute();

$response = [];
$response["success"] = 1;

$response_json = json_encode($response);
echo $response_json;

?>