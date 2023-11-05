<?php
require_once("./functions/connect.php");

session_start();
session_regenerate_id();

if(!isset($_SESSION['adminUser'])){
	header('Location: ../login.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tabadal - Dashboard</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/Tabadal.jpg" type="image/x-icon">
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-tumblr-square"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Tabadal<sup>Store</sup></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item <?= $current == "index" ? "active" : "" ?>">
                <a class="nav-link" href="index.php">
                    <i class="far fa-handshake"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item <?= $current == "users" ? "active" : "" ?>">
                <a class="nav-link" href="users.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>
            <?php
            if($_SESSION["adminUser"]["privilegeId"] > 2){
            ?>
            <li class="nav-item <?= $current == "products" ? "active" : "" ?>">
                <a class="nav-link" href="products.php">
                    <i class="fab fa-product-hunt"></i>
                    <span>Products</span></a>
            </li>
            <li class="nav-item <?= $current == "categories" ? "active" : "" ?>">
                <a class="nav-link" href="categories.php">
                    <i class="far fa-closed-captioning"></i>
                    <span>Categories</span></a>
            </li>
            <li class="nav-item <?= $current == "branads" ? "active" : "" ?>">
                <a class="nav-link" href="branads.php">
                    <i class="fab fa-bitcoin"></i>
                    <span>Brands</span></a>
            </li>
            <li class="nav-item <?= $current == "branad" ? "active" : "" ?>">
                <a class="nav-link" href="branad.php">
                    <i class="fab fa-bitcoin"></i>
                    <span>Brand</span></a>
            </li>
            <li class="nav-item <?= $current == "city" ? "active" : "" ?>">
                <a class="nav-link" href="city.php">
                    <i class="fas fa-home"></i>
                    <span>Country</span></a>
            </li>
        
            <li class="nav-item <?= $current == "messages" ? "active" : "" ?>">
                <a class="nav-link" href="messages.php">
                    <i class="far fa-comments"></i>
                    <span>Messages</span></a>
            </li>
            <?php } ?>
            <br>
            <br>
            <br>
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" style="background: #6777ef;" id="sidebarToggle"></button>
            </div>

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                        <button id="sidebarToggleTop" class="nav-link nav-link-lg mail-btn rounded-circle mr-3" style="color: #6777ef; border:none;">
                            <i class="fa fa-bars"></i>
                        </button>
                            <li>
                                <button class="nav-link nav-link-lg mail-btn rounded-circle mr-3" style="color: #6777ef; border:none;">
                                    <a href="http://wa.me/+201063211934"target=" _blank">
                                        <i class="fab fa-whatsapp fa-fw"></i>
                                    </a>
                                </button>
                            </li>
                            <li>
                            <button class="nav-link nav-link-lg mail-btn rounded-circle mr-3" style="color: #6777ef; border:none;">
                                <a href="sms:01023800994" target=" _blank">
                                    <i class="fas fa-envelope fa-fw"></i>
                                </a>
                            </button>    
                            </li>
                            </li>
                        </ul>
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <span class="badge badge-danger badge-counter" id="mesNum">
                                <?php
                                $mesNumSql = "SELECT COUNT(*) FROM `messages` WHERE `viewed` = '0'";
                                $mesNumQuery = $conn -> query($mesNumSql);
                                $mesNum = $mesNumQuery->fetch_assoc();
                                echo $mesNum['COUNT(*)'];
                                ?>
                                </span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <?php
                                $messegesSql = "SELECT * FROM `messages` WHERE `viewed` = '0' LIMIT 3";
                                $messegesQuery = $conn -> query($messegesSql);
                                foreach($messegesQuery as $message){
                                ?>
                                <a class="dropdown-item d-flex align-items-center" href="messages.php">
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?= substr($message['content'], 0, 30) ?>...</div>
                                        <div class="small text-gray-500"><?= $message['name'] ?></div>
                                    </div>
                                </a>
                        <?php } ?>
                                <a class="dropdown-item text-center small text-gray-500" href="messages.php">Read More Messages</a>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION["adminUser"]["username"] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
            
        <div class="container-fluid">