<?php
include '../connect.php';

$name = $_POST['name'];

if(isset($_POST['parent'])){
    $parent = $_POST['parent'];
} else{
    $parent = 0;
}

$addCategorySql = "INSERT INTO `category`(`name`, `parent`) VALUES ('$name', '$parent')";
$query = $conn -> query($addCategorySql);


echo $conn -> insert_id;
// if($query){
//     header("Location:../../categories.php");
// } else {
//     echo $conn -> error;
// }
?>