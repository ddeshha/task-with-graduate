<?php
include '../connect.php';

$sql = "SELECT * FROM `messages` WHERE `viewed` = '0' LIMIT 3";
$query = $conn -> query($sql);
$recentMessages = $query->fetch_assoc();
print_r(implode($recentMessages));
?>