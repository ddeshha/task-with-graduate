<?php
require_once "../../dashboard/functions/connect.php";

$name = $_POST['name'];
$email = $_POST['email'];
$content = $_POST['message'];

$sql = "INSERT INTO `messages`(`name`, `email`, `content`) VALUES ('$name','$email','$content')";
$query = $conn -> query($sql);
?>