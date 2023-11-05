<!-- Add Subcategory Modal -->
<div class="modal fade" id="addSubCategoryModal" tabindex="-1" aria-labelledby="addSubCategoryModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add A Subcategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="categoryName">Name</label>
            <input type="text" class="form-control" name="categoryName" placeholder="Enter the category name">
        </div>
        <div class="form-group">
            <label for="categoryParent">Parent Category</label>
            <select name="categoryParent" class="form-control">
              <?php
              $categorySql = "SELECT * FROM `category` WHERE `parent` = '0'";
              $categoryQuery = $conn -> query($categorySql);
              foreach($categoryQuery as $category){?>
                <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
              <?php } ?>                    
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="addSubCategoryPost">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- Add Subcategory Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add A Subcategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="categoryName">name</label>
            <input type="text" class="form-control" name="categoryName" placeholder="Enter the category name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="addCategoryPost">Add</button>
      </div>
    </div>
  </div>
</div>
<h1 class="h3 mb-2 text-gray-800">Categories</h1>
                    <p class="mb-4">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Add A Category</button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addSubCategoryModal">Add A Sub Category</button>
                    </p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Category</h6>
                        </div>
                        <br>
                        <div class="card-body">
                            <div class="row">
                            <div class="card-header">
                    </div>
                                <div class="col-sm">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>category</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php
                                              $categorySql = "SELECT * FROM category WHERE 1";
                                              $categoryQuery = $conn -> query($categorySql);
                                              foreach($categoryQuery as $category){
                                              ?>
                                                <tr>
                                                    <td>
                                                      <?= $category["name"]; ?></td>
                                                    <td>
                                                      <?php
                                                      if($category["parent"] == 0){
                                                          echo "this is a parent category";
                                                      } else{
                                                          $parentCategoryId = $category["parent"];
                                                          $parentCategorySql = "SELECT `name` FROM category WHERE `id` = '$parentCategoryId'";
                                                          $parentCategoryQuery = $conn -> query($parentCategorySql);
                                                          foreach($parentCategoryQuery as $parentCategory){ echo $parentCategory["name"]; }
                                                      }
                                                      ?>    
                                                    </td>
                                                    <td style="display: flex;">
                                                        <form action="?action=edit" method="post" style="display: inline;">
                                                            <input type="hidden" name="id" value="<?= $category["id"]; ?>">
                                                            <input type="hidden" name="name" value="<?= $category["name"]; ?>">
                                                            <button class="btn btn-primary d-inline" onclick="return confirm('Where Are You Edit Your Form This OK')"><i class="far fa-edit"></i></button>
                                                        </form>
                                                        <a href="./functions/categories/deleteCategory.php?id=<?= $category["id"]; ?>">
                                                        <button class="btn btn-danger" onclick="return confirm('Where Are You Delete Your Form This OK')"><i class="fas fa-trash-alt"></i></button></a>
                                                    </td>
                                                </tr>
<?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2">
                                                        <button class="btn btn-primary"> <?= mysqli_num_rows($categoryQuery);?>
                                                        category
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
