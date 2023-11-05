<?php
include '../connect.php';

$id = $_POST['userId'];

$deleteUserSql = "DELETE FROM users WHERE id = $id";
$query = $conn -> query($deleteUserSql);
?>