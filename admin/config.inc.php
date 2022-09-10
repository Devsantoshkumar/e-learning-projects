<?php 

 session_start();

 $adminBaseUrl = "http://localhost/quietude/admin";
 $baseUrl = "http://localhost/quietude";


$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "website_db";

$conn = mysqli_connect($hostName,$userName,$password,$dbName);

if(!isset($conn)){
    echo "Connection Failed";
}

?>