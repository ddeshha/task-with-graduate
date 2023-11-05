
        <div id="content">
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Slider</h1>
                <p class="mb-4">
                    <a href="?action=add"><button class="btn btn-primary">Add A Slider</button></a>
                </p>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Slider</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Img</th>
                                        <th colspan="1" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $id = 1;
                                        $sliderql = "SELECT * FROM slider WHERE 1";
                                        $sliderQuery = $query = $conn -> query($sliderql);
                                        foreach($sliderQuery as $slider){
                                    ?>
                                    <tr>
                                        <td><?= $id++; ?></td>
                                        <td>
                                            <img style="width: 50px; height: 50px;" class="" src="img/db/<?= $slider['img'] ?>" alt="No-Image">
                                        </td>
                                        <td style="display: flex;">
                                            <form action="?action=edit" method="POST" style="display: inline;">
                                                <input type="hidden" name="id" value="<?= $slider["id"]; ?>">
                                                <input type="hidden" name="img" value="<?= $slider["img"]; ?>">
                                                <button class="btn btn-primary d-inline" onclick="return confirm('Where Are You Edit Your Form This OK')" ><i class="far fa-edit"></i></button>
                                            </form>
                                            
                                            <a href="./functions/slider/deleteslider.php?id=<?= filter_var($slider['id'],FILTER_SANITIZE_NUMBER_INT);?>">
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
                                            <button class="btn btn-primary"> <?= mysqli_num_rows($sliderQuery);?>
                                                Slider
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