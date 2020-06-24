<?php
session_start();

include('backend/config.php');
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
			header("Location: police_complain_form.php");
		}else{
			$_SESSION['status'] = "Complain Not Registered";
			header("Location: police_complain_form.php");
		}
	}else{
		$_SESSION['status'] = "Complain Not Registered";
		header("Location: police_complain_form.php");
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
			$_SESSION['success'] = "Complain is Registered. Your complain id is ".$complain_id.". Please check in your Complain History.";
			header("Location: police_complain_form.php");
		}else{
			$_SESSION['status'] = "Complain Not Registered";
			header("Location: police_complain_form.php");
		}
		}
		
	}

}





if(isset($_POST['send_appli_city'])){

	$user_id = $_SESSION['id'];

	$complain_id = "012345678953545345345345928492394893429342049184914";
	$complain_id = str_shuffle($complain_id);
	$complain_id = substr($complain_id, 0, 8);
	$complain_id = "CC".$complain_id;

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
	if(isset($_FILES['C_file'])){
		$file_name = $_FILES['C_file']['name'];
		$file_temp_name = $_FILES['C_file']['tmp_name'];
		$file_size = $_FILES['C_file']['size'];
		// if($file_size < 50000000 ){
		// 	$_Error['P_file'] = "Please give right size file";
		// 	exit;
		// }
	}
	

	if($file_name == ''){
		if($fullname==TRUE && $email==TRUE && $c_type==TRUE && $place==TRUE && $message==TRUE){
		$query = "INSERT into complain_from_city (user_id, complain_id, status, user_name, user_email, complain_type, place, message) VALUE ('$user_id', '$complain_id', '$status', '$fullname', '$email', '$c_type', '$place', '$message')";
		//var_dump($query);
		$fire = mysqli_query($conn, $query);
		//var_dump($fire);
		$sql ="INSERT into complain_remark_city(complain_id) VALUE ('$complain_id')";
		$run = mysqli_query($conn, $sql);

		if($fire){
			$_SESSION['success'] ="Complain is Registered. Your complain id is ".$complain_id.". Please check in your Complain History.";
			header("Location: city_complain_form.php");
		}else{
			$_SESSION['status'] = "Complain Not Registered";
			header("Location: city_complain_form.php");
		}
	    }
	}else{
		if($fullname==TRUE && $email==TRUE && $c_type==TRUE && $place==TRUE && $message==TRUE){
		$file_name = time().$file_name;
		$query = "INSERT into complain_from_city (user_id, complain_id, status, user_name, user_email, complain_type, place, message, upload_link) VALUE ('$user_id', '$complain_id', '$status', '$fullname', '$email', '$c_type', '$place', '$message', '$file_name')";
		$fire = mysqli_query($conn, $query);

		$sql ="INSERT into complain_remark_city(complain_id) VALUE ('$complain_id')";
		$run = mysqli_query($conn, $sql);

		if($fire){
			move_uploaded_file($file_temp_name, "complain_file/".$file_name);
			$_SESSION['success'] = "Complain is Registered. Your complain id is ".$complain_id.". Please check in your Complain History.";
			header("Location: city_complain_form.php");
		}else{
			$_SESSION['status'] = "Complain Not Registered";
			header("Location: city_complain_form.php");
		}
		}
	}

}


?>