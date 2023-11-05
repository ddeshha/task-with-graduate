<?php
include '../connect.php';

$id = $_POST["id"];
$username = $_POST['username'];
$email = $_POST['email'];
$number = $_POST['number'];
$usertype = $_POST['usertype'];

// if(empty($password)){
    $editUserSql = "UPDATE `users` SET `username`='$username',`email`='$email',`number`='$number',`usertype`='$usertype' WHERE id = $id";
// } elseif(!empty($password)){
//     $pass = MD5($password);
//     $editUserSql = "UPDATE `users` SET `username`='$username',`password`='$password',`usertype`='$usertype' WHERE id = $id";
// }

$query = $conn -> query($editUserSql);
?>