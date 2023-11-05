<?php
require_once("./dashboard/functions/connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TABADAL SHOP</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="dashboard/img/Tabadal.jpg" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="index.php">TABADAL</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="font-weight-bold border px-3 mr-1" style="color:#7878ea;">T</span>ABADAL</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="" class="secondForm">
                    <div class="input-group">
                        <select id="con"class="form-control" aria-label="Default select example">
                            <option disabled selected>Select City</option>
                                <?php 
                                    $city = "SELECT * FROM city ";
                                    $cityCat = $conn -> query($city);
                                    foreach ($cityCat as $city) {
                                ?>
                                    <option value="<?= $city['id']?>"> <?= $city['name']?></option>
                                <?php 
                                    } 
                                    
                                ?>
                        </select>
                    </div>    
                </form>        
            </div>     
            <div class="col-lg-3 col-6 text-right">
                <?php
                    if(isset($_SESSION['user'])){
                        $userId = $_SESSION['user']['id'];
                        $cartNumSql = "SELECT COUNT(*) FROM `cart` WHERE `userId` = '$userId'";
                        $cartNumQuery = $conn -> query($cartNumSql);
                        foreach($cartNumQuery as $cartNum){
                            $cartCount = $cartNum["COUNT(*)"];
                        }
                        } else{
                        $cartCount = 0;
                        }
                ?>       
                <a href="<?= isset($_SESSION["user"]) ? "profile/profile.php" : "./login.php" ?>" class="btn border">
                    <i><img src="img/icon.png" alt="NoImage" style = "width:30px;"></i>
                    <?= isset($_SESSION["user"]) ? $_SESSION["user"]["username"] : "Login" ?>  
                </a>
            </div>
        </div>
    </div>
    
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">T</span>ABADAL</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <?php 
                                        $selectCat = "SELECT * FROM `category` LIMIT 4 ";
                                        $queryCat = $conn -> query($selectCat);
                                        foreach ($queryCat as $category) {
                                    ?>
                                    <a href="?category_id= <?= $category['id']?>" class="nav-item nav-link">
                                            <?= $category['name']?>
                                        </a>
                                    </li>
                                    <?php 
                                        } 
                                    ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Categories</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <?php 
                                        $selectCat = "SELECT * FROM `category` ";
                                        $queryCat = $conn -> query($selectCat);
                                        foreach ($queryCat as $category) {
                                    ?>
                                    <li class="p-t-4">
                                        <a href="?category_id= <?= $category['id']?>" class="dropdown-item">
                                            <?= $category['name']?>
                                        </a>
                                    </li>
                                    <?php 
                                        } 
                                    ?>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="col-lg-4 col-8 text-left">
                        <?php
                        require_once("./dashboard/functions/connect.php");
                        ?>
                                <form method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search for products">
                                        <div class="input-group-append">
                                            <button type="submit" style="background:#7878ea;" name="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form> 
                                
                            </div>
                        <div class="navbar-nav ml-auto py-0">
                            <?php 
                                if(isset($_SESSION["user"]) ? : "Login")
                                {
                                    echo '<a href="functions/logout.php" class="nav-item nav-link" style="color:red;"><i class="fas fa-sign-out-alt"></i> Logout</a>';
                                    
                                }elseif (isset($_SESSION["user"]))
                                {
                                    echo '<a href="login.php" class="nav-item nav-link">Login</a>' ;
                                } 
                            ?>
                        </div>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid"  src="img/shop3.jpg" alt="Image">
                        </div>
                    
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/shop4.jpg" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Navbar End -->


