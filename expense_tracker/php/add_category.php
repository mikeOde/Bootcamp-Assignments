<?php 
session_start();
include "connection.php";
$id = $_SESSION["user_id"];

$category_name = $_POST["category_name"];

$query = "INSERT INTO categories(`name`, `user_id`) VALUES (?, ?)";
$obj = $connection->prepare($query);
$obj->bind_param("ss", $category_name, $id);
$obj->execute();


?>