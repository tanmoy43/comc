<?php
include('../backend/config.php');
include('security_admin.php');
include('includes/header.php'); 
include('includes/navbar.php');
?>



<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Police Complains(Solved)
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
            <th> # </th>
            <th> Complain ID </th>
            <th> User ID </th>
            <th> Complainant Name </th>
            <th> Complain Type </th>
            <th> Place Name </th>
            <th> Complain Reg. Time </th>
            <th> Status </th>
            <th> Action </th>
          </tr>
        </thead>
        <?php
            $query = "SELECT * from  complain_from_police";
            $fire = mysqli_query($conn, $query);
        ?>
        <tbody>
        <?php 
          $num=1;
        if(mysqli_num_rows($fire) > 0){
          foreach($fire as $data){
            if($data['status']=='Solved'){
            ?>
        <tr>
            <td> <?php echo $num++; ?> </td>
            <td> <?php echo $data['complain_id']; ?> </td>
            <td> <?php echo $data['user_id']; ?> </td>
            <td> <?php echo $data['user_name']; ?> </td>
            <td> <?php echo $data['complain_type']; ?> </td>
            <td> <?php echo $data['place']; ?> </td>
            <td> <?php echo $data['complain_time']; ?> </td>
            <td>
                <button  type="submit" name="edit_btn" class="btn btn-success"> <?php echo $data['status']; ?> </button>
            </td>
            <td>
              <form action="solve_complain_details.php" method="post">
              <input type="hidden" name="id" value='<?php echo $data['id'];?>'>
              <input type="hidden" name="complain_id" value='<?php echo $data['complain_id'];?>'>
                <button class="btn btn-primary" type="submit" name="solve_btn">Details</button>
              </form>
                
            </td>
          </tr>
           
      <?php }
        }
    }
         ?>


        </tbody>
      </table>

    </div>
  </div>
</div>
</div>









<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">City Corporation Complains(Solved)
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
          <th> # </th>
            <th> Complain ID </th>
            <th> User ID </th>
            <th> Complainant Name </th>
            <th> Complain Type </th>
            <th> Place Name </th>
            <th> Complain Reg. Time </th>
            <th> Status </th>
            <th> Action </th>
          </tr>
        </thead>
        <?php
            $query = "SELECT * from  complain_from_city";
            $fire = mysqli_query($conn, $query);
        ?>
        <tbody>
        <?php 
          $num=1;
        if(mysqli_num_rows($fire) > 0){
          foreach($fire as $data){
            if($data['status']=='Solved'){
            ?>
        <tr>
            <td> <?php echo $num++; ?> </td>
            <td> <?php echo $data['complain_id']; ?> </td>
            <td> <?php echo $data['user_id']; ?> </td>
            <td> <?php echo $data['user_name']; ?> </td>
            <td> <?php echo $data['complain_type']; ?> </td>
            <td> <?php echo $data['place']; ?> </td>
            <td> <?php echo $data['complain_time']; ?> </td>
            <td>
                <button  type="submit" name="edit_btn" class="btn btn-success"> <?php echo $data['status']; ?> </button>
            </td>
            <td>
              <form action="solve_complain_details_city.php" method="post">
              <input type="hidden" name="id" value='<?php echo $data['id'];?>'>
              <input type="hidden" name="complain_id" value='<?php echo $data['complain_id'];?>'>
                <button class="btn btn-primary" type="submit" name="solve_btn_city">Details</button>
              </form>
                
            </td>
          </tr>
           
      <?php }
        }
    }
         ?>


        </tbody>
      </table>

    </div>
  </div>
</div>
</div>







<?php
include('includes/scripts.php');
include('includes/footer.php');
?>