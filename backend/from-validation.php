<?php
$filenum=$mainnid=$Errormsgclass=$fire=$count=$valid_email="";
if(isset($_POST['submit'])){

	// Name Validation part
	$name = $_POST['name'];
	if($name == ""){
		$Errormsg['name'] = "Name is required";
	}
	else if(!preg_match("/^([a-zA-Z' ]+)$/",$name)){
		$Errormsg['name'] =  "invalid name given.";
	}else{
		$name = mysqli_real_escape_string($conn,(htmlspecialchars(stripslashes(trim($name)))));
	}

		
	// Father name Validation part
	$fname = $_POST['fname'];
	if($fname == ""){
		$Errormsg['fname'] = "Father Name is required";
	}
	else if(!preg_match("/^([a-zA-Z' ]+)$/",$fname)){
		$Errormsg['fname'] =  "invalid name given.";
	}

	// Mother name Validation part
	$mname = $_POST['mname'];
	if($mname == ""){
		$Errormsg['mname'] = "Mother Name is required";
	}
	else if(!preg_match("/^([a-zA-Z' ]+)$/",$mname)){
		$Errormsg['mname'] =  "invalid name given.";
	}

	// Email Validation part
	$email = $_POST['email'];
	
	if($email == ""){
		$Errormsg['email'] = "Email is required";
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$Errormsg['email'] = "Invalid email format";
	  }
	  else{
		$query = "SELECT email from users where email = '$email'";
		$fire = mysqli_query($conn, $query) or die("can not fire query to select username");
		$count = mysqli_num_rows($fire);
		if($count > 0){
			$Errormsg['email'] = "email is already exist";
		}else{
			$valid_email = mysqli_real_escape_string($conn,(htmlspecialchars(stripslashes(trim($email)))));;
		}
	  }

	//password validation part
	$pass = $_POST['pass'];
	if(empty($pass)){
		$Errormsg['pass'] = "Password is required";
	}
	else if(strlen($pass)<8){
		$Errormsg['pass'] = "Password is too small";
	}
	elseif(!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/",$pass)) {
		$Errormsg['pass'] = "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
	}
	else{
		$pass = $_POST['pass'];
		$pass = mysqli_real_escape_string($conn,md5(htmlspecialchars(stripslashes(trim($pass)))));
	}
	//Gender validation part
	
	if(empty($_POST['gender'])){
		$Errormsg['gender'] = "Gender is required";
	}
	//Date of joining
	// $date_of_join = $_POST['date'];
	// if(empty($date_of_join)){
	// 	$Errormsg['date'] = "Date is required";
	// }
	//Phone Number validation
	$pnumber = $_POST['pnumber'];
	if(empty($pnumber)){
		$Errormsg['pnumber'] = "Phone number is required";
	}
	else if((strlen($pnumber)<=10) and (strlen($pnumber)>=12)){
		$Errormsg['pnumber'] = "Phone number is wrong";
	}

	//NID number validation
    $nidnum = $_POST['nidnum'];
    
	if(empty($nidnum)){
		$Errormsg['nidnum'] = "NID number is required";
    }
    if($nidnum==1111111111111 || $nidnum==2222222222222 || $nidnum==3333333333333 || $nidnum==4444444444444 || $nidnum==5555555555555){
        $Errormsg['nidnum'] = "NID number valid";
        $Errormsgclass = "success";
    }else{
        $Errormsg['nidnum'] = "NID number invalid";
        $Errormsgclass = "error";
    }

	//Address validation
	$address = $_POST['adress'];
	if($address == ""){
		$Errormsg['adress'] = "Address is required";
	}
	//role validation
	$role = $_POST['role'];

	//file validation
	if(isset($_FILES['img'])){
        $file_name = $_FILES['img']['name'];
        //var_dump($file_name);
        $file_temp_name = $_FILES['img']['tmp_name'];
        //var_dump($file_temp_name);
        $file_size = $_FILES['img']['size'];
        $file_path = time().$file_name;
        if($file_size > 5000000){
            echo "file is large"; exit;
        }

        $ext = pathinfo ($file_name, PATHINFO_EXTENSION);
        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
             if(move_uploaded_file($file_temp_name, "upload/".$file_path)){
				 if($name==TRUE and $fname==TRUE and $mname==TRUE and $valid_email==TRUE and $pass==TRUE and $_POST['gender']==TRUE  and $pnumber==TRUE and  ($nidnum==1111111111111 or $nidnum==2222222222222 or $nidnum==3333333333333 or $nidnum==4444444444444 or $nidnum==5555555555555) and $address==TRUE and $file_path==TRUE and $role){
                     $gender = $_POST['gender'];
					 $sql = "insert into users(name, father_name, mother_name, email, password, gender, phone_number, nid, address, file_path, role) VALUE ('$name','$fname','$mname','$valid_email','$pass','$gender', '$pnumber',' $nidnum','$address','$file_path', '$role')";
				 
                if($conn->query($sql)){
					$filenum = 1;
					$_SESSION['success'] = "Registered";
					header("Location: login.php");
					header("Refresh:3");
				}
                else{
					$filenum = 0;
					//echo "Failed".$conn->error;
					//header("Refresh:3");
				}
			  }
            }

        }else{
			$filenum = 0;
            $Errormsg['img'] = "Please upload a proper format of image";
           // header("Refresh:3");
        }

    	}else{
			$filenum = 0;
            $Errormsg['img'] = "Please upload right file";
           // header("Refresh:3");
    }

 }
 

?>