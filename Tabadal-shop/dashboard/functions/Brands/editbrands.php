<?php
include '../connect.php';
    $id = $_POST["id"];
    $name = $_POST['name'];
    $editbrandsSql = "UPDATE `brands` SET `name`='$name' WHERE `id` = $id";
    $query = $conn -> query($editbrandsSql);
if($query){
    header("Location:../../branads.php");
} else {
    echo $conn -> error;
}
?>