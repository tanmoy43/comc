<?php
ob_start();
session_start();
include('backend/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Password</title>
    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <div class="col-sm-6 col-sm-offset-3 text">
                    <div class="form-box">
                        <div class="form-top">
                            
  <?php

    if(isset($_GET['email']) && isset($_GET['token'])){

        $email =  mysqli_real_escape_string($conn,($_GET['email']));
        $token =  mysqli_real_escape_string($conn,($_GET['token']));

        $query="SELECT id from users where email='$email' AND token='$token' AND token<>'' AND tokenExpire > NOW()";
        //var_dump($query);
        $fire= mysqli_query($conn, $query);
        //var_dump($fire);
        $count = mysqli_num_rows($fire);
        //var_dump($count);

        if( $count == 1){

          if(isset($_POST['create_btn'])){
            $pass = $_POST['pass'];
            if(empty($pass)){
              $_SESSION['status'] = 'Felid is required';
            }
            else if(strlen($pass)<8){
              $Errormsg['pass'] = "Password is too small";
            }
            else{
              $pass = $_POST['pass'];
              $pass = mysqli_real_escape_string($conn,md5(htmlspecialchars(stripslashes(trim($pass)))));
            }
            $up_query = "UPDATE users set token='', password='$pass' where email='$email'";
            //var_dump($up_query);
            $up_fire = mysqli_query($conn, $up_query);
            //var_dump($up_fire);
            $_SESSION['success'] = 'Password Create successfully';
          }
          ?>


                            <div class="form-top-left">
                                <h3>Create New Password</h3>
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
                            <p>Enter New password:</p>
                            <form action="" method="post" class="">
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Password</label>
                                    <input type="text" name="pass" placeholder="Type new password" class="form-control"
                                        id="form-username">
                                </div>
                                <button type="submit" name="create_btn" class="btn col-sm-5">Submit</button>
                                <br><br>
                                <a  href="login.php" class="btn btn-info">Go to Login</a>
                                <br><br><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
        }
        else{
            $_SESSION['status'] = "Token Expired";
            header('Location: forgotpassword.php');
            ob_flush();
        }?>

   <?php
    }else{
        header('Location: http://tanmoybarua.xyz/PROJECT_DIP/forgotpassword.php');
    }
?>


<script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>