<?php 

require_once("admin/config.inc.php");
require_once("admin/functions.inc.php");
require_once("functions.php");

if(isset($_POST['signupBtn'])){   // USER REGISTRATION FORM QUERY
    
    $fname = validate_data($conn,$_POST['Fname']);
    $Lname = validate_data($conn,$_POST['Lname']);
    $EmailId = validate_data($conn,$_POST['EmailId']);
    $Password1 = validate_data($conn,$_POST['Password']);

    $password = sha1($Password1);
    $emailOtp = rand(111111,999999);

    if(empty($fname) || empty($Lname) || empty($EmailId) || empty($Password1)){
        customassage("REG-MSG","text-danger","All fields are required.","$baseUrl","registration.php");
    }else{
        $select1 = select($conn,"users","","","","","user_email","'$EmailId'","","");
        if(mysqli_num_rows($select1)>0){
            customassage("REG-MSG","text-danger","This $EmailId user is already exist","$baseUrl","registration.php");
        }else{
            $sendmail = emailsend($fname,$emailOtp,$EmailId);
            if($sendmail){
                $_SESSION['REGE_FNAME'] = $fname;
                $_SESSION['REGE_LNAME'] = $Lname;
                $_SESSION['REGE_EMAIL'] = $EmailId;
                $_SESSION['REGE_PASS'] = $password;
                $_SESSION['REGE_OTP'] = $emailOtp;
                customassage("REG-MSG","text-success","Send OTP on $EmailId","$baseUrl","verify-email.php");
            }else{
                customassage("REG-MSG","text-danger","Email not send Inter correct email.","$baseUrl","registration.php");
            }
        }
    }

}else if(isset($_POST['emailVerify'])){   // email verification query

    $EmailOTPForm = validate_data($conn,$_POST['EmailOTPForm']);
    $EmailOTPServer = $_SESSION['REGE_OTP'];
    $Fname = $_SESSION['REGE_FNAME'];
    $Lname = $_SESSION['REGE_LNAME'];
    $EmailId = $_SESSION['REGE_EMAIL'];
    $Password = $_SESSION['REGE_PASS'];

    if(empty($EmailOTPForm)){
        customassage("REG-MSG","text-danger","OTP is required","$baseUrl","verify-email.php");
    }else if($EmailOTPForm == $EmailOTPServer){
        $insert = insert($conn,'users',array(
            'user_fname' => "'$Fname'",
            'user_lname' => "'$Lname'",
            'user_email' => "'$EmailId'",
            'user_password' => "'$Password'"
        ));
        if($insert){
            $select1 = select($conn,"users","","","","","user_email","'$EmailId'","","");
            if(mysqli_num_rows($select1)>0){
                $rows = mysqli_fetch_assoc($select1);
                $_SESSION['LOGIN_FNAME'] = $rows['user_fname'];
                $_SESSION['LOGIN_EMAIL'] = $rows['user_email'];
                $_SESSION['LOGIN_ROLE'] = $rows['user_role'];
            }
            customassage("REG-MSG","text-danger","Email is verified","$baseUrl","");
        }else{
            customassage("REG-MSG","text-danger","Something is error try again","$baseUrl","verify-email.php");
        }
    }else{
        customassage("REG-MSG","text-danger","Incorrect OTP","$baseUrl","verify-email.php");
    }

}else if(isset($_POST['LoginUser'])){  // user email login query
    
    $EmailId = validate_data($conn,$_POST['EmailId']);
    $password1 = validate_data($conn,$_POST['password']);
    $password = sha1($password1);

    if(empty($EmailId) || empty($password1)){
        customassage("LOGIN-MSG","text-danger","All fields are required","$baseUrl","login.php");
    }else{
        $select1 = select($conn,"users","","","","","user_email","'$EmailId'","","");
        if(mysqli_num_rows($select1)>0){
            $rows = mysqli_fetch_assoc($select1);
            $dbPassword = $rows['user_password'];
            if($dbPassword == $password){
                $_SESSION['LOGIN_FNAME'] = $rows['user_fname'];
                $_SESSION['LOGIN_EMAIL'] = $rows['user_email'];
                $_SESSION['LOGIN_ROLE'] = $rows['user_role'];
                customassage("LOGIN-MSG","text-success","Login successfully","$baseUrl","");
            }else{
                customassage("LOGIN-MSG","text-danger","password is incorrect","$baseUrl","login.php");
            }
        }else{
            customassage("LOGIN-MSG","text-danger","Email id or password incorrect","$baseUrl","login.php");
        }
    }

}else if(isset($_POST['ForgetPassword'])){  // user forget password query

    $EmailId = validate_data($conn,$_POST['EmailId']);
    $emailOtp = rand(111111,999999);
    if(empty($EmailId)){
        customassage("FORGETPASS-MSG","text-danger","Field is required","$baseUrl","forget-password.php");
    }else{
        $select1 = select($conn,"users","","","","","user_email","'$EmailId'","","");
        if(mysqli_num_rows($select1)>0){
            $rows = mysqli_fetch_assoc($select1);
            $fname = $rows['user_fname'];
            $sendmail = emailsend($fname,$emailOtp,$EmailId);
            if($sendmail){
                $_SESSION['FORGETPASS_OTP'] = $emailOtp;
                $_SESSION['FORGETPASS_EMAIL'] = $EmailId;
                customassage("RESETPASSOTP-MSG","text-success","Send OTP on $EmailId","$baseUrl","reset-passwrod-otp.php");
            }else{
                customassage("FORGETPASS-MSG","text-danger","Email not send try again","$baseUrl","forget-password.php");
            }
        }else{
            customassage("FORGETPASS-MSG","text-danger","Incorrect email address","$baseUrl","forget-password.php");
        }
    }
}else if(isset($_POST['PasswordOTP'])){   // reset password opt query

    $ResetPassOtp = validate_data($conn,$_POST['ResetPassOtp']);
    $EmailOTPServer = $_SESSION['FORGETPASS_OTP'];

    if(empty($ResetPassOtp)){
        customassage("RESETPASSOTP-MSG","text-danger","OTP is required","$baseUrl","reset-passwrod-otp.php");
    }else if($ResetPassOtp == $EmailOTPServer){
        customassage("","","","$baseUrl","create-password.php");
    }else{
        customassage("RESETPASSOTP-MSG","text-danger","Incorrect OTP","$baseUrl","reset-passwrod-otp.php");
    }
}else if(isset($_POST['createPasswrod'])){   // create new password

    $newpassword = validate_data($conn,$_POST['newpassword']);
    $confirmpassword = validate_data($conn,$_POST['confirmpassword']);
    $EmailId = $_SESSION['FORGETPASS_EMAIL'];
    $codedPassword = sha1($newpassword);
     
    if(empty($newpassword) || empty($confirmpassword)){
        customassage("CREATEPASSWORD-MSG","text-danger","All fields are required","$baseUrl","create-password.php");
    }else if($newpassword == $confirmpassword){
        $update = update($conn,'users',array(
            'user_password' => "'$codedPassword'"
        ),'user_email',"'$EmailId'",'','');
        if($update){
            customassage("LOGIN-MSG","text-success","Password changed successfully","$baseUrl","login.php");
        }else{
            customassage("CREATEPASSWORD-MSG","text-danger","Password not changed try again","$baseUrl","create-password.php");
        }
    }else{
        customassage("CREATEPASSWORD-MSG","text-danger","Password not matched","$baseUrl","create-password.php");
    }

}


?>