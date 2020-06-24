<?php

session_start();
include('backend/config.php');


if(isset($_POST['frgot_btn'])){
    $email =  mysqli_real_escape_string($conn,(htmlspecialchars(stripslashes(trim($_POST['email'])))));;


    if($email==''){
        $_SESSION['status'] = 'Field can\'t empty';
        header('Refresh: 2');
    }

    if($email==TRUE){
        $query = "SELECT * from users where email = '$email'";
        $fire = mysqli_query($conn, $query);
        $count = mysqli_num_rows($fire);
        while($data=mysqli_fetch_assoc($fire)){
            $name = $data['name'];
        }
        if($count == 1){
            $token ="qwertyuioplkjhgfdsazxcvbnm1234567890";
            $token = str_shuffle($token);
            $token = substr($token, 0, 15);
            $query = "UPDATE users set token='$token', tokenExpire = DATE_ADD(NOW(), INTERVAL 10 MINUTE) where email='$email'";
            $fire = mysqli_query($conn, $query);
            $url = "http://tanmoybarua.xyz/forgotpassword.php/createnewpassword.php?email=".$email."&token=".$token;
            
            $to=$email;
            $subject="Reset your password";
            $message ="
            <html>

<head>
    <title>Rating Reminder</title>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <meta content='width=device-width' name='viewport'>
    <style>
    a{
        text-decoration: none;
    }
    body{
        background-color: #f1f1f1;
    }
    .header{
        width: 100%;
        height: 50px;
        background-color: #03A9F4;
        text-align: center;
        color: white;
        line-height: 50px;
    }
    .btn{
        display: inline-block;
        margin-bottom: 0;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .btn-info{
        font-weight: 600;
        color: #fff !important;
        background-color: #5bc0de;
        border-color: #46b8da;
    }
    </style>
</head>

<body>
    <h1 class='header'>COMC</h1>
    <p>Hi $name,</p>
    <p>In order to reset your password, please click in the link below:</p>
    <a class='btn btn-info' href='http://tanmoybarua.xyz/PROJECT_DIP/createnewpassword.php?email=$email&token=$token'>Reset password</a>
    <p>Kind Regard,</p>
    <p>COMC.</p>
</body>

</html>
            ";
            // $message .="Here Below your reset link:";
            // $message .='<a href="'.$url.'">'.$url.'</a></p>';

            $headers="From: COMC <comc@moneymanagement.xyz>\r\n";
            $headers.="Content-type: text/html\r\n";

            mail($to, $subject, $message, $headers);
            $_SESSION['success'] = 'Check your mail';
        }else{
            $_SESSION['status'] = 'Email does not exits';
            header('Refresh: 1');
        }
    }

}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Top content -->
    <div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <div class="col-sm-6 col-sm-offset-3 text">
                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Forgot Password</h3>
                                <?php
                                        if(isset($_SESSION['success']) && $_SESSION['success']!=''){?>
                                <p class="text-success"><?php echo $_SESSION['success']; ?></p>
                                <?php
                                       unset($_SESSION['success']);
                                        }                                     
                                        ?>

                                <?php
                                        if(isset($_SESSION['status']) && $_SESSION['status']!=''){?>
                                <p class="text-danger"><?php echo $_SESSION['status']; ?></p>
                                <?php
                                       unset($_SESSION['status']);
                                        }                                     
                                        ?>

                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-lock"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <p>Enter email address to get password:</p>
                            <form action="" method="post" class="">
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Email</label>
                                    <input type="text" name="email" placeholder="Email" class="form-control"
                                        id="form-username">
                                </div>
                                <button type="submit" name="frgot_btn" class="btn col-sm-5">Submit</button>
                                <br><br>
                                <a class="btn btn-primary" href="login.php">logIn</a>
                                <a class="btn btn-primary" href="regstration.php" style="float:right;">Register</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>