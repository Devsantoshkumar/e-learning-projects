<?php  
include("admin/config.inc.php");
include("admin/functions.inc.php");

if(isset($_GET['downloadFile'])){
     if(isset($_SESSION['LOGIN_EMAIL'])){
        $FileId = validate_data($conn,$_GET['downloadFile']);
        $select1 = select($conn,"posts","","","","","post_id","$FileId","","");
        if(mysqli_num_rows($select1)>0){
            $data = mysqli_fetch_assoc($select1);
            $FileName = "files/".$data['post_file'];
            if (file_exists($FileName)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($FileName));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($FileName));
                ob_clean();
                flush();
                readfile($FileName);
                header("location:$baseUrl/projects-details.php");
                exit;
            }
        }
     }else{
        header("location:$baseUrl/registration.php");
        die();
     }
}

?>