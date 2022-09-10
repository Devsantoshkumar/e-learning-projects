<?php require_once("header.inc.php"); require_once("functions.inc.php"); ?>

<div class="adminWrapper">

<?php require_once("sidebar.inc.php"); ?>
        <?php 
          $cateEdit = validate_data($conn,$_GET['cateEdit']);
          $select = select($conn,"categories","","","","","category_id","$cateEdit","","");
          if(mysqli_num_rows($select)>0){
              $rows = mysqli_fetch_assoc($select);
        ?>
    <section class="adminSection">
        <div class="pageTitle"><span>Edit Category</span></div>
        <form action="update.php" method="POST" class="adminForm">
            <div class="inputWrapper">
                <div class="adminInputGroup" style="display: none;">
                    <input type="hidden" value="<?php echo $rows['category_id']; ?>" name="cateId" placeholder="Add category">
                </div>
                <div class="adminInputGroup">
                    <input type="text" value="<?php echo $rows['category_name']; ?>" name="cateName" placeholder="Add category">
                </div>
                <div class="adminInputGroup">
                    <?php 
                     $select1 = select($conn,"menus","","","","","","","","");
                     if(mysqli_num_rows($select1)>0){
                    ?>
                    <select name="categoryMenu">
                        <?php 
                          while($rows1 = mysqli_fetch_assoc($select1)){
                             if($rows['category_menu'] == $rows1['menu_slug']){
                                 $selected = "selected";
                             }else{
                                 $selected = "";
                             }
                            echo '<option value="'.$rows1['menu_slug'].'" '.$selected.'>'.$rows1['menu_name'].'</option>';
                          }
                        ?>
                    </select>
                    <?php } ?>
                </div>
            </div>
            <button type="submit" class="adminSendButton" name="updateCategory"><img src="../icons\send_white_24dp.svg" alt=""> <span> Update Category</span></button>
        </form>

    </section>

    <?php } require_once("footer.inc.php"); ?>