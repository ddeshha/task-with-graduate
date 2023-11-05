<?php
        require_once("./dashboard/functions/connect.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Chat Callery</title>
    <link href="dashboard/img/Tabadal.jpg" rel="icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="chat-main-row">
                <div class="chat-main-wrapper">
                    <div class="col-lg-9 message-view chat-view">
                        <div class="chat-window">
                            <div class="fixed-header">
                                <div class="navbar">
                                    <div class="user-details mr-auto">
                                        <div class="float-left user-img m-r-10">
                                            <a href="#" title="Jennifer Robinson"><img src="img/icon.png" alt="" class="w-40 rounded-circle"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-footer">
                                <div class="message-bar">
                                    <div class="message-inner">
                                        <div class="message-area">
                                            <div class="input-group">
                                                <textarea class="form-control" placeholder="Type message..."></textarea>
                                                <span class="input-group-append">
													<button class="btn btn-primary" id="message" type="submit"><i class="fa fa-send"></i></button>
												</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 message-view chat-profile-view chat-sidebar" id="chat_sidebar">
                        <div class="chat-window video-window">
                            <div class="tab-content chat-contents">
                                <div class="content-full tab-pane show active" id="profile_tab">
                                    <div class="display-table">
                                        <div class="table-row">
                                            <div class="table-body">
                                                <div class="table-content">
                                                <?php  
                                                        $productId  = $_GET ['id'];
                                                        $select = "SELECT * FROM products WHERE `id` = $productId ";
                                                        $query = $conn -> query($select);
                                                        $product = $query -> fetch_assoc();
                                                    ?>
                                                    <div class="chat-profile-img">
                                                        <div class="edit-profile-img">
                                                            <img src="img/icon.png" alt="">
                                                        </div>
                                                        <h3 class="user-name m-t-10 mb-0"><?= $product ['username'] ?></h3>
                                                        <small class="text-muted"><?= $product ['username'] ?></small>
                                                    </div>
                                                    <div class="chat-profile-info">
                                                        <ul class="user-det-list">
                                                            <li>
                                                                <span>Product Name:</span>
                                                                <span class="float-right text-muted"><?= $product ['name'] ?></span>
                                                            </li>
                                                            <li>
                                                                <span> Product Data:</span>
                                                                <span class="float-right text-muted"><?= $product ['date'] ?></span>
                                                            </li>
                                                            <li>
                                                                <span>Email:</span>
                                                                <span class="float-right text-muted"><a href="mailto:<?php echo $product['email']; ?>"><?php echo $product['email']; ?></a></span>
                                                            </li>
                                                            
                                                            <li>
                                                                <span>Phone:</span>
                                                                <span class="float-right text-muted">+20<a href="tel:+<?php echo $product['number']; ?>"><?php echo $product['number']; ?></a></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>