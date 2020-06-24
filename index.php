<?php 
include('backend/config.php');
session_start();
if(isset($_SESSION['is_login_user'])){
	$email = $_SESSION['email'];

	$query = "SELECT * from users where email='$email'";
	$fire = mysqli_query($conn, $query);
	if($data = mysqli_fetch_array($fire)){
        $_SESSION['name'] = $data['name'];
        $_SESSION['image'] = $data['file_path'];
	}
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Home page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Trendy Login Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- Custom Theme files -->

<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/main.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="page-wrapper  bg-custom"> 
			<div class="menu-bar">

			<ul>
				<li class="active"><a href="#"><i class="fa fa-home"></i>HOME</a></li>

			<?php
			if(isset($_SESSION['is_login_user'])){?>

			<li><a href="#"><i class="fa fa-building"></i>COMPLAINT</a>
				<div class="sub-menu-1">
					<ul>
						<li><a href="city_complain_form.php">FOR CITY-CORPORATION</a></li>
						<li><a href="police_complain_form.php">FOR POLICE</a></li>
						<li><a href="complain_history.php">Complain History</a></li>
					</ul>
				</div>
			</li>
			<?php } ?>

				<li><a href="#"><i class="fa fa-user-secret"></i>PRIVACY</a></li>

				<li><a href="#"><i class="fa fa-address-book"></i>CONTACT</a></li>

				<li><a href="#"><i class="fa fa-handshake-o"></i>HELPLINE</a></li>

			<?php
			if(isset($_SESSION['is_login_user'])){?>
			<li><a href="#"><i class="fa fa-external-link-square"></i><?php echo $_SESSION['name'] ?>
			<img class="img-profile rounded-circle" src="upload/<?php echo $_SESSION['image']?>" style="border-radius: 50%;" width="30px" height="30px">
			</a>
				<div class="sub-menu-1">
					<ul>
						<li><a href="login.php">Profile</a></li>
						<!-- <li><a href="#">SIGN-UP</a></li> -->
						<li><a href="logout.php">Logout</a></li>

					</ul>

				</div>

			</li>

			<?php
			}
			else{
				?>
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
			<?php
			}
			?>


		</ul>


			</ul>
		</div>
	</div>	
	<!-- //main -->
	<!-- copyright -->
	<!-- <div class="copyright w3-agile">
		<p>© 2020 log in page . All rights reserved | Design by Dipanjal-Iftakher</p>
	</div> -->
	<!-- //copyright --> 
</body>
</html>