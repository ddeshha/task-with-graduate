<?php
include '../connect.php';

$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
$deletecitySql = "DELETE FROM city WHERE id = $id";
$query = $conn -> query($deletecitySql);

if($query){
    header("Location:../../city.php");
} else {
    echo $conn -> error;
}
?>