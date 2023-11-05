<!-- Delete User Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteUserModal">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="deleteUser">delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserModal">Add a User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
$privilegesQuery = $conn -> query($privilegesSql);

foreach($privilegesQuery as $privilege){?>
                        <option value="<?= $privilege["id"] ?>"><?= $privilege["name"] ?></option>
<?php } ?>                    
                    </select>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="addUserPost">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Users</h1>
                    <p class="mb-4">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">add user</button>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All users</h6>
                        </div>
                        <div class="card-body">2
                            <div class="row">
                                <div class="col-sm">
                                    <p>Users</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Number</th>
                                                    <th>privilege</th>
                                                    <th>controls</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php
                                              $currentPrivlege = $_SESSION["adminUser"]["privilegeId"];
                                              $customerSql = "SELECT * FROM `users` WHERE `usertype` < '$currentPrivlege'";
                                              $customerQuery = $query = $conn -> query($customerSql);
                                              foreach($customerQuery as $user){
                                              ?>
                                                <tr>
                                                    <td><?= $user["username"] ?></td>
                                                    <td><?= $user["email"] ?></td>
                                                    <td><?= $user["number"] ?></td>
                                                    <?php
                                                    $userPrivilege = $user["usertype"];
                                                    $privilegeSql = "SELECT * FROM `privileges` WHERE `id` = '$userPrivilege'";
                                                    $privilegeQuery = $query = $conn -> query($privilegeSql);
                                                    foreach($privilegeQuery as $privilege){
                                                    ?>
                                                    <td><?= $privilege["name"] ?></td>
<?php } ?>
                                                    <td style="display: flex;">
                                                        <button class="btn btn-primary d-inline edit" data-id="<?= $user["id"]; ?>" data-username="<?= $user["username"]; ?>" data-username="<?= $user["usertype"]; ?>"><i class="far fa-edit"></i></button>
                                                        <button class="btn btn-danger delete" data-toggle="modal" data-target="#deleteUserModal" data-id="<?= $user["id"]; ?>" data-username="<?= $user["username"]; ?>"><i class="fas fa-trash-alt"></i></button>
                                                    </td>
                                                </tr>
<?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
