<?php
    include '../connect.php';
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $price = filter_var($_POST['price'],FILTER_SANITIZE_NUMBER_INT);
    $sale = filter_var($_POST['sale'],FILTER_SANITIZE_NUMBER_INT);
    $quantity = filter_var($_POST['quantity'],FILTER_SANITIZE_NUMBER_INT);
    $description = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
    $brands = filter_var($_POST['brand_id'],FILTER_SANITIZE_NUMBER_INT);
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
    $addbrand = "INSERT INTO `brand`(`name`, `price`,`sale`, `quantity`, `description`, `brand_id`, `img`) VALUES ('$name','$price','$sale','$quantity','$description','$brands','$newNames')";
    $query = $conn -> query($addbrand);
    if($query)
    {
        header("Location:../../branad.php");
    }
    else
    {
        echo $conn -> error;
    }
?>