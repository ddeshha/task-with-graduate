<?php
include '../dashboard/functions/connect.php';

$username = $_POST['username'];
$email = $_POST['email'];
$number = $_POST['number'];
$password = md5($_POST['password']);

if($_POST['password'] == $_POST['repeatPassword']){
    $getUserSql = "SELECT * FROM `users` WHERE `username` = '$username'";
    $getUserQuery = $conn -> query($getUserSql);

    if($getUserQuery -> num_rows == 0){
        $addUserSql = "INSERT INTO users(`username`,`email`,`number`,`password`,`usertype`) VALUES ('$username','$email','$number','$password','1')";
        $query = $conn -> query($addUserSql);
    
        if($query){
            header("Location:../login.php");
        } else {
            echo $conn -> error;
        }
    } else{
        header("Location:../register.php");
    }
} else {
    header("Location:../register.php");
}
?>