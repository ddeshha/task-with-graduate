<?php
require_once "../../dashboard/functions/connect.php";
session_start();

if(isset($_SESSION['user'])){
    $cartId = $_GET['id'];
    $userId = $_SESSION['user']['id'];

    $deleteCartSql = "DELETE FROM `cart` WHERE `id` = '$cartId' AND `userId` = '$userId'";
    $deleteCartQuery = $conn -> query($deleteCartSql);

    if($deleteCartQuery == true){
        header("Location: ../../cart.php");
    } else {
        // echo "something wrong in the query";
        header("Location: ../cart.php");
    }
} else{
    // echo "not logged in";
    header("Location: ../cart.php");
}
?>