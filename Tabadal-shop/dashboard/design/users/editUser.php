<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit user</h1>
	</div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="./functions/users/editUser.php">
            <div class="form-group">
<?php
$id = $_POST["id"];
$username = $_POST["username"];
$usertype = $_POST["usertype"];
?>
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter the username" value="<?= $username ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?= $email='email' ?>">
            </div>
            <div class="form-group">
                <label for="number">Number</label>
                <input type="number" class="form-control" name="number" id="number" value="<?= $number='number' ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="(unchanged)">
            </div>
            <div class="form-group">
                <label for="usertype">User type</label>
                    <select name="usertype" class="form-control">
<?php
$userPrivilege = $_SESSION["adminUser"]["privilegeId"];
$privilegesSql = "SELECT * FROM `privileges` WHERE `id` <  '$userPrivilege'";
$privilegesQuery = $query = $conn -> query($privilegesSql);

foreach($privilegesQuery as $privilege){?>
                        <option value="<?= $privilege["id"] ?>" <?= $usertype == $privilege["id"] ? "selected" : "" ?>><?= $privilege["name"] ?></option>
<?php } ?>  
                    </select>
            </div>
            <input type="hidden" name="id" value="<?= $id ?>">
            <button type="submit" class="btn btn-primary">edit user</button>
        </form>
    </div>
</div>