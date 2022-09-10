<?php
require_once("config.inc.php");
require_once("functions.inc.php");

if(isset($_POST['addUser'])){    // user add query
    $fname = validate_data($conn,$_POST['fname']);
    $lname = validate_data($conn,$_POST['lname']);
    $email = validate_data($conn,$_POST['email']);
    $password = validate_data($conn,$_POST['password']);
    $role = validate_data($conn,$_POST['role']);
    $password = sha1($password);

    if(empty($fname) || empty($email) || empty($password)){
        customassage("USER-MSG","text-danger","All fields are required.","$adminBaseUrl","add-user.php");
    }else{
        $select = select($conn,'users','','','','','user_email',"'$email'",'','');
        if(mysqli_num_rows($select)>0){
            customassage("USER-MSG","text-danger","This $email user already exist","$adminBaseUrl","add-user.php");
        }else{
            $insert = insert($conn,'users',array(
                'user_fname' => "'$fname'",
                'user_lname' => "'$lname'",
                'user_email' => "'$email'",
                'user_password' => "'$password'",
                'user_role' => $role,
                'user_status' => 0
            ));
            if($insert){
                customassage("USER-MSG","text-success","User added successfully","$adminBaseUrl","dashboard.php");
            }else{
                customassage("USER-MSG","text-danger","User not added","$adminBaseUrl","add-user.php");
            }
        }
    }


}else if(isset($_POST['addMenu'])){  // menu add query

    $menuName = validate_data($conn,$_POST['menuName']);
    $menuSlug = slug($menuName);

    if(empty($menuName)){
        customassage("MENU-MSG","text-danger","All fields are required.","$adminBaseUrl","add-menu.php");
    }else{
        $select = select($conn,'menus','','','','','menu_name',"'$menuName'",'','');
        if(mysqli_num_rows($select)>0){
            customassage("MENU-MSG","text-danger","$menuName menu is already exist","$adminBaseUrl","add-menu.php");
        }else{
            $insert = insert($conn,'menus',array(
                'menu_name' => "'$menuName'",
                'menu_slug' => "'$menuSlug'"
            ));
            if($insert){
                customassage("MENU-MSG","text-success","$menuName menu added successfully","$adminBaseUrl","add-menu.php");
            }else{
                customassage("MENU-MSG","text-danger","$menuName menu not added.","$adminBaseUrl","add-menu.php");
            }
        }
    }
}else if(isset($_POST['addCategory'])){  // category add query
   
    $categoryName = validate_data($conn,$_POST['categoryName']);
    $menuName = validate_data($conn,$_POST['menuName']);
    $categorySlug = slug($categoryName);

    if(empty($categoryName) || empty($menuName)){
        customassage("CATE-MSG","text-danger","All fields are required.","$adminBaseUrl","add-category.php");
    }else{
        $select = select($conn,'categories','','','','','category_name',"'$categoryName'",'','');
        if(mysqli_num_rows($select)>0){
            customassage("CATE-MSG","text-danger","$categoryName menu is already exist","$adminBaseUrl","add-category.php");
        }else{
            $insert = insert($conn,'categories',array(
                'category_name' => "'$categoryName'",
                'category_slug' => "'$categorySlug'",
                'category_menu' => "'$menuName'"
            ));
            if($insert){
                customassage("CATE-MSG","text-success","$categoryName menu added successfully","$adminBaseUrl","add-category.php");
            }else{
                customassage("CATE-MSG","text-danger","$categoryName menu not added.","$adminBaseUrl","add-category.php");
            }
        }
    }

}else if(isset($_POST['addPost'])){  // post add query

    $postImageName = $_FILES["imageName"]["name"];
    $postImageTmpName = $_FILES["imageName"]["tmp_name"];
    $postImagePath = "../images/".$postImageName;
    $postImageSize = $_FILES["imageName"]["size"];

    $postFileName = $_FILES["fileName"]["name"];
    $postFileTmpName = $_FILES["fileName"]["tmp_name"];
    $postFilePath = "../files/".$postFileName;


    $postTitle = validate_post($conn,$_POST['title']);
    $postSlug = slug($postTitle);
    $postDesc = validate_post($conn,$_POST['description']);
    $postFacebookUrl = validate_post($conn,$_POST['facebookLink']);
    $postYoutubeUrl = validate_post($conn,$_POST['youtubeLink']);
    $postProjPrice = validate_post($conn,$_POST['projectPrice']);
    $postProjectType = validate_post($conn,$_POST['projectType']);
    $postImgAlt = validate_post($conn,$_POST['imageAlt']);
    $postImgTitle = validate_post($conn,$_POST['imageTitle']);
    $postMetaTitle = validate_post($conn,$_POST['metaTitle']);
    $postMetaDesc = validate_post($conn,$_POST['metaDesc']);
    $postMetaKey = validate_post($conn,$_POST['metaKeyw']);
    $postMenu = validate_post($conn,$_POST['postMenu']);
    $postCate = validate_post($conn,$_POST['postCate']);

    $insert = insert($conn,'posts',array(
        'post_title' => "'$postTitle'",
        'post_slug' => "'$postSlug'",
        'post_desc' => "'$postDesc'",
        'post_fb_link' => "'$postFacebookUrl'",
        'post_yt_link' => "'$postYoutubeUrl'",
        'post_price' => "'$postProjPrice'",
        'post_type' => "$postProjectType",
        'post_image' => "'$postImageName'",
        'post_file' => "'$postFileName'",
        'post_img_alt' => "'$postImgAlt'",
        'post_img_title' => "'$postImgTitle'",
        'post_meta_title' => "'$postMetaTitle'",
        'post_meta_desc' => "'$postMetaDesc'",
        'post_meta_key' => "'$postMetaKey'",
        'post_menu' => "'$postMenu'",
        'post_cate' => "'$postCate'"
    ));
    if($insert){
        if(move_uploaded_file($postImageTmpName,$postImagePath) && move_uploaded_file($postFileTmpName,$postFilePath)){
            customassage("POST-MSG","text-success","Post Published successfully","$adminBaseUrl","all-posts.php");
        }else{
            customassage("POST-MSG","text-danger","Image or File not uploaded","$adminBaseUrl","all-posts.php");
        }
    }else{
            customassage("POST-MSG","text-danger","Post not Published","$adminBaseUrl","add-post.php");
    }

}else if(isset($_POST['AdminLogin'])){   // admin login query

    $EmailId = validate_data($conn,$_POST['EmailId']);
    $password1 = validate_data($conn,$_POST['password']);
    $password = sha1($password1);

    if(empty($EmailId) || empty($password1)){
        customassage("ADMINLOGIN-MSG","text-danger","All fields are required","$adminBaseUrl","");
    }else{
        // $select1 = select($conn,"users","","","","","user_email","'$EmailId'","","");
        $select1 = "SELECT * FROM users WHERE user_email = '$EmailId' AND user_role = 1";
        $query1 = mysqli_query($conn,$select1) or die("Admin login query failed");
        if(mysqli_num_rows($query1)>0){
            $rows = mysqli_fetch_assoc($query1);
            $dbPassword = $rows['user_password'];
            if($dbPassword == $password){
                $_SESSION['ADLOGIN_FNAME'] = $rows['user_fname'];
                $_SESSION['ADLOGIN_EMAIL'] = $rows['user_email'];
                $_SESSION['ADLOGIN_ROLE'] = $rows['user_role'];
                customassage("ADMINLOGIN-MSG","text-success","Login successfully","$adminBaseUrl","dashboard.php");
            }else{
                customassage("ADMINLOGIN-MSG","text-danger","password is incorrect","$adminBaseUrl","");
            }
        }else{
            customassage("ADMINLOGIN-MSG","text-danger","Email id or password incorrect","$adminBaseUrl","");
        }
    }

}



?>