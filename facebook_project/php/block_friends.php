<?php 
session_start();
include "connection.php";
$user_id_1 = $_SESSION["user_id"];

$user_id_2 = $_POST["user_id_2"];
$is_pending = $_POST["is_pending"];
$is_blocked = $_POST["is_blocked"];

$query1 = "SELECT * FROM connections WHERE user_id_2 = '$user_id_2' AND user_id_1 = '$user_id_1';";
$obj1 = $connection->prepare($query1);
$obj1->execute();
$result1 = $obj1->get_result();
$row1 = $result1->fetch_assoc();

if(empty($row1)) {        // only adds friends who are not added yet
    $query2 = "INSERT INTO connections(`user_id_1`, `user_id_2`, `is_pending`, `is_blocked`) VALUES (?, ?, ?, ?);";
    $obj2 = $connection->prepare($query2);
    $obj2->bind_param("ssss", $user_id_1, $user_id_2, $is_pending, $is_blocked);
    $obj2->execute();
    $block_obj[] = [1];
}


$block_obj[] = [0];
$block_json = json_encode($block_obj);
echo $block_json;

?>