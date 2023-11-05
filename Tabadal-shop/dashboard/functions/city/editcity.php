<?php
include '../connect.php';
    $id = $_POST["id"];
    $name = $_POST['name'];
    $editcitySql = "UPDATE `city` SET `name`='$name' WHERE `id` = $id";
    $query = $conn -> query($editcitySql);
if($query){
    header("Location:../../city.php");
} else {
    echo $conn -> error;
}
?>