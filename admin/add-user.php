<?php require_once("header.inc.php"); ?>

<div class="adminWrapper">

<?php require_once("sidebar.inc.php"); ?>

    <section class="adminSection">
        <div class="pageTitle"><span>Add New User</span><a href="dashboard.php">Users</a></div>
        <form action="insert.php" method="POST" class="adminForm">
            <div class="adminInputGroup">
                <input type="text" name="fname" placeholder="First name">
            </div>
            <div class="adminInputGroup">
                <input type="text" name="lname" placeholder="Last name">
            </div>
            <div class="adminInputGroup">
                <input type="email" name="email" placeholder="Email Address">
            </div>
            <div class="adminInputGroup">
                <input type="password" name="password" placeholder="New Password">
            </div>
            <div class="adminInputGroup">
                <select name="role">
                    <option value="1">Admin</option>
                    <option value="0">Normal</option>
                </select>
            </div>
            <button type="submit" class="adminSendButton" name="addUser"><img src="../icons\send_white_24dp.svg" alt=""> <span> Add User</span></button>
            <?php 
             
             if(isset($_SESSION['USER-MSG'])){
                 echo $_SESSION['USER-MSG'];
             }
            
            ?>
        </form>
    </section>

    <?php require_once("footer.inc.php"); ?>