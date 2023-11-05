<?php
include '../connect.php';

$id = $_POST["id"];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$city = $_POST['city_id'];
$date = $_POST['date'];
$description = $_POST['description'];
$category_id = $_POST['category_id'];


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
    $editCategorySql = "UPDATE `products` SET `name`='$name',`price`='$price',`quantity`='$quantity',`city_id`='$city',`date`='$date',`description`='$description',`category_id`='$category_id',`img`='$newNames' WHERE `id` = $id";
} else{
    echo "something is not wrong";
    $editCategorySql = "UPDATE `products` SET `name`='$name',`price`='$price',`quantity`='$quantity',`city_id`='$city',`date`='$date',`description`='$description',`category_id`='$category_id' WHERE `id` = $id";
}

$query = $conn -> query($editCategorySql);

if($query){
    header("Location:../../products.php");
} else {
    echo $conn -> error;
}
?>