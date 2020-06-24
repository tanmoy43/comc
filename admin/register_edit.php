<?php
include('../backend/config.php');
include('security_admin.php');
include('includes/header.php'); 
include('includes/navbar.php');
?>


<div class="container-fluid">
    <!-- Data Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
        </div>
        <div class="card-body">
        <?php
        if(isset($_POST['edit_btn'])){

            $id = $_POST['edit_id'];
            
            $query = "SELECT * from users where id='$id'";
            $fire = mysqli_query($conn, $query);

            foreach($fire as $row){
                ?>
         <form action="code.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
         <div class="form-group">
                <label>Profile Picture</label><br>
                <?php echo '<img src="../upload/'.$row['file_path'].'" width="100px" height="100px"alt="user-image">'?> 
                <!-- <input type="file" name="edit_email" value="<" class="form-control" placeholder="Enter Email" disabled> -->
                <input type="file" name="edit_image" class="form-control-file">
            </div>
        <div class="form-group">
                <label> Name </label>
                <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label> Father Name </label>
                <input type="text" name="edit_father_name" value="<?php echo $row['father_name'] ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label> Mother Name </label>
                <input type="text" name="edit_mother_name" value="<?php echo $row['mother_name'] ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email_id" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input type="email" name="edit_gender" value="<?php echo $row['gender'] ?>" class="form-control" placeholder="Enter Email" disabled>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="phone" name="edit_phone_number" value="<?php echo $row['phone_number'] ?>" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>NID Number</label>
                <input type="phone" name="edit_email" value="<?php echo $row['nid'] ?>" class="form-control" placeholder="Enter Email" disabled>
            </div>
            <div class="form-group">
                <label>Address</label>
                <!-- <input type="text" name="edit_email" value="" class="form-control" placeholder="Enter Email"> -->
                <textarea class="form-control" name="edit_address" placeholder="" title="address"><?php echo $row['address'] ?></textarea>
            </div>
            <!-- <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" value="" class="form-control" placeholder="Enter Password">
            </div> -->
            <div class="form-group">
                <label>USERTYPE</label>
                <select name="edit_role" id="" class="form-control">
                <?php 
                if($row['role']==='admin'){?>
                    <option value="<?php echo $row['role']?>"><?php echo $row['role']?></option>
                    <option value="user">User</option>
                    <?php
                    }
                      ?>

                <?php 
                if($row['role']==='user'){?>
                    <option value="<?php echo $row['role']?>"><?php echo $row['role']?></option>
                    <option value="admin">Admin</option>
                <?php }
                      ?>
                    
                </select>
            </div>
            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="delete_image" value="<?php echo $row['file_path']; ?>">
            <a href="register_list.php" class="btn btn-danger">Cancel</a>

            <button type="submit" name="update_btn" class="btn btn-primary" data-dismiss="modal">Update</button>
            </form>
            <?php
            }
        }
        ?>
        </div>
    </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>