<?php
    include '../connect.php';
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $addcity = "INSERT INTO `city`(`name`) VALUES ('$name')";
    $query = $conn -> query($addcity);
    if($query)
    {
        header("Location:../../city.php");
    }
    else
    {
        echo $conn -> error;
    }
?>