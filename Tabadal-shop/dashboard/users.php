<?php
$current = "users";
require_once('./includes/header.php');
require_once("./functions/connect.php");

if(!isset($_GET['action'])){
    require_once('./design/users/showUsers.php');
}

require_once('./includes/footer.php');
?>
<script>
let userId;
$("tbody").on("click", ".delete", function(){
    userId = $(this).data("id");
    let username = $(this).data("username");

    $("#deleteUserModal .modal-body").html("Are You Sure you want to delete " + username);
});

$("#deleteUserModal").on("click", "#deleteUser", function(){
    $.post("functions/users/deleteUser.php", {userId}, function(){});
    $(".delete[data-id="+userId+"]").parent().parent().html('');
});

$("#addUserPost").click(function(){
    let username = $(this).parent().prev().children().children().next().val(),
        password = $(this).parent().prev().children().next().children().next().val(),
        usertype = $(this).parent().prev().children().next().next().children().next().val(),
        userId,
        privilege;

    if(+usertype == 1){
        privilege = "customer";
    } else if(+usertype == 2){
        privilege = "supervisor";
    } else if(+usertype == 3){
        privilege = "admin";
    } else if(+usertype == 4){
        privilege = "owner";
    }

    $.post("functions/users/addUser.php", {username, password, usertype}, function(data){
        userId = data;
        
        let usersTable = $("tbody").html() + '<tr><td>'+username+'</td><td>'+privilege+'</td><td><button class="btn btn-primary d-inline edit" data-id="'+userId+'" data-username="'+username+'" data-usertype="'+usertype+'">edit</button> <button class="btn btn-danger delete" data-toggle="modal" data-target="#deleteUserModal" data-id="'+userId+'" data-username="'+username+'">delete</button></td></tr>';
        $("tbody").html(usersTable);
    });

});

$("tbody").on("click", ".edit", function(){
    let editUserId = $(this).data("id")
        username = $(this).data("username"),
        usertype = $(this).data("usertype");

    $(this).parent().parent().html('<td><input type="text" name="username" class="form-control" value="'+username+'" placeholder="Please enter a username"></td><td><select name="usertype" class="form-control"><?php $userPrivilege = $_SESSION["adminUser"]["privilegeId"];$privilegesSql = "SELECT * FROM `privileges` WHERE `id` <  '$userPrivilege'";$privilegesQuery = $query = $conn -> query($privilegesSql);foreach($privilegesQuery as $privilege){?><option value="<?= $privilege["id"] ?>"><?= $privilege["name"] ?></option><?php } ?></select></td><td><button class="btn btn-danger dismessEdit"><i class="fas fa-fw fa-regular fa-circle-xmark"></i></button> <button class="btn btn-primary confirmEdit" data-id="'+editUserId+'"><i class="fas fa-check fa-fw"></i></button></td>');
});

$("tbody").on("click", ".confirmEdit", function(){
    let editUserId = $(this).data("id"),
        username = $(this).parent().prev().prev().children().val(),
        usertype = $(this).parent().prev().children().val(),
        privilege;

    if(+usertype == 1){
        privilege = "customer";
    } else if(+usertype == 2){
        privilege = "supervisor";
    } else if(+usertype == 3){
        privilege = "admin";
    } else if(+usertype == 4){
        privilege = "owner";
    }
    
    $.post("functions/users/editUser.php", {id: editUserId, username, usertype}, function(){});

    $(this).parent().parent().html('<td>'+username+'</td><td>'+privilege+'</td><td><button class="btn btn-primary d-inline edit" data-id="'+editUserId+'" data-username="'+username+'" data-usertype="'+usertype+'">edit</button> <button class="btn btn-danger delete" data-toggle="modal" data-target="#deleteUserModal" data-id="'+editUserId+'" data-username="'+username+'">delete</button></td>');
});
</script>