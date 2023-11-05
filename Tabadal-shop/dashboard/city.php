<?php
    $current = "city";
    require_once("./includes/header.php");
    require_once("./functions/connect.php");

    if(isset($_GET["error"])){
        echo '<div class="alert alert-danger" role="alert">' . $_GET["error"] . "</div>";
    }

    if(!isset($_GET['action'])){
        require_once('./design/city/cityshow.php');
    } elseif($_GET['action'] == 'add'){
        require_once('./design/city/addcity.php');
    } elseif($_GET['action'] == 'edit'){
        require_once('./design/city/editcity.php');
    }

    require_once("./includes/footer.php");
?>