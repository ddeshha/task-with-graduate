<?php
$current = "categories";
require_once('./includes/header.php');
require_once("./functions/connect.php");

if(!isset($_GET['action'])){
    require_once('./design/categories/showCategories.php');
} elseif($_GET['action'] == 'edit'){
    require_once('./design/categories/editCategory.php');
}

require_once('./includes/footer.php');
?>
<script>
$("#addSubCategoryPost").click(function(){
    let name = $(this).parent().prev().children().children().next().val(),
        parent = $(this).parent().prev().children().next().children().next().val(),
        categoryId;

    $.post("functions/categories/addCategory.php", {name, parent}, function(data){
        categoryId = data;
                
        let categoryTable = $("tbody").html() + '<tr><td>'+name+'</td><td>'+parent+'</td><td><form action="?action=edit" method="post" style="display: inline;"><input type="hidden" name="id" value="'+categoryId+'"><input type="hidden" name="name" value="'+name+'"><button class="btn btn-primary d-inline" >edit</button></form><a href="./functions/categories/deleteCategory.php?id='+categoryId+'"><button class="btn btn-danger">delete</button></a></td></tr>';
        $("tbody").html(categoryTable);
    });

});

$("#addCategoryPost").click(function(){
    let name = $(this).parent().prev().children().children().next().val(),
        parent = 0,
        categoryId;

    $.post("functions/categories/addCategory.php", {name, parent}, function(data){
        categoryId = data;
                
        let categoryTable = $("tbody").html() + '<tr><td>'+name+'</td><td>this is a parent category</td><td><form action="?action=edit" method="post" style="display: inline;"><input type="hidden" name="id" value="'+categoryId+'"><input type="hidden" name="name" value="'+name+'"><button class="btn btn-primary d-inline" >edit</button></form><a href="./functions/categories/deleteCategory.php?id='+categoryId+'"><button class="btn btn-danger">delete</button></a></td></tr>';
        $("tbody").html(categoryTable);
    });

});
</script>