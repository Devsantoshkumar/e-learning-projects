<?php 
include("admin/config.inc.php");

session_unset();

session_destroy();

header("location:$baseUrl/login.php");

die();


?>