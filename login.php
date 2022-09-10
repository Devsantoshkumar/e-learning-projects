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
            <span class="FormHeading">Login</span>
            <div class="InputGroup">
                <input type="email" name="EmailId" placeholder="Email Address" autocomplete="off">
            </div>
            <div class="InputGroup">
                <input type="password" name="password" placeholder="Password" autocomplete="off">
            </div>
            <button type="submit" class="actionSendButton" name="LoginUser"><img src="icons\send_white_24dp.svg" alt=""> <span> Login</span></button>
            <div class="externalLInks">
                <div class="InputGroup textLinks">
                    <span class="text" id="loginText"><a href="registration.php">Create account</a></span>
                    <a href="forget-password.php">Forget Password</a>
                </div>
            </div>
            <div class="errormsg">
                <?php 
                  if(isset($_SESSION['LOGIN-MSG'])){
                      echo $_SESSION['LOGIN-MSG'];
                  }
                ?>
                </div>
        </form>
    </section>

    <aside class="sidebar2"></aside>
    
    <?php require_once("footer.inc.php"); ?>