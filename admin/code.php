<?php
session_start();
include('../backend/config.php');

if(isset($_POST['update_btn'])){

    $id = $_POST['edit_id'];
    $delete_image = $_POST['delete_image'];
    //var_dump($delete_image);

	$edit_name = $_POST['edit_name'];

	$edit_father_name = $_POST['edit_father_name'];

	$edit_mother_name = $_POST['edit_mother_name'];

	$edit_email_id = $_POST['edit_email_id'];

	$edit_phone_number = $_POST['edit_phone_number'];
	
    $edit_address = $_POST['edit_address'];
    $edit_image = $_FILES['edit_image']['name'];
	
	$role = $_POST['edit_role'];

	if($edit_image==''){
        $sql = "UPDATE users set name='$edit_name', father_name='$edit_father_name', mother_name='$edit_mother_name', email='$edit_email_id', phone_number='$edit_phone_number', address='$edit_address', role='$role' where id='$id'";

        $fire = mysqli_query($conn, $sql);

        if($fire){
            //move_uploaded_file($_FILES['edit_image']['tmp_name'], "../upload/".$_FILES['edit_image']['name']);
            $_SESSION['success'] = "Profile updated";
            //var_dump($_SESSION['success']);
            header('Location: register_list.php');
        }else{
            $_SESSION['status'] = "Profile not updated";
            //var_dump($_SESSION['status']);
            header('Location: register_list.php');
        }

    }else{
        $edit_image = time().$edit_image;
        $path = "../upload/".$delete_image;
        if(unlink($path) || $path=="../upload/"){
            $sql = "UPDATE users set name='$edit_name', father_name='$edit_father_name', mother_name='$edit_mother_name', email='$edit_email_id', phone_number='$edit_phone_number', address='$edit_address', file_path='$edit_image',role='$role' where id='$id'";

             $fire = mysqli_query($conn, $sql);
    

        if($fire){
            move_uploaded_file($_FILES['edit_image']['tmp_name'], "../upload/".$edit_image);
            $_SESSION['success'] = "Profile updated";
            header('Location: register_list.php');
        }else{
            $_SESSION['status'] = "Profile not updated";
            header('Location: register_list.php');
        }
    }

        
    }

}


if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_id'];

    $query = "DELETE from users where id='$id'";
    $fire=mysqli_query($conn, $query);
    if($fire){
        $_SESSION['success'] = "Profile Deleted";
        header('Location: register_list.php');
    }else{
        $_SESSION['status'] = "Profile not Deleted";
        header('Location: register_list.php');
    }
}

?>