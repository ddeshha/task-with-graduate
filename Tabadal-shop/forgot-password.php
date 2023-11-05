<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Profile Tabadal</title>
    <link href="dashboard/img/Tabadal.jpg" rel="icon">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
                <div class="account-box">
                    <form class="form-signin" method="POST" action="functions/password.php">
						<div class="account-logo">
                            <img src="dashboard/img/Tabadal.jpg" alt="">
                        </div>
                        <div class="form-group">
                            <label>Enter Your UserName</label>
                            <input type="text" name="username" class="form-control" autofocus>
                        </div>
                        <div class="form-group">
                            <label>New Pssword</label>
                            <input type="password" name="password" class="form-control" autofocus>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-dark account-btn" name="submit" type="submit">Reset Password</button>
                        </div>
                        <div class="text-center register-link">
                            <a href="login.php">Back to Login</a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>