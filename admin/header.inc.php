<?php require_once("config.inc.php");

if(!isset($_SESSION['LOGIN_EMAIL'])){
    header("location:$baseUrl/");
    die();
}
if($_SESSION['LOGIN_ROLE'] != 1){
    header("location:$baseUrl/");
    die();
}
if(!isset($_SESSION['ADLOGIN_EMAIL'])){
    header("location:$adminBaseUrl/");
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
    <link rel="stylesheet" href="../css/adminstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Header section start -->
    <header class="header">
        <div class="HeaderLogo"><a href="dashboard.php">Dashboard</a></div>
        <div class="UserJoinBox">
            <a href="../timeout.php" class="LoginBtn">Logout</a>
        </div>
    </header>
<!-- Header section end -->