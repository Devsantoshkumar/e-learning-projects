<?php require_once("header.inc.php"); require_once("functions.inc.php"); ?>

<div class="adminWrapper">

<?php require_once("sidebar.inc.php"); ?>

        <?php 
          $userEditId = validate_data($conn,$_GET['userEdit']);
          $select = select($conn,"users","","","","","user_id","$userEditId","","");
          if(mysqli_num_rows($select)>0){
              $rows = mysqli_fetch_assoc($select);
        ?>

    <section class="adminSection">
        <div class="pageTitle"><span>Edit User</span><a href="dashboard.php">Users</a></div>
        <form action="update.php" method="POST" class="adminForm">
            <div class="adminInputGroup">
                <input type="hidden" value="<?php echo $rows['user_id']; ?>" name="userId">
            </div>
            <div class="adminInputGroup">
                <label for="fname">First Name</label>
                <input type="text" value="<?php echo $rows['user_fname']; ?>" name="fname" id="fname">
            </div>
            <div class="adminInputGroup">
                <label for="lname">Last Name</label>
                <input type="text" value="<?php echo $rows['user_lname']; ?>" name="lname" id="lname">
            </div>
            <div class="adminInputGroup">
                <label for="email">Email Address</label>
                <input type="email" value="<?php echo $rows['user_email']; ?>" name="email" id="email">
            </div>
            <div class="adminInputGroup">
                <select name="role">
                    <?php 
                      if($rows['user_role'] == 1){
                          echo '<option value="1" selected>Admin</option>
                                <option value="0">Normal</option>';
                      }else{
                        echo '<option value="1">Admin</option>
                              <option value="0" selected>Normal</option>';
                      }
                    ?>
                </select>
            </div>
            <button type="submit" class="adminSendButton" name="updateUser"><img src="../icons\send_white_24dp.svg" alt=""> <span> Update User</span></button>
        </form>
    </section>

    <?php } require_once("footer.inc.php"); ?>