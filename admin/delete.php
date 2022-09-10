<?php 

require_once("config.inc.php");
require_once("functions.inc.php");

if(isset($_GET['userDelete'])){  // user delete query
    $userDelete = validate_data($conn,$_GET['userDelete']);
    $delete = delete($conn,'users','user_id',$userDelete);

    if($delete){
        header("location:$adminBaseUrl/dashboard.php");
        die();
    }
}else if(isset($_GET['menuDelete'])){  // menu delete query

    $menuDelete = validate_data($conn,$_GET['menuDelete']);
    $delete = delete($conn,'menus','menu_id',$menuDelete);

    if($delete){
        header("location:$adminBaseUrl/add-menu.php");
        die();
    }
}else if(isset($_GET['cateDelete'])){  // cate delete query
   
    $cateDelete = validate_data($conn,$_GET['cateDelete']);
    $delete = delete($conn,'categories','category_id',$cateDelete);

    if($delete){
        header("location:$adminBaseUrl/add-category.php");
        die();
    }
}else if(isset($_GET['postDelete'])){  // post delete query 

    $postDelete = validate_data($conn,$_GET['postDelete']);

    $select = select($conn,"posts","","","","","post_id","$postDelete","","");
    if(mysqli_num_rows($select)>0){
        $fiels = mysqli_fetch_assoc($select);
        $ImageName = $fiels['post_image'];
        $FileName = $fiels['post_file'];
        unlink("../images/".$ImageName);
        unlink("../files/".$FileName);

        $delete = delete($conn,'posts','post_id',$postDelete);
        if($delete){
            customassage("","","","$adminBaseUrl","all-posts.php");
        }
    }

}


?>