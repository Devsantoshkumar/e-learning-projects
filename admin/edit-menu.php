<?php require_once("header.inc.php"); require_once("functions.inc.php"); ?>

<div class="adminWrapper">

<?php require_once("sidebar.inc.php"); ?>
        <?php 
          $menuEdit = validate_data($conn,$_GET['menuEdit']);
          $select = select($conn,"menus","","","","","menu_id","$menuEdit","","");
          if(mysqli_num_rows($select)>0){
              $rows = mysqli_fetch_assoc($select);
        ?>
    <section class="adminSection">
        <div class="pageTitle"><span>Edit Menu</span><a href="add-menu.php">Add Menu</a></div>
        <form action="update.php" method="POST" class="adminForm">
            <div class="adminInputGroup">
                <input type="hidden" value="<?php echo $rows['menu_id']; ?>" name="menuId" placeholder="Add new menu">
            </div>
            <div class="adminInputGroup">
                <input type="text" value="<?php echo $rows['menu_name']; ?>" name="menuName" placeholder="Add new menu">
            </div>
            <button type="submit" class="adminSendButton" name="updateMenu"><img src="../icons\send_white_24dp.svg" alt=""> <span> Update Menu</span></button>
        </form>

    </section>

    <?php } require_once("footer.inc.php"); ?>