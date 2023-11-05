<?php
include '../connect.php';

$username = $_POST['username'];

$password = md5($_POST['password']);
$usertype = $_POST['usertype'];

$addUserSql = "INSERT INTO users(`username`,`password`, `usertype`) VALUES ('$username','$password', '$usertype')";
$addUserQuery = $conn -> query($addUserSql);

echo $conn -> insert_id;
?>