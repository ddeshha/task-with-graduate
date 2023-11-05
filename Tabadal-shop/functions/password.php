    <?php
    require_once "../dashboard/functions/connect.php";
    
        if (isset($_POST['submit']))
        {
            $password = md5($_POST['password']);
            if (mysqli_query($conn,"UPDATE users SET password = '$password' WHERE username = '$_POST[username]'"))
            {
                header("Location: ../login.php");
            }
        }
    ?>