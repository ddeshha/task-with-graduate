<?php
require_once '../dashboard/functions/connect.php';
session_start();
$userId = $_SESSION['user']['id'];
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
            <title>Profile Tabadal</title>
            <link href="../dashboard/img/Tabadal.jpg" rel="icon">
            <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        </head>
        <body>
            <div class="main-wrapper">
                <div class="page-wrapper">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-7 col-6">
                                <h4 class="page-title">My Profile</h4>
                            </div>
                        </div>
                        <div class="card-box profile-header">
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="profile-view">
                                        <div class="profile-img-wrap">
                                            <div class="profile-img">
                                                <a href="#"><img class="avatar" src="../img/icon.png" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="profile-basic">
                                            <div class="row">
                                            <?php
                                                $select = $conn->query("SELECT * FROM `users` WHERE `id` = '$userId'");
                                                if (mysqli_num_rows($select) > 0) {
                                                    $fetah = mysqli_fetch_assoc($select);
                                                }
                                                ?>
                                                <div class="col-md-5">
                                                    <div class="profile-info-left">
                                                        <h3 class="user-name m-t-0 mb-0"><?php echo $fetah['username']; ?></h3>
                                                        <small class="text-muted"><?php echo $fetah['username']; ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <ul class="personal-info">
                                                        <li>
                                                            <span class="title">Phone:</span>
                                                            <span class="text">+20<a href="tel:+<?php echo $fetah['number']; ?>"><?php echo $fetah['number']; ?></a></span>
                                                        </li>
                                                        <li>
                                                            <span class="title">Email:</span>
                                                            <span class="text"><a href="mailto:<?php echo $fetah['email']; ?>"><?php echo $fetah['email']; ?></a></span>
                                                        </li>
                                                        <li>
                                                            <span class="title">GO Back:</span>
                                                            <span class="text"><a href="../index.php">Home Page</a></span>
                                                        </li>
                                                        <li>
                                                            <span class="title">Post An Ad:</span>
                                                            <span class="text"><a href="../post.php">Post An Ade</a></span>
                                                        </li>
                                                        <!-- <li>
                                                            <span class="title">My Ads:</span>
                                                            <span class="text"><a href="../MyAds.php">My Ads</a></span>
                                                        </li> -->
                                                        <li>
                                                            <span class="title">Logout:</span>
                                                            <span class="text"><a href="../functions/logout.php" style="color:red;"><i class="fas fa-sign-out-alt"></i> Logout</a></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                        
                                </div>
                            </div>
                        </div>
                        <div class="profile-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom">
                                <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Messages</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="bottom-tab3">
                                <?php echo $fetah['message']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar-overlay" data-reff=""></div>
            <script src="../assets/js/jquery-3.2.1.min.js"></script>
            <script src="../assets/js/popper.min.js"></script>
            <script src="../assets/js/bootstrap.min.js"></script>
            <script src="../assets/js/jquery.slimscroll.js"></script>
            <script src="../assets/js/app.js"></script>
        </body>
    </html>