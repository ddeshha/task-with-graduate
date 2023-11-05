<?php
    $current = "products";
    require_once("./includes/header.php");
    require_once("./functions/connect.php");

    if(isset($_GET["error"])){
        echo '<div class="alert alert-danger" role="alert">' . $_GET["error"] . "</div>";
    }

    if(!isset($_GET['action'])){
        require_once('./design/products/showProducts.php');
    } elseif($_GET['action'] == 'add'){
        require_once('./design/products/addProduct.php');
    } elseif($_GET['action'] == 'edit'){
        require_once('./design/products/editProduct.php');
    }

    require_once("./includes/footer.php");
?>