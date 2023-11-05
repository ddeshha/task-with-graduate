<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Brand</h1>
        <p class="mb-4">
            <a href="?action=add"><button class="btn btn-primary">Add A Brand</button></a>
        </p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Brand</h6>
                </div>
                <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Sale</th>
                                                    <th>Quantity</th>
                                                    <th>Description</th>
                                                    <th>Brands</th>
                                                    <th>Img</th>
                                                    <th colspan="1" style="text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                        $id = 1;
                                        $brandSql = "SELECT * FROM brand WHERE 1";
                                        $brandQuery = $query = $conn -> query($brandSql);
                                        foreach($brandQuery as $brand){
                                        ?>
                                                <tr>
                                                    <td><?= $id++; ?></td>
                                                    <td><?= filter_var($brand['name'],FILTER_SANITIZE_STRING) ?></td>
                                                    <td><?= filter_var($brand["price"],FILTER_SANITIZE_NUMBER_INT )?></td>
                                                    <td><?= filter_var($brand["sale"],FILTER_SANITIZE_NUMBER_INT )?></td>
                                                    <td><?= filter_var($brand["quantity"],FILTER_SANITIZE_NUMBER_INT )?></td>
                                                    <td><?= filter_var($brand['description'],FILTER_SANITIZE_STRING) ?></td>
                                            <?php
                                                $brandsId = filter_var($brand['brand_id'],FILTER_SANITIZE_NUMBER_INT) ;
                                                $brandsSql = "SELECT * FROM brands WHERE `id` = '$brandsId'";
                                                $brandsQuery = $query = $conn -> query($brandsSql);
                                                foreach($brandsQuery as $brands){
                                            ?>
                                                <td><?= filter_var($brands['name'],FILTER_SANITIZE_STRING)?></td>
                                                <?php
                                                    }
                                                ?>
                                                    <td>
                                                        <img style="width: 50px; height: 50px;" class="" src="img/db/<?= $brand['img'] ?>" alt="No-Image">
                                                    </td>
                                                    <td style="display: flex;">
                                                        <form action="?action=edit" method="POST" style="display: inline;">
                                                            <input type="hidden" name="id" value="<?= $brand["id"]; ?>">
                                                            <input type="hidden" name="name" value="<?= filter_var($brand['name'],FILTER_SANITIZE_STRING) ?>">
                                                            <input type="hidden" name="price" value="<?= filter_var($brand["price"],FILTER_SANITIZE_NUMBER_INT ); ?>">
                                                            <input type="hidden" name="sale" value="<?= filter_var($brand["sale"],FILTER_SANITIZE_NUMBER_INT ); ?>">
                                                            <input type="hidden" name="quantity" value="<?= filter_var($brand["quantity"],FILTER_SANITIZE_NUMBER_INT ); ?>">
                                                            <input type="hidden" name="description" value="<?= filter_var($brand['description'],FILTER_SANITIZE_STRING); ?>">
                                                            <input type="hidden" name="brand_id" value="<?= filter_var($brand['brand_id'],FILTER_SANITIZE_NUMBER_INT); ?>">
                                                            <input type="hidden" name="img" value="<?= $brand["img"]; ?>">
                                                            <button class="btn btn-primary d-inline" onclick="return confirm('Where Are You Edit Your Form This OK')"><i class="far fa-edit"></i></button>
                                                        </form>                                       
                                                        <a href="./functions/Brand/deletebrand.php?id= <?= filter_var($brand['id'],FILTER_SANITIZE_NUMBER_INT);; ?>">
                                                        <button class="btn btn-danger" onclick="return confirm('Where Are You Delete Your Form This OK')"><i class="fas fa-trash-alt"></i></button></a>
                                                    </td>
                                                </tr>
<?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <button class="btn btn-primary"> <?= mysqli_num_rows($brandQuery);?>
                                                    Brand
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