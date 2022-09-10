<?php 
 require_once("header.inc.php");
 if(isset($_SESSION['LOGIN_EMAIL'])){
    header("location:$baseUrl/");
    die();
}
?>

<div class="RegistrationContainer">
    <aside class="sidebar1"></aside>
    
    <section class="userForm">
        <form action="user-functions.php" method="POST" class="mainForm" >
            <span class="FormHeading">Create new password</span>
            <div class="InputGroup">
                <input type="password" name="newpassword" placeholder="Create new password" autocomplete="off">
            </div>
            <div class="InputGroup">
                <input type="password" name="confirmpassword" placeholder="Confirm password" autocomplete="off">
            </div>
            <button type="submit" class="actionSendButton" name="createPasswrod"><img src="icons\send_white_24dp.svg" alt=""> <span> Reset</span></button>
            <div class="externalLInks">
                <div class="InputGroup textLinks">
                    <span class="text" id="loginText"><a href="registration.php">Create account</a></span>
                    <a href="login.php">Login account</a>
                </div>
            </div>
            <div class="errormsg">
                <?php 
                  if(isset($_SESSION['CREATEPASSWORD-MSG'])){
                      echo $_SESSION['CREATEPASSWORD-MSG'];
                  }
                ?>
            </div>
        </form>
    </section>

    <aside class="sidebar2"></aside>
    <?php require_once("footer.inc.php"); ?>