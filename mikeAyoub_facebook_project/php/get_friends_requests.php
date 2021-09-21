<?php
session_start();
include "connection.php";
$user_id = $_SESSION["user_id"];


$query = "SELECT U.* FROM users U, connections C WHERE C.user_id_1 = ? AND C.is_pending = 1 AND C.is_blocked = 0 AND U.id = C.user_id_2;";
$stmt = $connection->prepare($query);
$stmt-> bind_param("s",$user_id);
$stmt->execute();
$result = $stmt->get_result();
$requests_result = [];
while($row = $result->fetch_assoc()){
    $requests_result[] = $row;
}

$response_json = json_encode($requests_result, JSON_PRETTY_PRINT);
echo($response_json);
?>