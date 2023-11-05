<?php 
    $current = "index";
    require_once 'inc/header.php'
?>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4 " style="background: #e4e5e7; height: 281px;">
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Want to see your stuff here?</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Gain more money through posting your ads, there is no easier and quicker way!</h6>
                        </div>
                    </div>
                    
                    <div class="article-details" style="background-color: #626f87; padding: 20px; line-height: 66px;">
                            <div class="article-cta">
                                <a href="post.php" class="btn btn-primary">Start Selling</a>
                            </div>
                        </div>
                </div>
            </div>
                <?php
                
                    if(isset($_GET['search']))
                    {
                        $search = $_GET['search'] ;
                        $selectPro = "SELECT * FROM products  WHERE name LIKE '%$search%' ";
                    }
                    elseif (!isset( $_GET['category_id']))
                    {
                        $selectPro = "SELECT * FROM products";
                    }
                    else 
                    {
                        $category_id = $_GET['category_id'];
                        $selectPro = "SELECT * FROM products WHERE category_id = $category_id ";
                    }
                    if (isset($_GET['city'])) {
                        $city_id = $_GET['city'];
                        $selectPro = "SELECT * FROM products WHERE city_id = $city_id";
                    }
                    $query = $conn -> query($selectPro);
                        foreach ($query as $product)
                        {
                        require_once "dashboard/functions/GetImgs.php";
                        $imgs = GetImgs::get($product["id"], $conn);
                        $productImgs = explode(",", $product['img']);
                ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <article class="article" style="box-shadow: 0 4px 25px 0 rgba(0,0,0,0.1); background-color: #fff; border-radius: 10px; border: none; position: relative; margin-bottom: 30px; box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);">
                        <div class="article-header" style="height: 170px; position: relative; overflow: hidden;">
                            <div class="article-image" style="background-image: url(./dashboard/img/db/<?= $productImgs[0]; ?>); background-color: #fbfbfb; background-position: center; background-size: cover; background-repeat: no-repeat; width: 100%; height: 100%; z-index: -1;"
                                data-background="./dashboard/img/db/<?= $productImgs[0]; ?>">
                            </div>
                            <div class="article-title" style="position: absolute; bottom: 0; left: 0; width: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.01) 1%, rgba(0,0,0,0.65) 98%, rgba(0,0,0,0.65) 100%); padding: 10px;">
                            <h2 style="font-size: 16px; color:white; line-height: 24px;"> <?= $product['name']?></h2>
                            </div>
                        </div>
                        <div class="article-details" style="background-color: #626f87; padding: 20px; line-height: 24px;">
                            <h2 style="font-size: 16px; color:black; line-height: 24px;"><?= $product['price']?>ج م</h2>
                            <div class="article-cta">
                                <a href="detail.php?id=<?= $product["id"]; ?>" style="bacground:red;" class="btn btn-primary">View Product</a>
                            </div>
                        </div>
                    </article>
                </div>
                <?php }?>
        </div>
    </div>
    <?php require_once 'inc/footer.php'?>