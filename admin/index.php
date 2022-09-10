<?php 
include("config.inc.php");
if(!isset($_SESSION['LOGIN_EMAIL'])){
    header("location:$baseUrl/");
    die();
}
if($_SESSION['LOGIN_ROLE'] != 1){
    header("location:$baseUrl");
    die();
}
if(isset($_SESSION['ADLOGIN_EMAIL'])){
    header("location:$adminBaseUrl/dashboard.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quietude</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="RegistrationContainer">
    <!-- Left sidebar section start -->
    <aside class="sidebar1"></aside>
    <!-- Left sidebar section End -->
    
    <!-- Content section start -->
    <section class="userForm">
        <form action="insert.php" method="POST" class="mainForm" >
            <span class="FormHeading">Admin Pannel</span>
            <div class="InputGroup">
                <input type="email" name="EmailId" placeholder="Admin email">
            </div>
            <div class="InputGroup">
                <input type="password" name="password" placeholder="Admin password">
            </div>
            <button type="submit" class="actionSendButton" name="AdminLogin"><img src="../icons/send_white_24dp.svg" alt=""> <span> Login</span></button>
            <div class="errormsg">
                <?php 
                  if(isset($_SESSION['ADMINLOGIN-MSG'])){
                      echo $_SESSION['ADMINLOGIN-MSG'];
                  }
                ?>
            </div>
        </form>
    </section>
    <!-- Content section End -->

    <!-- Right sidebar section start -->
    <aside class="sidebar2"></aside>
    <!-- Right sidebar section end -->
</div>

<script src="../js/index.js"></script>
</body>
</html>