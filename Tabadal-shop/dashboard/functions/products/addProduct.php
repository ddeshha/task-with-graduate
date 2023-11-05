<?php
    include '../connect.php';
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $price = filter_var($_POST['price'],FILTER_SANITIZE_NUMBER_INT);
    $quantity = filter_var($_POST['quantity'],FILTER_SANITIZE_NUMBER_INT);
    $city = filter_var($_POST['city_id'],FILTER_SANITIZE_STRING);
    $date = filter_var($_POST['date'],FILTER_SANITIZE_NUMBER_INT);
    $description = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
    $category = filter_var($_POST['categoryId'],FILTER_SANITIZE_NUMBER_INT);
    $imagesNames = $_FILES['img']['name'];
    $tmpImagesNames = $_FILES['img']['tmp_name'];
    $newNames = [];
    $extensions = ['jpg', 'jpeg', 'png'];
    $numberOfImages = count($imagesNames);
    for($i = 0; $i < $numberOfImages; $i++)
    {
        var_dump($_FILES['img']['size'][$i]);
        $ext = pathinfo($imagesNames[$i], PATHINFO_EXTENSION);
        if($_FILES['img']['size'][$i] < 2000000)
        {
            if(in_array($ext, $extensions))
            {
                $newName = MD5(uniqid()) . "." . $ext;
                move_uploaded_file($tmpImagesNames[$i], "../../img/db/" . $newName);
                array_push($newNames, $newName);
            }
            else
            {
                header("Location:../../products.php?action=add&error=The image named '" . $imagesNames[$i] . "' has an unsupported extension");
                exit();
            }
        }
        else
        {
            header("Location:../../products.php?action=add&error=The image named '" . $imagesNames[$i] . "' is too big");
            exit();
        }
    }
    $newNames = implode(",", $newNames);
    $addProductSql = "INSERT INTO `products`(`name`,`price`,`quantity`,`city_id`,`date`,`description`,`category_id`,`img`) VALUES ('$name','$price','$quantity','$city','$date','$description','$category','$newNames')";
    $query = $conn -> query($addProductSql);
    if($query)
    {
        header("Location:../../products.php");
    }
    else
    {
        echo $conn -> error;
    }
?>