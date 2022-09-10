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
        <form action="user-functions.php" method="POST" class="mainForm" id="registerForm">
                <span class="FormHeading">New Registration</span>
                <div class="InputGroup">
                    <input type="text" name="Fname" placeholder="First Name" autocomplete="off">
                </div>
                <div class="InputGroup">
                    <input type="text" name="Lname" placeholder="Last Name" autocomplete="off">
                </div>
                <div class="InputGroup">
                    <input type="email" name="EmailId" placeholder="Email Address" autocomplete="off">
                </div>
                <div class="InputGroup">
                    <input type="password" name="Password" placeholder="New Password" autocomplete="off">
                </div>
                <button type="submit" class="actionSendButton" name="signupBtn"><img src="icons\send_white_24dp.svg" alt=""> <span> Submit</span></button>
                <div class="externalLInks">
                    <div class="InputGroup textLinks">
                        <span class="text">Already have an account <a href="login.php" style="margin-left: 10px;"> Login</a></span>
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