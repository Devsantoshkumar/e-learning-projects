<?php require_once("header.inc.php"); require_once("functions.inc.php"); ?>

<div class="adminWrapper">

<?php require_once("sidebar.inc.php"); ?>

    <section class="adminSection">
        <div class="pageTitle"><span>Publish New Post</span></div>
        <form action="insert.php" method="POST" enctype="multipart/form-data" class="adminForm">
            <div class="adminInputGroup">
                <input type="text" name="title" placeholder="Post Title">
            </div>
            <div class="adminInputGroup">
                <textarea name="description" placeholder="Post description"></textarea>
            </div>
            <div class="adminInputGroup">
                <input type="text" name="facebookLink" placeholder="Facebook video link">
            </div>
            <div class="adminInputGroup">
                <input type="text" name="youtubeLink" placeholder="YouTube video link">
            </div>
            <div class="inputWrapper">
                <div class="adminInputGroup">
                    <input type="text" name="projectPrice" placeholder="Project Price">
                </div>
                <div class="adminInputGroup">
                    <select name="projectType" id="">
                        <option value="0">Free Project</option>
                        <option value="1">Paid Project</option>
                    </select>
                </div>
            </div>
            <div class="inputWrapper">
                <div class="adminInputGroup">
                    <input type="file" name="imageName">
                </div>
                <div class="adminInputGroup">
                    <input type="file" name="fileName">
                </div>
            </div>
            <div class="inputWrapper">
                <div class="adminInputGroup">
                    <input type="text" name="imageAlt" placeholder="Image Alt">
                </div>
                <div class="adminInputGroup">
                    <input type="text" name="imageTitle" placeholder="Image Title">
                </div>
            </div>
            <div class="adminInputGroup">
                <input type="text" name="metaTitle" placeholder="Meta Title">
            </div>
            <div class="adminInputGroup">
                <textarea name="metaDesc" placeholder="Meta description"></textarea>
            </div>
            <div class="adminInputGroup">
                <input type="text" name="metaKeyw" placeholder="Meta Keywords">
            </div>
            <div class="inputWrapper">
                <div class="adminInputGroup">
                <?php 
                    $select = select($conn,"menus","","","","","","","","");
                    if(mysqli_num_rows($select)>0){
                    ?>
                    <select name="postMenu" onchange="loadPostCate(this.value)">
                    <option selected>Select Menu</option>
                        <?php while($rows = mysqli_fetch_assoc($select)){ 
                            echo '<option value="'.$rows['menu_slug'].'">'.$rows['menu_name'].'</option>';
                        } ?>
                    </select>
                    <?php } ?>
                </div>
                <div class="adminInputGroup">
                    <select name="postCate" id="postCategory">
                        <option selected>Selected Category</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="adminSendButton" name="addPost"><img src="../icons\send_white_24dp.svg" alt=""> <span> Add Category</span></button>
        </form>

    </section>

    <?php require_once("footer.inc.php"); ?>