<?php
require_once "../../dashboard/functions/connect.php";
session_start();

$cartId = $_POST['cartId'];
$quantity = $_POST['quantity'];

$cartSql = "UPDATE `cart` SET `quantity`='$quantity' WHERE `id` = '$cartId'";
$cartQuery = $conn -> query($cartSql);
?>