<?php
    include '../connect.php';
    $id = $_POST["id"];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $brand_id = $_POST['brand_id'];
    if($_FILES["img"]["size"][0] > 0){
        $imagesNames = $_FILES['img']['name'];
        $tmpImagesNames = $_FILES['img']['tmp_name'];
        $newNames = [];
        $extensions = ['jpg', 'jpeg', 'png'];
        $numberOfImages = count($imagesNames);

        for($i = 0; $i < $numberOfImages; $i++){
            $ext = pathinfo($imagesNames[$i], PATHINFO_EXTENSION);

            if(in_array($ext, $extensions)){
                $newName = MD5(uniqid()) . "." . $ext;
                        
                move_uploaded_file($tmpImagesNames[$i], "../../img/db/" . $newName);
                array_push($newNames, $newName);
            }  
        }

        $newNames = implode(",", $newNames);
        $editbrandSql = "UPDATE `brand` SET `name`='$name',`price`='$price',`sale`='$sale',`quantity`='$quantity',`description`='$description',`brand_id`='$brand_id',`img`='$newNames' WHERE `id` = $id";
    } else{
        echo "something is not wrong";
        $editbrandSql = "UPDATE `brand` SET `name`='$name',`price`='$price',`sale`='$sale',`quantity`='$quantity',`description`='$description',`brand_id`='$brand_id' WHERE `id` = $id";
    }

    $query = $conn -> query($editbrandSql);

    if($query){
        header("Location:../../branad.php");
    } else {
        echo $conn -> error;
    }
?>