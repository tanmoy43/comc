<?php
include('../backend/config.php');
include('security_admin.php');
include('includes/header.php'); 
include('includes/navbar.php');
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
  <div class="table-responsive">
  <?php
  if(isset($_POST['solve_btn'])){
     $id = $_POST['id'];
    $query = "SELECT * from  complain_from_police where id=' $id'";
    $fire = mysqli_query($conn, $query);
        foreach($fire as $data){
  ?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
      <td> <b>Complain ID:</b> </td>
      <td> <?php echo $data['complain_id'];?> </td>
      <td> <b>User ID:</b> </td>
      <td> <?php echo $data['user_id'];?> </td>
      <td> <b>Complainant Name:</b> </td>
      <td> <?php echo $data['user_name'];?> </td>
      <td> <b>Reg Date:</b> </td>
      <td> <?php echo $data['complain_time'];?>  </td>
    </tr>
    <tr>
        <td><b>Complainant email:</b></td>
        <td><?php echo $data['user_email'];?></td>
        <td><b>Complain Type:</b></td>
        <td><?php echo $data['complain_type'];?></td>
        <td><b>Occurrence Place:</b></td>
        <td colspan="3"><?php echo $data['place'];?></td>
    </tr>
    <tr>
        <td><b>Message:</b></td>
        <td colspan="7"><?php echo $data['message'];?></td>
    </tr>
    <tr>
        <td><b>File(if any):</b></td>
        <td colspan="7"><?php echo "../complain_file/".$data['upload_link'];?></td>
    </tr>
    
    <tr>
        <?php
        $complain_id = $_POST['complain_id'];
        //var_dump($complain_id);
         $sql = mysqli_query($conn,"SELECT complain_remark_police.remark as remark,complain_remark_police.status as sstatus,complain_remark_police.remark_date as rdate from complain_remark_police join complain_from_police on complain_from_police.complain_id=complain_remark_police.complain_id where complain_from_police.complain_id='$complain_id'");
         //var_dump($sql);
         while($rw=mysqli_fetch_array($sql)){
        ?>
        <td><b>Remark</b></td>
        <td colspan="7"><span class=""><?php echo $rw['remark'];?></span><br><b>Remark Date :<?php echo $rw['rdate'];?></b></td>
    </tr>
    <?php } ?>
    <tr>
        <td><b>Status</b></td>
        <td colspan="7"><span class="text-success"><?php echo $data['status'];?></span></td>
    </tr>
</table>

<?php
        }
    }
    ?>
<a href="solved_complain.php" class="btn btn-secondary">Cancel</a>
</div>
  </div>
</div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>