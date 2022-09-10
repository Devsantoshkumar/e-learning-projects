<?php 
 require_once("header.inc.php");
?>

<div class="wrapper">
    <div class="MainContent">

   <?php require_once("left-sidebar.inc.php"); ?>
   <?php 

      if(isset($_GET['menuId'])){
            $menuId = validate_data($conn,$_GET['menuId']);
          if(isset($_GET['cateId'])){
            $cateId = validate_data($conn,$_GET['cateId']);
            $select = select($conn,"categories","","","","","category_slug","'$cateId'","","");
            $heading = mysqli_fetch_assoc($select);
            $heading2 = $heading['category_name'];
          }else{
            $select = select($conn,"menus","","","","","menu_slug","'$menuId'","","");
            $heading = mysqli_fetch_assoc($select);
            $heading2 = $heading['menu_name'];
          }
      }else{
            $heading2 = "Download Projects";
      }
    
    ?>
    

    <section class="ContentSection">
        <h1 class="TopicHeading"><?php echo $heading2; ?></h1>
        <article class="content">
          <?php 
            if(isset($_GET['menuId'])){
                  $menuId = validate_data($conn,$_GET['menuId']);
                  if(isset($_GET['cateId'])){
                    $cateId = validate_data($conn,$_GET['cateId']);
                    displayProjects($conn,"post_cate","'$cateId'","","");
                  }else{
                    displayProjects($conn,"post_menu","'$menuId'","","");
                  }
            }else{
                displayProjects($conn,"post_menu","'project'","","");
            }
          ?>

        </article>
    </section>
    </div>

    <?php require_once("right-sidebar.inc.php"); ?>
    
    <?php require_once("footer.inc.php"); ?>