<?php
include('../backend/config.php');
include('security_admin.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form> -->

    </div>
  </div>
</div>



<div class="container-fluid">
<?php
    if(isset($_POST['search_btn'])){
    $search = $_POST['search_email'];
    $query = "SELECT * from users where email LIKE '%$search%'";
    }else{
      $query = "SELECT * from users";
      $search='';
    }
    $fire = mysqli_query($conn, $query);
    ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile
            </button> -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="post">
            <div class="input-group">
              <input type="text" name="search_email" class="form-control border-0 small ml-0" placeholder="Search by email" aria-label="Search" aria-describedby="basic-addon2" value="<?php echo $search; ?>">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" name="search_btn">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
        </form>
    </h6>
  </div>
  
  <div class="card-body">
  <!-- <div class="alert alert-success" role="alert">
  A simple success alert—check it out!

<div class="alert alert-danger" role="alert">
  A simple danger alert—check it out!
</div> -->

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
    
    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Father Name </th>
            <th> Mother Name </th>
            <th>Email </th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>NID Number</th>
            <th>Address</th>
            <th>Profile Picture</th>
            <th>Role</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $num=1;
        if(mysqli_num_rows($fire) > 0){
          while($data = mysqli_fetch_assoc($fire)){
            ?>
          
          <tr>
            <td> <?php echo $num++; ?></td>
            <td> <?php echo $data['name']; ?></td>
            <td> <?php echo $data['father_name']; ?></td>
            <td> <?php echo $data['mother_name']; ?> </td>
            <td> <?php echo $data['email']; ?> </td>
            <td> <?php echo $data['gender']; ?> </td>
            <td> <?php echo $data['phone_number']; ?> </td>
            <td> <?php echo $data['nid']; ?> </td>
            <td> <?php echo $data['address']; ?> </td>
            <td><?php echo '<img src="../upload/'.$data['file_path'].'" width="100px" height="100px"alt="user-image">'?> </td>
            <td> <?php echo $data['role']; ?> </td>
            <td>
                <form action="register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $data['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $data['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
            <?php 
              }
              }
            ?>
          </tr>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>