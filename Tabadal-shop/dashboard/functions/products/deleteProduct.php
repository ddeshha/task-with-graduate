<?php
include '../connect.php';

$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
$deleteProductSql = "DELETE FROM products WHERE id = $id";
$query = $conn -> query($deleteProductSql);

if($query){
    header("Location:../../products.php");
} else {
    echo $conn -> error;
}
?>