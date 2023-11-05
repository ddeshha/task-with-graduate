<?php
include '../connect.php';

$mesNumSql = "SELECT COUNT(*) FROM `messages` WHERE `viewed` = '0'";
$mesNumQuery = $conn -> query($mesNumSql);
$mesNum = $mesNumQuery->fetch_assoc();
echo $mesNum['COUNT(*)'];
?>