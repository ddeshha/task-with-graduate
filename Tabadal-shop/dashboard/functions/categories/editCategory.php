<?php
include '../connect.php';

$id = $_POST["id"];
$name = $_POST['name'];

$editCategorySql = "UPDATE `category` SET `name`='$name' WHERE id = $id";
$query = $conn -> query($editCategorySql);

if($query){
    header("Location:../../categories.php");
} else {
    echo $conn -> error;
}
?>