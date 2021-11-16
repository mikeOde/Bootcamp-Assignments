<?php 
session_start();
include "connection.php";
$id = $_SESSION["user_id"];

$category = $_POST["category"];
$date = $_POST["date"];
$amount = $_POST["amount"];

$query1 = "SELECT * FROM categories WHERE name = ?;";
$obj1 = $connection->prepare($query1);
$obj1->bind_param("s", $category);
$obj1->execute();
$result1 = $obj1->get_result();
$row1 = $result1->fetch_assoc();
$category_id = $row1["id"];

$query2 = "INSERT INTO expenses(`user_id`, `date`, `amount`, `category_id`) VALUES (?, ?, ?, ?)";
$obj2 = $connection->prepare($query2);
$obj2->bind_param("ssss", $id, $date, $amount, $category_id);
$obj2->execute();
$expense_id = $obj2->insert_id;  // returns the expense id of the last inserted expense

$expense_obj = [];
$expense_obj["id"] = $expense_id;
$expense_obj["category"] = $category;
$expense_obj["date"] = $date;
$expense_obj["amount"] = $amount;

$expense_json = json_encode($expense_obj);
echo $expense_json;

?>