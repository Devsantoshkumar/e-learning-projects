<?php 
 require_once("header.inc.php");
?>

<div class="RegistrationContainer">

    <aside class="sidebar1"></aside>
 
    <section class="userForm">
        <form action="user-functions.php" method="POST" class="mainForm" >
            <span class="FormHeading">Enter OTP</span>
            <div class="InputGroup">
                <input type="text" name="EmailOTPForm" placeholder="Enter 6 digit OTP" autocomplete="off">
            </div>
            <button type="submit" class="actionSendButton" name="emailVerify"><img src="icons\send_white_24dp.svg" alt=""> <span> Verify</span></button>
            <div class="externalLInks">
                <div class="InputGroup textLinks">
                    <span class="text" id="loginText"><a href="registration.php">Create account</a></span>
                </div>
            </div>
            <div class="errormsg">
                <?php 
                  if(isset($_SESSION['REG-MSG'])){
                      echo $_SESSION['REG-MSG'];
                  }
                ?>
                </div>
        </form>
    </section>

    <aside class="sidebar2"></aside>


    <?php require_once("footer.inc.php"); ?>