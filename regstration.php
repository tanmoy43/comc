<?php
 include ('backend/config.php');
 include ('backend/from-validation.php');
?>

<!doctype html>
<html lang="en">
<head>
<title>Registration Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Registration Form" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- font files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//fonts.googleapis.com/css?family=Spectral" rel="stylesheet">
<!-- /font files -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css'>
<!-- css files -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<!-- /css files -->
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
</head>
<body>
	<div class="w3-banner-main page-wrapper">
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
		<div class="center-container">
			<h1 class="header-w3ls">Registration Form</h1>
			<div class="content-top">
				<div class="content-w3ls">
					<div class="form-w3ls">
						<form action="" method="post" enctype="multipart/form-data">
							<div class="content-wthree1">
								<div class="grid-agileits1">
									<div class="form-control"> 
									<?php if($filenum==1){ ?>
									<div class="success" role="alert">
									<?php  echo $success; ?>
									</div>
									<?php } elseif($filenum=0) {?>
									<div class="error" role="alert">
									<?php  echo "Not Register" ?>
									</div>
									<?php }?>
										<label class="header"> Name* </label>
										<input type="text" id="name" name="name" placeholder="" title="Please enter your Full Name">
										<?php 
										if(isset($Errormsg['name'])) {
											echo "<div class='error'>".$Errormsg['name']."</div>";
										}
										 ?>
									</div>
									<div class="form-control"> 
										<label class="header"> Father Name* </label>
										<input type="text" id="name" name="fname" placeholder="" title="Please enter your Full Name">
										<?php 
										if(isset($Errormsg['fname'])) {
											echo "<div class='error'>".$Errormsg['fname']."</div>";
										}
										 ?>
									</div>
									<div class="form-control"> 
										<label class="header"> Mother Name* </label>
										<input type="text" id="name" name="mname" placeholder="" title="Please enter Full Name" >
									</div>
									<?php 
										if(isset($Errormsg['mname'])) {
											echo "<div class='error'>".$Errormsg['mname']."</div>";
										}
										 ?>
									 <div class="form-control">	
										<label class="header">Email* </label>
										<input type="email" id="email" name="email" placeholder="abc@.com" title="Please enter a Valid Email Address">
									</div>
									<?php 
										if(isset($Errormsg['email'])) {
											echo "<div class='error'>".$Errormsg['email']."</div>";
										}
										 ?>
									<div class="form-control">	
										<label class="header">Passsword* </label>
										<input type="password" id="pass" name="pass" placeholder="" title="Please enter a Valid Email Address">
									</div>
									<?php 
										if(isset($Errormsg['pass'])) {
											echo "<div class='error'>".$Errormsg['pass']."</div>";
										}
										 ?>
								
									<div class="grid-w3layouts1">
									<div class="w3-agile1">
										<label class="rating">Choose gender* </label>
										<ul>
											<li>
												<input type="radio" id="a-option" name="gender" value="Male" >
												<label for="a-option">Male </label>
												<div class="check"></div>
											</li>
											<li>
												<input type="radio" id="b-option" name="gender" value="Female">
												<label for="b-option">Female</label>
												<div class="check"><div class="inside"></div></div>
											</li>
											
										</ul>
									</div>
										<?php 
										if(isset($Errormsg['gender'])) {
											echo "<div class='error'>".$Errormsg['gender']."</div>";
										}
										 ?>
								</div>
						
								</div>
							</div>
					</div>
					<div class="form-w3ls-1">
						<div class="form-control">	
							<label class="header">Phone Number* </label>
							<input type="number" id="number" name="pnumber" placeholder="01xxxxxxxxx" title="Please enter your Phone Number">
						</div>	
						<?php 
							if(isset($Errormsg['pnumber'])) {
								echo "<div class='error'>".$Errormsg['pnumber']."</div>";
							}
						?>				
					
						<div class="form-control"> 
							<label class="header"> NID* </label>
							<input type="number" id="NID" name="nidnum" placeholder="NID" title="Please enter your number">
						</div>
						<?php 
							if(isset($Errormsg['nidnum'])) {?>
								<div class="<?php echo $Errormsgclass;?>">
								<?php echo $Errormsg['nidnum'];?>
							</div>
							<?php } ?>
						
							<div class="form-control Insurance"> 
									<label class="header">Address* </label>
									<textarea  name="adress" placeholder="local" title="address"></textarea>
							</div>

							<?php 
							if(isset($Errormsg['adress'])) {
								echo "<div class='error'>".$Errormsg['adress']."</div>";
							}
						?>

							<div class="form-control"> 
									<label class="header">Image* </label>
									<input type="file" id="" name="img" placeholder="" >
							</div>

							<?php 
							if(isset($Errormsg['img'])) {
								echo "<div class='error'>".$Errormsg['img']."</div>";
							}
						?>
						<div class="form-control"> 
								<input type="hidden" id="" name="role" placeholder="" value="user">
							</div>

									  <input type="submit" value="Registration" name="submit">
									  <p>If you have an accout <a style="color: #03A9F4; " href="login.php">click here!</a> for login</p>
									  </form>
					</div>				
					<div class="clear"></div>
				</div>
			</div>	
				
				<p class="copyright">© 2020 Registration Form. All Rights Reserved | Design by Dipanjal-Iftakher</p>
		</div>
	</div>

<!-- Calendar -->
			<link rel="stylesheet" href="css/jquery-ui.css"/>
			<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    		<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js'></script>		
			<script type="text/javascript" src="js/function.js"></script>


</body>
</html>
