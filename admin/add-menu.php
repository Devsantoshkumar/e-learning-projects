<?php require_once("header.inc.php");  require_once("functions.inc.php"); ?>

<div class="adminWrapper">

<?php require_once("sidebar.inc.php"); ?>

    <section class="adminSection">
        <div class="pageTitle"><span>Add New Menu</span></div>
        <form action="insert.php" method="POST" class="adminForm">
            <div class="adminInputGroup">
                <input type="text" name="menuName" placeholder="Add new menu">
            </div>
            <button type="submit" class="adminSendButton" name="addMenu"><img src="../icons\send_white_24dp.svg" alt=""> <span> Add Menu</span></button>
        <?php 
         if(isset($_SESSION['MENU-MSG'])){
             echo $_SESSION['MENU-MSG'];
         }
        
        ?>
        </form>
          
        <?php 
          $select = select($conn,"menus","","","","menu_id","","","","");
          if(mysqli_num_rows($select)>0){
        ?>
        <table class="table" border="0" style="width: 80%;">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Menu Name</th>
                    <th>No. of Posts</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php while($rows = mysqli_fetch_assoc($select)){ ?>
                <tr>
                    <td><?php echo $rows['menu_id']; ?></td>
                    <td><?php echo $rows['menu_name']; ?></td>
                    <td>35</td>
                    <?php 
                      if($rows['menu_status'] == 1){
                            $status = "Active";
                            $class = "active";
                      }else{
                            $status = "Inactive";
                            $class = "inactive";
                      }
                    ?>
                    <td><a href="#" class="<?php echo $class; ?>"><?php echo $status; ?></a></td>
                    <td><a href="edit-menu.php?menuEdit=<?php echo $rows['menu_id']; ?>"><img src="../icons\border_color_black_24dp.svg"></a></td>
                    <td><a href="delete.php?menuDelete=<?php echo $rows['menu_id']; ?>"><img src="../icons\delete_black_24dp.svg"></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
         <?php } ?>
    </section>

    <?php require_once("footer.inc.php"); ?>