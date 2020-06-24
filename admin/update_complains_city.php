<?php
ob_start();
include('../backend/config.php');

include('security_admin.php');
include('includes/header.php'); 
include('includes/navbar.php');
?>
<?php

if(isset($_POST['update_btn_city'])){
    $id=$_POST['data_id'];
    $complain_id=$_POST['data_complain_id'];
    $status = $_POST['edit_status'];
    $remark = $_POST['remark'];

    $query = "UPDATE complain_from_city SET status='$status' where id='$id'";
    $e_fire = mysqli_query($conn, $query);

    $sql = "INSERT into complain_remark_city(complain_id, status,	remark) VALUE ('$complain_id', '$status', '$remark')";
    $sql_fire=mysqli_query($conn, $sql);

    if($e_fire && $sql_fire){
        $_SESSION['success'] = "Complain Updated ".$complain_id;
        header('Location: pending_complain.php');
        ob_flush();
    }else{
        $_SESSION['status'] = "Complain not Updated";
        header('Location: pending_complain.php');
    }

}

?>

<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Details Police Complains
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile
            </button> -->
    </h6>
  </div>
  
  <div class="card-body">

  <?php
  if(isset($_POST['details_btn_city'])){
     $id = $_POST['id'];
    $query = "SELECT * from  complain_from_city where id=' $id'";
    $fire = mysqli_query($conn, $query);
        foreach($fire as $data){
  ?>

  <form action="" method="POST">

    <div class="form-group">
        <label> Full name </label>
        <input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?php echo $data['user_name']; ?>" disabled>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $data['user_email']; ?>" disabled>
    </div>
    <div class="form-group">
        <label>Complain Type</label>
        <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $data['complain_type']; ?>" disabled>
    </div>
    <div class="form-group">
        <label>Complain ID</label>
        <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $data['complain_id']; ?>" disabled>
    </div>
    <div class="form-group">
        <label>Place Name</label>
        <input type="text" name="email" class="form-control" placeholder="Place" value="<?php echo $data['place']; ?>" disabled>
    </div>
    <div class="form-group">
        <label>Message</label>
        <textarea class="form-control" name="message" placeholder="" disabled><?php echo $data['message'];?></textarea>
    </div>

    <a href="../complain_file/<?php echo $data['upload_link']; ?>" class="btn btn-info" style="color: #fff !important;">Image or Vedio</a>

    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="edit_status" id="">
        
        <?php if($data['status']==='Not processing'){?>
            <option value="<?php echo $data['status'];?>"><?php echo $data['status'];?></option>
            <option value="In process">In Process</option>
            <option value="Solved">Solved</option>
        <?php }else if($data['status'] === 'In process'){ ?>
            <option value="<?php echo $data['status'];?>"><?php echo $data['status'];?></option>
            <option value="Solved">Solved</option>
        <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label>Remark</label>
        <textarea class="form-control" name="remark" placeholder="" value=""></textarea>
        <?php
		if(isset($_Error['remark'])){?>
		<span class="text-danger"><?php echo $_Error['remark']; ?></span>
		<?php
		}
		?>
    </div>
    <input type="hidden" name="data_id" value="<?php echo $data['id']?>">
    <input type="hidden" name="data_complain_id" value="<?php echo $data['complain_id']?>">
    <a href="pending_complain.php" class="btn btn-secondary">Cancel</a>
    
    <button type="submit" name="update_btn_city" class="btn btn-primary" data-dismiss="modal">Update</button>
</div>
    </form>
</form>

<?php }
        }
?>

  </div>
</div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>