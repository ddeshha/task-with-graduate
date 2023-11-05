<?php
include '../connect.php';

$id = $_GET['id'];

$deleteCategorySql = "DELETE FROM category WHERE id = $id";
$query = $conn -> query($deleteCategorySql);

if($query){
    header("Location:../../categories.php");
} else {
    echo $conn -> error;
}
?>