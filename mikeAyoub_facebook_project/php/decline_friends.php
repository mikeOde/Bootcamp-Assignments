<?php
session_start();
include "connection.php";
$user_id_1 = $_SESSION["user_id"];
$user_id_2 = $_POST["user_id_2"];

$query1 = "DELETE FROM connections WHERE user_id_2 = '$user_id_2' AND user_id_1 = '$user_id_1';";
$obj1 = $connection->prepare($query1);
$obj1->execute();
$result1 = $obj1->get_result();
$row1 = $result1->fetch_assoc();



?>