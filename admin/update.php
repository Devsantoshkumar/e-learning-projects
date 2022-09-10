<?php 
 
 require_once("config.inc.php");
 require_once("functions.inc.php");

 if(isset($_POST['updateUser'])){   // user update query

    $userId = validate_data($conn,$_POST['userId']);
    $fname = validate_data($conn,$_POST['fname']);
    $lname = validate_data($conn,$_POST['lname']);
    $email = validate_data($conn,$_POST['email']);
    $role = validate_data($conn,$_POST['role']);
    
    $update = update($conn,'users',array(
        'user_fname' => "'$fname'",
        'user_lname' => "'$lname'",
        'user_email' => "'$email'",
        'user_role' => $role
    ),'user_id',"$userId",'','');
    
    if($update){
        header("location:$adminBaseUrl/dashboard.php");
        die();
    }else{
        $_SESSION['USER-MSG'] = "<span class='text-danger'>Data not update</span>";
        header("location:$adminBaseUrl/edit-user.php?userEdit=$userId");
        die();
    }


 }else if(isset($_POST['updateMenu'])){  // menu update query

    $menuId = validate_data($conn,$_POST['menuId']);
    $menuName = validate_data($conn,$_POST['menuName']);
    $menuSlug = slug($menuName);
    
    $update = update($conn,'menus',array(
        'menu_name' => "'$menuName'",
        'menu_slug' => "'$menuSlug'"
    ),'menu_id',"$menuId",'','');
    
    if($update){
        header("location:$adminBaseUrl/add-menu.php");
        die();
    }else{
        $_SESSION['USER-MSG'] = "<span class='text-danger'>$menuName menu is not update</span>";
        header("location:$adminBaseUrl/edit-menu.php?menuEdit=$menuId");
        die();
    }
 }else if(isset($_POST['updateCategory'])){  // categroy update query

    $cateId = validate_data($conn,$_POST['cateId']);
    $cateName = validate_data($conn,$_POST['cateName']);
    $categoryMenu = validate_data($conn,$_POST['categoryMenu']);
    $cateSlug = slug($cateName);
    
    $update = update($conn,'categories',array(
        'category_name' => "'$cateName'",
        'category_menu' => "'$categoryMenu'",
        'category_slug' => "'$cateSlug'"
    ),'category_id',"$cateId",'','');
    
    if($update){
        header("location:$adminBaseUrl/add-category.php");
        die();
    }else{
        $_SESSION['USER-MSG'] = "<span class='text-danger'>$cateName category is not update</span>";
        header("location:$adminBaseUrl/edit-category.php?cateEdit=$cateId");
        die();
    }
 }else if(isset($_POST['updatePost'])){  // post update query

    $EditpostImgName = $_FILES["image1"]["name"];
    $EditpostImgTmpName = $_FILES["image1"]["tmp_name"];
    $EditpostImgPath = "../images/".$EditpostImgName;

    $EditpostFileName = $_FILES["file1"]["name"];
    $EditpostFileTmpName = $_FILES["file1"]["tmp_name"];
    $EditpostFilePath = "../files/".$EditpostFileName;

    $EditpostId = validate_post($conn,$_POST['postId']);
    $EditpostTitle = validate_post($conn,$_POST['title']);
    $EditpostSlug = slug($EditpostTitle);
    $EditpostDesc = validate_post($conn,$_POST['description']);
    $EditpostFacebookUrl = validate_post($conn,$_POST['facebookLink']);
    $EditpostYoutubeUrl = validate_post($conn,$_POST['youtubeLink']);
    $EditpostProjPrice = validate_post($conn,$_POST['projectPrice']);
    $EditpostProjectType = validate_post($conn,$_POST['ProjectType']);
    $EditpostImage2 = validate_post($conn,$_POST['image2']);
    $EditpostFile2 = validate_post($conn,$_POST['file2']);
    $EditpostImgAlt = validate_post($conn,$_POST['imageAlt']);
    $EditpostImgTitle = validate_post($conn,$_POST['imageTitle']);
    $EditpostMetaTitle = validate_post($conn,$_POST['metaTitle']);
    $EditpostMetaDesc = validate_post($conn,$_POST['metaDescription']);
    $EditpostMetaKey = validate_post($conn,$_POST['metaKeywords']);
    $postMenu = validate_post($conn,$_POST['postMenu']);
    $postCate = validate_post($conn,$_POST['postCate']);

    if(empty($EditpostImgName)){
        $newEditpostImage = $EditpostImage2;
    }else{
        $newEditpostImage = $EditpostImgName;
    }
    
    if(empty($EditpostFileName)){
        $newEditpostFile = $EditpostFile2;
    }else{
        $newEditpostFile = $EditpostFileName;
    }

    $update = update($conn,'posts',array(
        'post_title' => "'$EditpostTitle'",
        'post_slug' => "'$EditpostSlug'",
        'post_desc' => "'$EditpostDesc'",
        'post_fb_link' => "'$EditpostFacebookUrl'",
        'post_yt_link' => "'$EditpostYoutubeUrl'",
        'post_price' => "'$EditpostProjPrice'",
        'post_type' => "'$EditpostProjectType'",
        'post_image' => "'$newEditpostImage'",
        'post_file' => "'$newEditpostFile'",
        'post_img_alt' => "'$EditpostImgAlt'",
        'post_img_title' => "'$EditpostImgTitle'",
        'post_meta_title' => "'$EditpostMetaTitle'",
        'post_meta_desc' => "'$EditpostMetaDesc'",
        'post_meta_key' => "'$EditpostMetaKey'",
        'post_menu' => "'$postMenu'",
        'post_cate' => "'$postCate'"
    ),'post_id',"$EditpostId",'','');

    if($update){
        if(move_uploaded_file($EditpostImgTmpName,$EditpostImgPath)){
            unlink("../images/".$EditpostImage2);
        }
        if(move_uploaded_file($EditpostFileTmpName,$EditpostFilePath)){
            unlink("../files/".$EditpostFile2);
        }
        customassage("EDITPOST-MSG","text-success","Post updated successfully","$adminBaseUrl","all-posts.php");
    }else{
        customassage("EDITPOST-MSG","text-danger","Post is not updated","$adminBaseUrl","edit-post.php?postEdit=$EditpostId");
    }

 }

 ?>