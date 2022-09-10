<?php 
 require_once("header.inc.php");
?>

<div class="wrapper">
    <div class="MainContent">

        <?php  require_once("left-sidebar.inc.php"); ?>

    
    <?php 
      if(isset($_GET['postId'])){
          $postId = validate_data($conn,$_GET['postId']);
          $select = select($conn,"posts","","","","","post_slug","'$postId'","","");
          if($select){
              $rows = mysqli_fetch_assoc($select);
    ?>
    <section class="ContentSection">
        <h1 class="TopicHeading"><?php echo $rows['post_title']; ?></h1>
        <article class="contentDetailPage">
           <div class="projDetailSection">
               <img src="images\<?php echo $rows['post_image']; ?>" class="image" alt="<?php echo $rows['post_img_alt']; ?>" title="<?php echo $rows['post_img_title']; ?>">
               <div class="detailActionBtns">
                   <a href="download.php?downloadFile=<?php echo $rows['post_id']; ?>" class="button"><i class="fa fa-download"></i> Download</a>
                   <?php 
                     if($rows['post_type'] == 1){
                          echo '<a href="javascript:void(0)" class="button"><i class="fa fa-money"></i> '.$rows['post_price'].' NIR</a>';
                     }else{
                          echo "";
                     }
                   ?>
                   <a href="<?php echo $rows['post_yt_link']; ?>" target="_blank" class="button"><i class="fa fa-youtube-play"></i> Watch on YouTube</a>
                   <a href="<?php echo $rows['post_fb_link']; ?>" target="_blank" class="button"><i class="fa fa-facebook"></i> Watch on Facebook</a>
               </div>
               <div class="projDesction">
                   <h2 class="projectHeader">Project features</h2>
                   <div class="description">
                   <p><?php echo $rows['post_desc']; ?></p>
                </div>
               </div>
           </div>
        </article>

        <h1 class="recommondedHeading">Recommonded Posts</h1>
        <div class="recommondedProj">
            <?php 
                if(isset($_GET['cateId'])){
                    $cateId = validate_data($conn,$_GET['cateId']);
                    displayProjects($conn,"post_cate","'$cateId'","","");
                    }else{
                    displayProjects($conn,"post_menu","'$menuId'","","");
                }
            ?>
        </div>
    </section>
    <?php } } ?>
    </div>


    <?php require_once("right-sidebar.inc.php"); ?>
    
    <?php require_once("footer.inc.php"); ?>