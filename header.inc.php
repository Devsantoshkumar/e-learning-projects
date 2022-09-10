<?php 
  require_once("admin/config.inc.php");
  require_once("admin/functions.inc.php");
  require_once("functions.php");
  


  $page = basename($_SERVER['PHP_SELF']);

  switch($page){
     case "index.php":
      if(isset($_GET['menuId'])){
          $menuId = validate_data($conn,$_GET['menuId']);
          if(isset($_GET['cateId'])){
            $cateId = validate_data($conn,$_GET['cateId']);
            $select = select($conn,"categories","posts","category_slug","post_cate","","category_slug","'$cateId'","","");
            if(mysqli_num_rows($select)>0){
                $rows = mysqli_fetch_assoc($select);
                $title = $rows['category_name'] . " - " . "QSTUDIO";
                $metaDesc = $rows['post_meta_desc'];
                $metaKey = $rows['post_meta_key'];
            }else{
                $title = "Data not found";
                $metaDesc = "Default description";
                $metaKey = "Detault keywords";
            }
          }else{
            $select = select($conn,"posts","menus","post_menu","menu_slug","","menu_slug","'$menuId'","","");
            if(mysqli_num_rows($select)>0){
                $rows = mysqli_fetch_assoc($select);
                $title = $rows['menu_name'] . " - " . "QSTUDIO";
                $metaDesc = $rows['post_meta_desc'];
                $metaKey = $rows['post_meta_key'];
            }else{
                $title = "Data not found";
                $metaDesc = "Default description";
                $metaKey = "Detault keywords";
            }
          }
      }else{
            $title = "quietude studio";
            $metaDesc = "Default description";
            $metaKey = "Detault keywords";
      }
     break;
     case "projects-details.php":
      if(isset($_GET['postId'])){
            $postId = validate_data($conn,$_GET['postId']);
            $select = select($conn,"posts","","","","","post_slug","'$postId'","","");
            $rows = mysqli_fetch_assoc($select);
            $title = $rows['post_title'];
            $metaDesc = $rows['post_meta_desc'];
            $metaKey = $rows['post_meta_key'];
      }else{
            $title = "Project Detail - QSTUDIO";
            $metaDesc = "Default description";
            $metaKey = "Detault keywords";
      }
     break;
     case "search.php":
            $searchTerm = validate_data($conn,$_GET['s']);
            $title = $searchTerm;
            $metaDesc = "Default description";
            $metaKey = "Detault keywords";
     break;
     case "login.php":
            $title = "user login";
            $metaDesc = "Default description";
            $metaKey = "Detault keywords";
     break;
     case "registration.php":
            $title = "user registration";
            $metaDesc = "Default description";
            $metaKey = "Detault keywords";
     break;
     case "verify-email.php":
            $title = "email verification";
            $metaDesc = "Default description";
            $metaKey = "Detault keywords";
     break;
    default:
            $title = "Quietude Studio";
            $metaDesc = "Default description";
            $metaKey = "Detault keywords";
    break;
  }
  
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/quietude/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php echo $metaDesc; ?>">
    <meta name="keywords" content="<?php echo $metaKey; ?>">
    <meta name="author" content="QSTUDIO">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header class="header">
        <div class="HeaderLogo"><a href="<?php echo $baseUrl; ?>">e-learning</a></div>
        <div class="SearchBar">
            <form action="search.php">
                <div class="InputBox">
                    <input type="search" name="s" placeholder="Search" autocomplete="off">
                    <button type="submit"><img src="icons\search_white_24dp.svg"></button>
                </div>
            </form>
        </div>
        <div class="UserJoinBox">
            <?php 
              
              if(isset($_SESSION['LOGIN_EMAIL'])){
                 echo '<a href="javascript:void(0)" class="LoginBtn">Hello '.$_SESSION['LOGIN_FNAME'].'</a>
                       <a href="timeout.php" class="SignupBtn">Logout</a>';
              }else{
                echo '<a href="login.php" class="LoginBtn">Login</a>
                      <a href="registration.php" class="SignupBtn">Signup</a>';
              }
            
            ?>
            
        </div>
    </header>

<nav class="navigation">
    <button class="ToggleNav">
        <img src="icons\menu_black_24dp.svg" class="img">
    </button>
    <ul class="NavItems">
        <span class="CloseNave"><img src="icons\close_white_24dp.svg"></span>
        <li><a href="<?php echo $baseUrl; ?>">Home</a></li>
        <?php 
          $select = select($conn,"menus","","","","","","","","");
          if(mysqli_num_rows($select)>0){
              while($rows = mysqli_fetch_assoc($select)){
                  echo '<li><a href="'.$rows['menu_slug'].'">'.$rows['menu_name'].'</a></li>';
              }
          }
        ?>
    </ul>
    <div class="ToggleSidebarbtn">
        <button class="ToggleSide">
            <img src="icons\menu_black_24dp.svg" class="img image1">
            <img src="icons\close_black_24dp.svg" class="img image2">
        </button>
    </div>
</nav>
