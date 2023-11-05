<?php
$current = "branad";
require_once('./includes/header.php');
require_once("./functions/connect.php");

if(isset($_GET["error"])){
    echo '<div class="alert alert-danger" role="alert">' . $_GET["error"] . "</div>";
}

if(!isset($_GET['action'])){
    require_once('./design/Brand/tabel.php');
} elseif($_GET['action'] == 'add'){
    require_once('./design/Brand/add.php');
} elseif($_GET['action'] == 'edit'){
    require_once('./design/Brand/edit.php');
}

require_once('./includes/footer.php');
?>