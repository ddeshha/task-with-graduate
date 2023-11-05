<?php
require_once "../dashboard/functions/connect.php";

$username = $_POST['username'];
$password = MD5($_POST['password']);

$selectLoginSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$selectLoginQuery = $conn -> query($selectLoginSql);

if($selectLoginQuery -> num_rows > 0){
    $user = $selectLoginQuery -> fetch_assoc();
    session_start();
    if($user["usertype"] > 1){
        $_SESSION['adminUser'] = ['id' => $user['id'], 'username' => $user['username'], 'privilegeId' => $user["usertype"]];
        header("Location: ../dashboard/index.php");
    } elseif($user["usertype"] == 1){
        $_SESSION['user'] = ['id' => $user['id'], 'username' => $user['username']];
        header("Location: ../index.php");
    }
} else {
    header("Location: ../login.php");
}
?>