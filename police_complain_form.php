<?php
include('backend/config.php');
include('security_user.php');


if(isset($_POST['send_appli_police'])){

	$user_id = $_SESSION['id'];

	$complain_id = "012345678953545345345345928492394893429342049184914";
	$complain_id = str_shuffle($complain_id);
	$complain_id = substr($complain_id, 0, 8);
	$complain_id = "PC".$complain_id;

	$status = "Not processing";

	$fullname = $_POST['fullname'];
	
	$email = $_POST['email'];

	$c_type = $_POST['complain_type'];

	$place = $_POST['place'];

	$message = $_POST['message'];

    if($fullname == ''){
        $_Error['fullname'] = "Full name is required";
	}else{
		$fullname = mysqli_real_escape_string($conn,(htmlspecialchars(stripslashes(trim($fullname)))));;
	}
	if($email == ''){
        $_Error['email'] = "Email is required";
	}else{
		$email = mysqli_real_escape_string($conn,(htmlspecialchars(stripslashes(trim($email)))));;
	}
	if($c_type=='Null'){
		$_Error['complain_type'] = "Select Complain type";
	}else{
		$c_type = mysqli_real_escape_string($conn,(htmlspecialchars(stripslashes(trim($c_type)))));;
	}
	if($place == ''){
		$_Error['place'] = "Place is required";
	}else{
		$place = mysqli_real_escape_string($conn,(htmlspecialchars(stripslashes(trim($place)))));;
	}
	if($message == ''){
		$_Error['message'] = "Message is required";
	}else{
		$message = mysqli_real_escape_string($conn,(htmlspecialchars(stripslashes(trim($message)))));;
	}
	if(isset($_FILES['P_file'])){
		$file_name = $_FILES['P_file']['name'];
		$file_temp_name = $_FILES['P_file']['tmp_name'];
		$file_size = $_FILES['P_file']['size'];
		// if($file_size < 50000000 ){
		// 	$_Error['P_file'] = "Please give right size file";
		// 	exit;
		// }
	}
	

	if($file_name == ''){
		if($fullname==TRUE and $email==TRUE and $c_type==TRUE and $place==TRUE and $message==TRUE){
		$query = "INSERT into complain_from_police (user_id, complain_id, status, user_name, user_email, complain_type, place, message) VALUE ('$user_id', '$complain_id', '$status', '$fullname', '$email', '$c_type', '$place', '$message')";
		//var_dump($query);
		$fire = mysqli_query($conn, $query);
		//var_dump($fire);
		$sql ="INSERT into complain_remark_police(complain_id) VALUE ('$complain_id')";
		$run = mysqli_query($conn, $sql);
		
		if($fire){
			$_SESSION['success'] ="Complain is Registered. Your complain id is ".$complain_id.". Please check in your Complain History.";
			//header("Refresh: 3");
		}else{
			$_SESSION['status'] = "Complain Not Registered";
		}
	}else{
		$_SESSION['status'] = "Complain Not Registered";
	}
	}else{
		if($fullname==TRUE and $email==TRUE and $c_type==TRUE and $place==TRUE and $message==TRUE){
		$file_name = time().$file_name;
		$query = "INSERT into complain_from_police (user_id, complain_id, status, user_name, user_email, complain_type, place, message, upload_link) VALUE ('$user_id', '$complain_id', '$status', '$fullname', '$email', '$c_type', '$place', '$message', '$file_name')";
		$fire = mysqli_query($conn, $query);

		$sql ="INSERT into complain_remark_police(complain_id) VALUE ('$complain_id')";
		$run = mysqli_query($conn, $sql);

		if($fire){
			move_uploaded_file($file_temp_name, "complain_file/".$file_name);
			$_SESSION['success'] = "Complain is Registered. Your complain id is ".$complain_id;
		}else{
			$_SESSION['status'] = "Complain Not Registered";
		}
		}
		
	}

}




?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Police complain form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Registration Form" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- css files-->
	<link href="css/style1.css" rel='stylesheet' type='text/css' media="all" />
	<link href="css/main.css" rel='stylesheet' type='text/css' media="all" />
	<!-- /css files -->
	<!-- font files -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
		rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Spectral" rel="stylesheet">
	<!-- /font files -->

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
					<img class="img-profile rounded-circle" src="upload/<?php echo $_SESSION['image']?>"
						style="border-radius: 50%; margin-top:5px;" width="30px" height="30px">
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
	<!-- <div class="background">
		<div class="pic-overlay">
				<div class="regform"><h1>Police complaint Form</h1></div> -->
	<!-- <div class="main">
				<form>
					<div id="name">
						<h2 class="name">Name</h2>
						<input class="nname" type="text" name="name">
						</div>
						<h2 class="name">Complaint type</h2>
						<select class="option" name="Complain type">
							<option disabled="disabled" selected="selected" >--Choose type</option>
							<option>Fight</option>
							<option>pickpocket</option>
							<option>Eveteasing</option>
							<option>Adamteasing</option>
							<option>others</option>
						</select>
                      <h2 class="name">Occurrence Place</h2>
<input class="OccurrencePlace" type="text" name="Occurrence Place">

 

<h2 class="name"> Phone</h2>

<input class="number" type="text" name="phone">

<h2 class="name">Complaint description</h2>

<textarea class="des" name="name" placeholder="" title="" required="" rows="8" cols="50"></textarea>
<h2 class="name">Upload video/image</h2>

  <input type="file" id="myfile" name="myfile">
<button type="submit">Submit</button>
				</form>						 -->


	

		<div class="wrapper wrapper--w900 ">
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
			<div class="card-6">
				<div class="card-heading">
					<h2 class="title">POLICE COMPLAIN FORM</h2>
				</div>
				<div class="card-body">
					<form action="code_user.php" method="POST" enctype="multipart/form-data">
						<div class="form-row">
							<div class="name">Full name*</div>
							<div class="value">
								<input class="input--style-6" type="text" name="fullname" value="">
								<?php
						if(isset($_Error['fullname'])){?>
								<span class="text-danger"><?php echo $_Error['fullname']; ?></span>
								<?php
						}
						?>
							</div>
						</div>
						<div class="form-row">
							<div class="name">Email address*</div>
							<div class="value">
								<div class="input-group">
									<input class="input--style-6" type="email" name="email"
										placeholder="example@email.com" value="">>
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
							<div class="name">Complaint type*</div>
							<div class="value">
								<div class="input-group">
									<select class="form-control from-color" name="complain_type">
										<option selected="selected" value="Null">--Choose type</option>
										<option value="Fight">Fight</option>
										<option value="Pickpocket">Pickpocket</option>
										<option value="Eveteasing">Eve-teasing</option>
										<option value="Adamteasing">Adamteasing</option>
										<option value="Others">Others</option>
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
							<div class="name">Occurrence Place*</div>
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
							<div class="name">Message*</div>
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
							<div class="name">Upload Photo/Vedio*</div>
							<div class="value">
								<div class="input-group js-input-file">
									<input class="input-file" type="file" name="P_file" id="file">
									<label class="label--file" for="file">Choose file</label>
									<span class="input-file__info">No file chosen</span>
								</div>
								<div class="label--desc">Upload your Photo/Vedio or any other relevant file. Max file
									size 50 MB</div>
							</div>
						</div>

				</div>
				<div class="card-footer">
					<button class="btn btn--radius-2 btn--blue-2" type="submit" name="send_appli_police">Send
						Application</button>
				</div>
				</form>
			</div>
		</div>
	    
	    
	    </div>
	<!-- Jquery JS-->
	<script src="js/jquery.min.js"></script>


	<!-- Main JS-->
	<!-- <script src="js/global.js"></script> -->


</body>

</html>