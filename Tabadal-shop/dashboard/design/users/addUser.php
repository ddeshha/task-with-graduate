<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">add a user</h1>
	</div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <form method="post" action="./functions/users/addUser.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter the username">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter the password">
            </div>
            <div class="form-group">
                <label for="usertype">User type</label>
                    <select name="usertype" class="form-control">
                    <?php
                    $userPrivilege = $_SESSION["adminUser"]["privilegeId"];
                    $privilegesSql = "SELECT * FROM `privileges` WHERE `id` <  '$userPrivilege'";
                    $privilegesQuery = $query = $conn -> query($privilegesSql);
                    foreach($privilegesQuery as $privilege){?>
                        <option value="<?= $privilege["id"] ?>"><?= $privilege["name"] ?></option>
                    <?php } ?>                    
                    </select>
            </div>
            <button type="submit" class="btn btn-primary">add user</button>
        </form>
    </div>
</div>