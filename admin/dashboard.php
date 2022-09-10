<?php require_once("header.inc.php"); require_once("functions.inc.php"); ?>

<div class="adminWrapper">

    <?php require_once("sidebar.inc.php"); ?>

    <section class="adminSection">
        <div class="pageTitle" style="width: 95%"><span>Users Data</span><a href="add-user.php">Add User</a></div>
        <?php 
          $select = select($conn,"users","","","","user_id","","","","");
          if(mysqli_num_rows($select)>0){
        ?>
        <table class="table" border="0">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while($rows = mysqli_fetch_assoc($select)){ ?>
                <tr>
                    <td><?php echo $rows['user_id']; ?></td>
                    <td><?php echo $rows['user_fname']; ?> <?php echo $rows['user_lname']; ?></td>
                    <td><?php echo $rows['user_email']; ?></td>
                    <td><?php echo $rows['user_role']; ?></td>
                    <?php 
                      if($rows['user_status'] == 1){
                          $class = "active";
                          $status = "Active";
                      }else{
                          $class = "inactive";
                          $status = "Inactive";
                      }
                    ?>
                    <td><a href="#" class="<?php echo $class; ?>"><?php echo $status; ?></a></td>
                    <td><a href="edit-user.php?userEdit=<?php echo $rows['user_id']; ?>"><img src="../icons\border_color_black_24dp.svg"></a></td>
                    <td><a href="delete.php?userDelete=<?php echo $rows['user_id']; ?>"><img src="../icons\delete_black_24dp.svg"></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } ?>
    </section>

    <?php require_once("footer.inc.php"); ?>