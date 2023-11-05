<?php
include '../connect.php';

$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
$deletebrandsSql = "DELETE FROM brands WHERE id = $id";
$query = $conn -> query($deletebrandsSql);

if($query){
    header("Location:../../branads.php");
} else {
    echo $conn -> error;
}
?>