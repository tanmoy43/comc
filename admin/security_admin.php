<?php
session_start();
if(isset($_SESSION['is_login_admin'])){
	$email = $_SESSION['email'];

	$query = "SELECT * from users where email='$email'";
	$fire = mysqli_query($conn, $query);
	if($data = mysqli_fetch_array($fire)){
        $_SESSION['name'] = $data['name'];
        $_SESSION['image'] = $data['file_path'];
        
	}

}else{
	header('Location: ../login.php');
}
?>