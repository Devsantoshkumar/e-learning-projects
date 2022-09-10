<?php require_once("header.inc.php"); require_once("functions.inc.php"); ?>

<div class="adminWrapper">

<?php require_once("sidebar.inc.php"); ?>
        <?php 
          $postEdit = validate_data($conn,$_GET['postEdit']);
          $select = select($conn,"posts","","","","","post_id","$postEdit","","");
          if(mysqli_num_rows($select)>0){
              $rows = mysqli_fetch_assoc($select);
        ?>
    <section class="adminSection">
        <div class="pageTitle"><span>Publish New Post</span></div>
        <form action="update.php" method="POST" enctype="multipart/form-data" class="adminForm">
            <div class="adminInputGroup">
                <input type="hidden" value="<?php echo $rows['post_id']; ?>" name="postId">
            </div>
            <div class="adminInputGroup">
                <label for="title">Post Title</label>
                <input type="text" value="<?php echo $rows['post_title']; ?>" name="title" id="title">
            </div>
            <div class="adminInputGroup">
                <label for="Description">Post Description</label>
                <textarea name="description" id="Description"><?php echo $rows['post_desc']; ?></textarea>
            </div>
            <div class="adminInputGroup">
                <label for="facebooklink">Facebook Link</label>
                <input type="text" value="<?php echo $rows['post_fb_link']; ?>" name="facebookLink" id="facebooklink">
            </div>
            <div class="adminInputGroup">
                <label for="youtubeLink">YouTube Link</label>
                <input type="text" value="<?php echo $rows['post_yt_link']; ?>" name="youtubeLink" id="youtubeLink">
            </div>
            <div class="inputWrapper">
                <div class="adminInputGroup">
                    <label for="projectPrice">Project Price</label>
                    <input type="text" value="<?php echo $rows['post_price']; ?>" name="projectPrice" id="projectPrice">
                </div>
                <div class="adminInputGroup">
                    <label for="ProjectType">Project Type</label>
                    <select name="ProjectType" id="ProjectType">
                        <?php 
                        if($rows['post_type'] == 1){
                            echo '<option value="0">Free Project</option>
                                  <option value="1" selected>Paid Project</option>';
                        }else{
                            echo '<option value="0" selected>Free Project</option>
                                  <option value="1">Paid Project</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="inputWrapper">
                <div class="adminInputGroup">
                    <label for="image">Upload Image</label>
                    <input type="file" id="image" name="image1">
                    <input type="hidden" value="<?php echo $rows['post_image']; ?>" id="image" name="image2">
                </div>
                <div class="adminInputGroup">
                    <label for="file">Upload File</label>
                    <input type="file" id="file" name="file1">
                    <input type="hidden" value="<?php echo $rows['post_file']; ?>" name="file2">
                </div>
            </div>
            <div class="inputWrapper">
                <div class="adminInputGroup">
                    <label for="imageAlt">Image Alt</label>
                    <input type="text" value="<?php echo $rows['post_img_alt']; ?>" id="imageAlt" name="imageAlt">
                </div>
                <div class="adminInputGroup">
                    <label for="imageTitle">Image Title</label>
                    <input type="text" value="<?php echo $rows['post_img_title']; ?>" name="imageTitle" id="imageTitle">
                </div>
            </div>
            <div class="adminInputGroup">
                <label for="metaTitle">Meta Title</label>
                <input type="text" value="<?php echo $rows['post_meta_title']; ?>" name="metaTitle" id="metaTitle">
            </div>
            <div class="adminInputGroup">
                <label for="metadesc">Meta Description</label>
                <textarea name="metaDescription" id="metadesc"><?php echo $rows['post_meta_desc']; ?></textarea>
            </div>
            <div class="adminInputGroup">
                <label for="metaKeys">Meta Keywords</label>
                <input type="text" value="<?php echo $rows['post_meta_key']; ?>" name="metaKeywords" id="metaKeys">
            </div>
            <div class="inputWrapper">
                <div class="adminInputGroup">
                    <?php 
                    $select = select($conn,"menus","","","","","","","","");
                    if(mysqli_num_rows($select)>0){
                    ?>
                    <select name="postMenu" onchange="loadPostCate(this.value)">
                    <option selected>Select Menu</option>
                        <?php while($rows1 = mysqli_fetch_assoc($select)){ 
                            if($rows1['menu_slug'] == $rows['post_menu']){
                                $selected = "selected";
                            }else{
                                $selected = "";
                            }
                            echo '<option value="'.$rows1['menu_slug'].'" '.$selected.'>'.$rows1['menu_name'].'</option>';
                        } ?>
                    </select>
                    <?php } ?>
                </div>
                <div class="adminInputGroup">
                    <?php 
                    $select = select($conn,"categories","","","","","","","","");
                    if(mysqli_num_rows($select)>0){
                    ?>
                    <select name="postCate" id="postCategory">
                        <option selected>Selected Category</option>
                        <?php while($rows2 = mysqli_fetch_assoc($select)){ 
                            if($rows2['category_slug'] == $rows['post_cate']){
                                $selected = "selected";
                            }else{
                                $selected = "";
                            }
                            echo '<option value="'.$rows2['category_slug'].'" '.$selected.'>'.$rows2['category_name'].'</option>';
                        } ?>
                    </select>
                    <?php } ?>
                </div>
            </div>
            <button type="submit" class="adminSendButton" name="updatePost"><img src="../icons\send_white_24dp.svg" alt=""> <span> Update Post</span></button>
        <?php 
         if(isset($_SESSION['EDITPOST-MSG'])){
             echo $_SESSION['EDITPOST-MSG'];
         }
        ?>
        </form>

    </section>

    <?php } require_once("footer.inc.php"); ?>