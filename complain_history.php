<?php
include('backend/config.php');
include('security_user.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title> complain history</title>
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

	
<div class="container-fluid mt-5">
<div class=" shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-secondary">Your Complains
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile
            </button> -->
    </h6>
  </div>
  
  <div class="card-body">

  <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Complain ID </th>
            <th> Complain Type </th>
            <th> Place Name </th>
            <th> Complain Reg. Time </th>
            <th> Status </th>
            <!-- <th> Action </th> -->
          </tr>
        </thead>
		<tbody>
        <?php
			$temp_id=$_SESSION['id'];
            $query = "SELECT * from  complain_from_police where user_id='$temp_id'";
			$fire = mysqli_query($conn, $query);
          $num=1;
        if((mysqli_num_rows($fire) > 0)){
          foreach($fire as $data){
            ?>
          <tr>
            <td> <?php echo $num++; ?> </td>
            <td> <?php echo $data['complain_id']; ?> </td>
            <td> <?php echo $data['complain_type']; ?> </td>
            <td> <?php echo $data['place']; ?> </td>
            <td> <?php echo $data['complain_time']; ?> </td>
            <td>
                <?php
                 if($data['status']=='Not processing'){?>
                    <button  type="submit" name="edit_btn" class="btn btn-danger"> <?php echo $data['status']; ?> </button>
                    <?php }elseif($data['status']=='In process'){ ?>
                    <button  type="submit" name="edit_btn" class="btn btn-warning"> <?php echo $data['status']; ?> </button>
                    <?php }else{?>
						<button  type="submit" name="edit_btn" class="btn btn-success"> <?php echo $data['status']; ?> </button>
                         <?php } ?>
            </td>
            <!-- <td>
              <form action="" method="post">
              <input type="hidden" name="id" value='<?php echo $data['id'];?>'>
                <button class="btn btn-primary" type="submit" name="details_btn_city">Details</button>
              </form>
                
            </td> -->
          </tr>
           
      <?php }
        }
         ?>
        
        <?php
			$temp_id = $_SESSION['id'];
			// var_dump($temp_id);
            $query = "SELECT * from  complain_from_city where user_id='$temp_id'";
			$fire = mysqli_query($conn, $query);
        if(mysqli_num_rows($fire) > 0){
          foreach($fire as $data){
            ?>
          <tr>
            <td> <?php echo $num++; ?> </td>
            <td> <?php echo $data['complain_id']; ?> </td>
            <td> <?php echo $data['complain_type']; ?> </td>
            <td> <?php echo $data['place']; ?> </td>
            <td> <?php echo $data['complain_time']; ?> </td>
            <td>
                <?php
                 if($data['status']=='Not processing'){?>
                    <button  type="submit" name="edit_btn" class="btn btn-danger"> <?php echo $data['status']; ?> </button>
                    <?php }elseif($data['status']=='In process'){ ?>
                    <button  type="submit" name="edit_btn" class="btn btn-warning"> <?php echo $data['status']; ?> </button>
                    <?php }else{?>
						<button  type="submit" name="edit_btn" class="btn btn-success"> <?php echo $data['status']; ?> </button>
                         <?php } ?>
            </td>
            <!-- <td>
              <form action="" method="post">
              <input type="hidden" name="id" value='<?php echo $data['id'];?>'>
                <button class="btn btn-primary" type="submit" name="details_btn_city">Details</button>
              </form>
                
            </td> -->
          </tr>
           
      <?php }
        }
         ?>
        </tbody>

      </table>

    </div>
  </div>
</div>
</div>





	<script src="js/jquery.min.js"></script>


	<!-- Main JS-->
	<!-- <script src="js/global.js"></script> -->


</body>

</html>