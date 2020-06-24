<?php
include('backend/config.php');
include('security_user.php');



?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>City Corporation Complain form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Registration Form" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- font files -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
		rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Spectral" rel="stylesheet">
	<!-- /font files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- css files-->
	<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/main.css" rel="stylesheet" type="text/css" media="all" />
	<!-- /css files -->

</head>

<body>
<div class="page-wrapper bg-custom">
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
			<img class="img-profile rounded-circle" src="upload/<?php echo $_SESSION['image']?>" style="border-radius: 50%; margin-top:5px;" width="30px" height="30px">
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
	</div>

	

		<div class="wrapper wrapper--w900 ">
			<div class="card-6">
			<?php

  			if(isset($_SESSION['success']) && $_SESSION['success']!=''){?>
			<div class="alert alert-success" role="alert"><?php echo $_SESSION['success']; ?></div>
			<?php
   			 unset($_SESSION['success']);
 			 }
  			if(isset($_SESSION['status']) && $_SESSION['status']!=''){?>
			<div class="alert alert-danger" role="alert"><?php echo $_SESSION['status']; ?></div>
			<?php
    		unset($_SESSION['status']);
  			}
  			?>
				<div class="card-heading">
					<h2 class="title">CITY CORPORATION COMPLAIN FORM</h2>
				</div>
				<div class="card-body">
				<form action="code_user.php" method="POST" enctype="multipart/form-data">
						<div class="form-row">
							<div class="name">Full name</div>
							<div class="value">
								<input class="input--style-6" type="text" name="fullname">
								<?php
								if(isset($_Error['fullname'])){?>
								<span class="text-danger"><?php echo $_Error['fullname']; ?></span>
								<?php
								}
								?>
							</div>
						</div>
						<div class="form-row">
							<div class="name">Email address</div>
							<div class="value">
								<div class="input-group">
									<input class="input--style-6" type="email" name="email"
										placeholder="example@email.com">
								</div>
								<?php
								if(isset($_Error['email'])){?>
								<span class="text-danger"><?php echo $_Error['email']; ?></span>
								<?php
								}
								?>
							</div>
						</div>
						<div class="form-row">
							<div class="name">Complaint type</div>
							<div class="value">
								<div class="input-group">
									<select class="form-control from-color" name="complain_type">
										<option value="Null" selected="selected">--Choose type</option>
										<option value="Health Care">Health Care</option>
										<option value="Street Lighting">Street Lighting</option>
										<option value="Road damage">Road damage</option>
										<option value="Draining system">Draining system</option>
										<option value="Mourtuary">Mourtuary</option>
									</select>
								</div>
								<?php
								if(isset($_Error['complain_type'])){?>
								<span class="text-danger"><?php echo $_Error['complain_type']; ?></span>
								<?php
								}
								?>
							</div>
						</div>
						<div class="form-row">
							<div class="name">Occurrence Place</div>
							<div class="value">
								<div class="input-group">
									<input class="input--style-6" type="text" name="place" placeholder="Place name">
								</div>
								<?php
								if(isset($_Error['place'])){?>
								<span class="text-danger"><?php echo $_Error['place']; ?></span>
								<?php
								}
								?>
							</div>
						</div>
						<div class="form-row">
							<div class="name">Message</div>
							<div class="value">
								<div class="input-group">
									<textarea class="textarea--style-6" name="message"
										placeholder="Message sent to the employer"></textarea>
								</div>
								<?php
								if(isset($_Error['message'])){?>
								<span class="text-danger"><?php echo $_Error['message']; ?></span>
								<?php
								}
								?>
							</div>
						</div>
						<div class="form-row">
							<div class="name">Upload Photo/Vedio</div>
							<div class="value">
								<div class="input-group js-input-file">
									<input class="input-file" type="file" name="C_file" id="file">
									<label class="label--file" for="file">Choose file</label>
									<span class="input-file__info">No file chosen</span>
								</div>
								<div class="label--desc">Upload your Photo/Vedio or any other relevant file. Max file
									size 50 MB</div>
							</div>
						</div>
					
				</div>
				<div class="card-footer">
					<button class="btn btn--radius-2 btn--blue-2" type="submit" name="send_appli_city">Send Application</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Jquery JS-->
	<script src="js/jquery.min.js"></script>


	<!-- Main JS-->
	<script src="js/global.js"></script>


</body>

</html>