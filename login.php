<?php
include ('backend/config.php');

session_start();

if(isset($_SESSION['is_login_admin'])==true){

	header("Location: admin/index.php");
}
if(isset($_SESSION['is_login_user'])==true){

	header("Location: index.php");
}

if(!isset($_SESSION['is_login_admin']) || !isset($_SESSION['is_login_user'])){

	if(isset($_POST['btn_login'])){

	$email = mysqli_real_escape_string($conn,trim($_POST['email']));
	$pass = mysqli_real_escape_string($conn,md5(trim($_POST['pass'])));
	
	$quey = "SELECT * from users where email='$email' AND password='$pass'";
	$fire = mysqli_query($conn, $quey);
	$count=mysqli_num_rows($fire);
	$role = mysqli_fetch_array($fire);
	if($fire){
		if($count == 1){
			if($role['role']=='admin'){
				$_SESSION['is_login_admin'] = true;
				$_SESSION['email'] = $email;
	
				header("Location: admin/index.php");
			}
			else if($role['role']=='user'){
				$_SESSION['is_login_user'] = true;
				$_SESSION['email'] = $email;
				header("Location: index.php");
			}
			
			
	}else{
		$errormessage =  "Invalid username or password";
		$errorclass = "error";
	}
    }
}
}


?>
<!DOCTYPE html>
<html>

<head>
	<title>Login page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords"
		content="Trendy Login Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Custom Theme files -->
	<link href="css/login_style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
	<!-- web font -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!--web font-->
	<!-- //web font -->
</head>

<body>
	<!-- main -->
	<div class="page-wrapper bg-custom">
		<!-- <div class="w3top-nav">	
				<div class="w3top-nav-left">	
					<h1><a href="index.html"></a></h1>
				</div>	
				<div class="w3top-nav-right">	
					<ul>
						<li><a href="index.php" class="active">Home</a></li>
						<li><a href="#">File complaint</a></li>
						<li><a href="#">privacy Notice</a></li> 
						<li><a href="#">Help line</a></li>
						<li><a href="regstration.php">Registration</a></li> 
						<li><a href="login.php">Login</a></li> 
					</ul> 
				</div>	
				<div class="clear"></div>
			</div>	 -->

		<div class="menu-bar">

			<ul>

				<li class="active"><a href="index.php"><i class="fa fa-home"></i>HOME</a></li>



			<?php
			if(isset($_SESSION['is_login_user'])){?>

			<li><a href="#"><i class="fa fa-building"></i>COMPLAINT</a>
				<div class="sub-menu-1">
					<ul>
						<li><a href="city_complain_form.php">FOR CITY-CORPORATION</a></li>
						<li><a href="police_complain_form.php">FOR POLICE</a></li>
					</ul>
				</div>
			</li>
			<?php } ?>

				<li><a href="#"><i class="fa fa-user-secret"></i>PRIVACY</a></li>

				<li><a href="#"><i class="fa fa-address-book"></i>CONTACT</a></li>

				<li><a href="#"><i class="fa fa-handshake-o"></i>HELPLINE</a></li>
				<li><a href="regstration.php"><i class="fa fa-registered"></i></i>REGISTRATION</a></li>
				<li><a href="#"><i class="fa fa-external-link-square"></i>LOGIN-INFO</a>
					<div class="sub-menu-1">
						<ul>
							<li><a href="login.php">LOG-IN</a></li>
							<!-- <li><a href="#">SIGN-UP</a></li> -->
							<li><a href="#">LANGUAGE</a></li>

						</ul>

					</div>

				</li>


			</ul>
		</div>

		<div class="header-main">
			<h2>Login</h2>
			<?php if(isset($errormessage)) {?>
			<div class="<?php echo $errorclass; ?>"><?php echo $errormessage; ?></div>
			<?php } ?>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
						<form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
							<div class="icon1">
								<input type="email" placeholder="Email@example.com" name="email" required="" />
							</div>
							<div class="icon1">
								<input type="password" placeholder="Password" name="pass" required="" />
							</div>

							<div class="login-check">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Keep
									me logged in</label>
							</div>

							<div class="bottom">
								<input type="submit" value="Log in" name="btn_login" />
							</div>
							<p><a href="forgotpassword.php">Forgot Password?</a> <a href="regstration.php">Create
									account</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- //main -->
	<!-- copyright -->
	<div class="copyright w3-agile">
		<p>© 2020 log in page . All rights reserved | Design by Dipanjal-Iftakher</p>
	</div>
	<!-- //copyright -->
</body>

</html>