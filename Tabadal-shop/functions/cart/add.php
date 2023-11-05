<?php
require_once "../../dashboard/functions/connect.php";
session_start();

if(isset($_SESSION['user'])){
    $productId = $_GET['id'];
    $userId = $_SESSION['user']['id'];

    if(isset($_GET['quantity'])){
        $quantity = $_GET['quantity'];
    } else{
        $quantity = 1;
    }

    $addCartSql = "INSERT INTO `cart`(`userId`, `productId`, `quantity`) VALUES ('$userId','$productId','$quantity')";
    $addCartQuery = $conn -> query($addCartSql);

    if($addCartQuery == true){
        header("Location: ../../cart.php");
    } else {
        // echo "something wrong in the query";
        header("Location: ../../shop.php");
    }
} else{
    // echo "not logged in";
    header("Location: ../../shop.php");
}
?>