<?php
    require_once 'dashboard/functions/connect.php';
    session_start();
    $userId = $_SESSION['user']['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tabadal Schedule</title>
    <link href="dashboard/img/Tabadal.jpg" rel="icon">
    <link href="dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link href="dashboard/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="dashboard/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Schedule</h1>
                    <p class="mb-4">
                        <a href="post.php"><button class="btn btn-primary">Add A Advertisement</button></a>
                    </p>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Announcements Schedule</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Img</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(!isset($_SESSION["username"]) =='user')
                                            {
                                            $productSql = "SELECT * FROM products";
                                            $productQuery = $query = $conn -> query($productSql);
                                            foreach($productQuery as $product){
                                        ?>
                                        <tr>
                                            <td><?= filter_var($product['name'],FILTER_SANITIZE_STRING) ?></td>
                                            <td><?= filter_var($product["price"],FILTER_SANITIZE_NUMBER_INT )?></td>
                                            <td><?= filter_var($product["quantity"],FILTER_SANITIZE_NUMBER_INT )?></td>
                                            <td><?= filter_var($product["date"],FILTER_SANITIZE_NUMBER_INT )?></td>
                                            <td><?= filter_var($product['description'],FILTER_SANITIZE_STRING) ?></td>
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
                                                
                                            <td>
                                                <?php
                                                    $imgs = explode(",", $product['img']);
                                                    foreach($imgs as $img){
                                                        echo "<img src='dashboard/img/db/{$img}' style='width:50px;height:50px;'>";
                                                    }
                                                ?>
                                            </td>
                                            <?php
                                                    }
                                                ?>
                                            <?php }?>
                                        </tr> 
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website Tabadal-Shop 2023</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="dashboard/vendor/jquery/jquery.min.js"></script>
    <script src="dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="dashboard/js/sb-admin-2.min.js"></script>
    <script src="dashboard/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="dashboard/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="dashboard/js/demo/datatables-demo.js"></script>
</body>
</html>