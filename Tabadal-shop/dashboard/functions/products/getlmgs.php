<?php
include '../connect.php';

$productId = $_POST['productId'];

$sql = "SELECT * FROM `images` WHERE `productId` = '{$productId}'";
$query = $conn -> query($sql);

foreach($query as $imgs){
    echo $imgs["name"];
}