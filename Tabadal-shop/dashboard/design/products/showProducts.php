
<div id="content">
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Products</h1>
                <p class="mb-4">
                    <a href="?action=add"><button class="btn btn-primary">Add A Product</button></a>
                </p>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Product</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>UserName</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>City</th>
                                        <th>Category</th>
                                        <th>Img</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $id = 1;
                                        $productSql = "SELECT * FROM products WHERE 1";
                                        $productQuery = $query = $conn -> query($productSql);
                                        foreach($productQuery as $product){
                                    ?>
                                    <tr>
                                        <td><?= $id++; ?></td>
                                        <td><?= filter_var($product['name'],FILTER_SANITIZE_STRING) ?></td>
                                        <td><?= filter_var($product["price"],FILTER_SANITIZE_NUMBER_INT )?></td>
                                        <td><?= filter_var($product["quantity"],FILTER_SANITIZE_NUMBER_INT )?></td>
                                        <td><?= filter_var($product["username"],FILTER_SANITIZE_STRING )?></td>
                                        <td><?= filter_var($product["date"],FILTER_SANITIZE_NUMBER_INT )?></td>
                                        <td><?= filter_var($product['description'],FILTER_SANITIZE_STRING) ?></td>
                                        <?php
                                            $cityId = filter_var($product['city_id'],FILTER_SANITIZE_NUMBER_INT) ;
                                            $citySql = "SELECT * FROM city WHERE `id` = '$cityId'";
                                            $cityQuery = $query = $conn -> query($citySql);
                                            foreach($cityQuery as $city){
                                        ?>
                                            <td><?= filter_var($city['name'],FILTER_SANITIZE_STRING)?></td>
                                        <?php
                                            }
                                        ?>
                                        <?php
                                            $categoryId = filter_var($product['category_id'],FILTER_SANITIZE_NUMBER_INT) ;
                                            $categorySql = "SELECT * FROM category WHERE `id` = '$categoryId'";
                                            $categoryQuery = $query = $conn -> query($categorySql);
                                            foreach($categoryQuery as $category){
                                        ?>
                                            <td><?= filter_var($category['name'],FILTER_SANITIZE_STRING)?></td>
                                        <?php
                                            }
                                        ?>
                                        <td style="display:flex;">
                                        <?php
                                        $imgs = explode(",", $product['img']);
                                        foreach($imgs as $img){
                                            echo "<img src='img/db/{$img}' style='width:30px; border-radius: 20px;' >";
                                        }
                                        ?>
                                        </td>
                                        
                                        <td>
                                            <form action="?action=edit" method="POST" style="display: inline;">
                                                <input type="hidden" name="id" value="<?= $product["id"]; ?>">
                                                <input type="hidden" name="name" value="<?= filter_var($product['name'],FILTER_SANITIZE_STRING) ?>">
                                                <input type="hidden" name="price" value="<?= filter_var($product["price"],FILTER_SANITIZE_NUMBER_INT ); ?>">
                                                <input type="hidden" name="quantity" value="<?= filter_var($product["quantity"],FILTER_SANITIZE_NUMBER_INT ); ?>">
                                                <input type="hidden" name="city_id" value="<?= filter_var($product["city_id"],FILTER_SANITIZE_STRING ); ?>">
                                                <input type="hidden" name="date" value="<?= filter_var($product["date"],FILTER_SANITIZE_STRING ); ?>">
                                                <input type="hidden" name="description" value="<?= filter_var($product['description'],FILTER_SANITIZE_STRING); ?>">
                                                <input type="hidden" name="category_id" value="<?= filter_var($product['category_id'],FILTER_SANITIZE_NUMBER_INT); ?>">
                                                <input type="hidden" name="img" value="<?= $product["img"]; ?>">
                                                <button class="btn btn-primary d-inline" onclick="return confirm('Where Are You Edit Your Form This OK')" ><i class="far fa-edit"></i></button>
                                            </form>
                                            <hr>
                                            <a colspan="2" href="./functions/products/deleteProduct.php?id=<?= filter_var($product['id'],FILTER_SANITIZE_NUMBER_INT);?>">
                                                <button class="btn btn-danger" onclick="return confirm('Where Are You Delete Your Form This OK')">
                                                <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                        <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <button class="btn btn-primary"> <?= mysqli_num_rows($productQuery);?>
                                                Porodact
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