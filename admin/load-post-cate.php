<?php 

include("config.inc.php");
include("functions.inc.php");

if(isset($_GET['postCateId'])){
    $postCateId = validate_data($conn,$_GET['postCateId']);
    $select = select($conn,"categories","","","","","category_menu","'$postCateId'","","");
    $output = "";
    if(mysqli_num_rows($select)>0){
       while($rows = mysqli_fetch_assoc($select)){
           $output .= "<option value='{$rows['category_slug']}'>{$rows['category_name']}</option>";
       }
    }else{
        $output = "<option>Category not available</option>";
    }
    echo $output;
}
mysqli_close($conn);


?>