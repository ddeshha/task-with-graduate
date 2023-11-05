    <?php require_once("./dashboard/functions/connect.php");
    session_start();?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <title>Tabadal Post</title>
            <link href="dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
            <link href="dashboard/css/sb-admin-2.min.css" rel="stylesheet">
            <link rel="shortcut icon" href="dashboard/img/Tabadal.jpg" type="image/x-icon">
        </head>
        <body class="bg-gradient-secondary">
            <div class="container">
                <div class="card o-hidden border-1 shadow-lg my-5">
                    <div class="card-body p-10">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Post Your Ad</h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST" action="./dashboard/functions/products/addpost.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter the product name"required >
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" name="price" placeholder="Enter the price"required>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" class="form-control" name="quantity" placeholder="Enter the quantity"required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select country</label>
                                            <select name="city_id" class="form-control" id="exampleFormControlSelect1" required>
                                            <option disabled selected> Select country</option>
                                            <?php
                                                $citySql = "SELECT * FROM city WHERE 1";
                                                $cityQuery = $query = $conn -> query($citySql);
                                                foreach($cityQuery as $city){
                                            ?>
                                                <option value="<?= $city["id"] ?>"><?= $city["name"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" class="form-control" name="date" placeholder="Enter the Date"required>
                                    </div>
                                    <?php
                                    if(isset($_SESSION['user'])){
                                        $userId = $_SESSION['user']['id'];
                                        $users = "SELECT FROM `users` WHERE `userId` = '$userId'";
                                    }    
                                ?>      
                                <div class="form-group">
                                    <label for="user">User</label> 
                                    <input type="text" placeholder="Enter the user"  name="username" class="form-control"readonly
                                    value="<?= isset($_SESSION["user"]) ? $_SESSION["user"]["username"] : "Login" ?>">
                                </div> 
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter the email"required>
                                </div>
                                <div class="form-group">
                                    <label for="number">number</label>
                                    <input type="number" class="form-control" name="number" placeholder="Enter the number"required>
                                </div>
                                    <div class="form-group">
                                        <label for="img">img</label>
                                        <input type="file" class="form-control form-control-admin" name="img[]" placeholder="Enter the img" multiple required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" cols="115" rows="4" required>
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Category</label>
                                            <select name="categoryId" class="form-control" id="exampleFormControlSelect1" required>
                                            <option disabled selected> open Category</option>
                                            <?php
                                                $categorySql = "SELECT * FROM category WHERE 1";
                                                $categoryQuery = $query = $conn -> query($categorySql);
                                                foreach($categoryQuery as $category){
                                            ?>
                                                <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="dashboard/vendor/jquery/jquery.min.js"></script>
            <script src="dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="dashboard/js/sb-admin-2.min.js"></script>
        </body>
    </html>