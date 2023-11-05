<?php
include '../connect.php';

$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
$deletebrandSql = "DELETE FROM brand WHERE id = $id";
$query = $conn -> query($deletebrandSql);

if($query){
    header("Location:../../branad.php");
} else {
    echo $conn -> error;
}
?>