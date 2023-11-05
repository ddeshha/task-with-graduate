<?php
    include '../connect.php';
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $addbrands = "INSERT INTO `brands`(`name`) VALUES ('$name')";
    $query = $conn -> query($addbrands);
    if($query)
    {
        header("Location:../../branads.php");
    }
    else
    {
        echo $conn -> error;
    }
?>