<?php
include '../connect.php';

$id = $_POST['messageId'];

$sql = "DELETE FROM `messages` WHERE `id` = $id";
$query = $conn -> query($sql);
?>