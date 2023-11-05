<?php
require_once "../connect.php";

$messageId = $_POST['messageId'];

$sql = "UPDATE `messages` SET `viewed`='1' WHERE `id` = '$messageId'";
$query = $conn -> query($sql);
?>