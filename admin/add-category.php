<?php require_once("header.inc.php"); require_once("functions.inc.php"); ?>

<div class="adminWrapper">

<?php require_once("sidebar.inc.php"); ?>

    <section class="adminSection">
        <div class="pageTitle"><span>Add Category</span></div>
        <form action="insert.php" method="POST" class="adminForm">
            <div class="inputWrapper">
                <div class="adminInputGroup">
                    <input type="text" name="categoryName" placeholder="Add category">
                </div>
                <div class="adminInputGroup">
                    <?php 
                    $select = select($conn,"menus","","","","","","","");
                    if(mysqli_num_rows($select)>0){
                    ?>
                    <select name="menuName">
                        <?php while($rows = mysqli_fetch_assoc($select)){ 
                            echo '<option value="'.$rows['menu_slug'].'">'.$rows['menu_name'].'</option>';
                        } ?>
                    </select>
                    <?php } ?>
                </div>
            </div>
            <button type="submit" class="adminSendButton" name="addCategory"><img src="../icons\send_white_24dp.svg" alt=""> <span> Add Category</span></button>
         <?php if(isset($_SESSION['CATE-MSG'])){ echo $_SESSION['CATE-MSG']; } ?>
        </form>

        <?php 
          $select = select($conn,"categories","","","","category_id","","","","");
          if(mysqli_num_rows($select)>0){
        ?>
        <table class="table" border="0" style="width: 80%;">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Category Name</th>
                    <th>Menu Name</th>
                    <th>No. Posts</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php while($rows = mysqli_fetch_assoc($select)){ ?>
                <tr>
                    <td><?php echo $rows['category_id']; ?></td>
                    <td><?php echo $rows['category_name']; ?></td>
                    <td><?php echo $rows['category_menu']; ?></td>
                    <td>35</td>
                    <?php 
                      if($rows['category_status'] == 1){
                            $status = "Active";
                            $class = "active";
                      }else{
                            $status = "Inactive";
                            $class = "inactive";
                      }
                    ?>
                    <td><a href="#" class="<?php echo $class; ?>"><?php echo $status; ?></a></td>
                    <td><a href="edit-category.php?cateEdit=<?php echo $rows['category_id']; ?>"><img src="../icons\border_color_black_24dp.svg"></a></td>
                    <td><a href="delete.php?cateDelete=<?php echo $rows['category_id']; ?>"><img src="../icons\delete_black_24dp.svg"></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
      <?php } ?>
    </section>

    <?php require_once("footer.inc.php"); ?>