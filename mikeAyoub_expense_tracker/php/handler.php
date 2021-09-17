<?php
include "connection.php";
session_start();
$userId = $_SESSION["user_id"];

$query = "SELECT * FROM categories WHERE id=?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $userId);
$stmt->execute();
$result = $stmt->get_result();
$categories_array = [];
while($row = $result->fetch_assoc()){
    $categories_array[] = $row;
}

$json = json_encode($temp_array, JSON_PRETTY_PRINT);
?>
