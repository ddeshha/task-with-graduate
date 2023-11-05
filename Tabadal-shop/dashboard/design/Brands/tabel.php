
    <h1 class="h3 mb-2 text-gray-800">Brands</h1>
    <p class="mb-4">
        <a href="?action=add"><button class="btn btn-primary">Add A Brands</button></a>
    </p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Brands</h6>
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
                                    <th colspan="1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $id = 1;
                                        $brandsSql = "SELECT * FROM brands WHERE 1";
                                        $brandsQuery = $query = $conn -> query($brandsSql);
                                        foreach($brandsQuery as $brands)
                                        {
                                    ?>
                                <tr>
                                    <td><?= $id++; ?></td>
                                    <td><?= filter_var($brands['name'],FILTER_SANITIZE_STRING) ?></td>
                                    <td style="display: flex;">
                                        <form action="?action=edit" method="POST" style="display: inline;">
                                            <input type="hidden" name="id" value="<?= filter_var($brands['id'],FILTER_SANITIZE_NUMBER_INT)?>">
                                            <input type="hidden" name="name" value="<?= filter_var($brands['name'],FILTER_SANITIZE_STRING) ?>">
                                            <button class="btn btn-primary d-inline"onclick="return confirm('Where Are You Edit Your Form This OK')"><i class="far fa-edit"></i></button>
                                        </form>
                                    
                                        <a href="./functions/Brands/deletebrands.php?id=<?= filter_var($brands['id'],FILTER_SANITIZE_NUMBER_INT)?>">
                                            <button class="btn btn-danger"onclick="return confirm('Where Are You Delete Your Form This OK')">
                                            <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                    <?php
                                        } 
                                    ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">
                                        <button class="btn btn-primary"> <?= mysqli_num_rows($brandsQuery);?>
                                            Brands
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