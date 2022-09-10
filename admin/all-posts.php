<?php require_once("header.inc.php"); require_once("functions.inc.php"); ?>

<div class="adminWrapper">

<?php require_once("sidebar.inc.php"); ?>

    <section class="adminSection">
        <div class="pageTitle" style="width: 90%;"><span>Add Category</span><a href="add-post.php">Add Post</a></div>
        <?php 
          $select = select($conn,"posts","categories","post_cate","category_slug","post_id","","","","");
          if(mysqli_num_rows($select)>0){
        ?>
         <div class="postContainer" style="width: 90%; margin: 10px auto;">
                <?php while($rows = mysqli_fetch_assoc($select)){ ?>
                    <div class="post">
                        <div class="postImage"><img src="../images/<?php echo $rows['post_image']; ?>"></div>
                        <div class="postAction">
                            <div class="postTitle"><p><?php echo $rows['post_title']; ?></p></div>
                            <div class="actionBtn">
                                <a href="javascript:void(0)"><?php echo $rows['post_menu']; ?></a>
                                <a href="javascript:void(0)"><?php echo $rows['category_name']; ?></a>
                                <a href="edit-post.php?postEdit=<?php echo $rows['post_id']; ?>">Edit</a>
                                <a href="delete.php?postDelete=<?php echo $rows['post_id']; ?>">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
         </div>
         <?php } ?>
    </section>

    <?php require_once("footer.inc.php"); ?>