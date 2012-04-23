<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php

require_once("Includes/DBfunctions.php");
$logonSuccess = false;



/** verify user's logon details
 * Calls the verify_logon_credentials function from the DBFunctions.php file
 * updates $logonSuccess variable to true if credentials are correct
 * and starts a user session
 */
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $logonSuccess = (jobsiteDB::getInstance()->verify_userlogon_credentials($_POST['useremail'], $_POST['userpassword']));
    if ($logonSuccess == true) {
        session_start();
        $_SESSION['useremail'] = $_POST['useremail'];
        header('Location: userprofile.php');
        exit;
    }
}
?>
<html>
    <head>
        <link href="main.css" type="text/css" rel="stylesheet" media="all"
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>User Login Page</title>
    </head>
    <body style="margin: 0">    
    <div id="Ulogin">
    <form name="userlogon" action="loginpage.php" method="POST">
        <fieldset style='border: 2px solid #000000'>
        <legend>User Login</legend>
        Email Address:<br/><input type="text" name="useremail" value="" maxlength="50"/><br/>
        Password:<br/><input type="password" name="userpassword" value="" maxlenght="25"/><br/>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            if (!$logonSuccess)
          echo "Invalid name and/or password";
        }
        ?>
        <input type="submit" name="Button" 
            style='margin-left: 45%; margin-bottom: .5em'
            value="Sign In" />
        <p style='text-align: center; margin: 1em'>
        Don't have an account yet?</p>
        <p style='text-align: center; margin: 1em'>
        <a href="User_Reg_Form.php">Create one now</a></p>
        </fieldset> 
    </form>
    </div>
        
    <div id="Clogin">
       <form name="custlogon" action="loginpage.php" method="POST">
      <fieldset style='border: 2px solid #000000'>
      <legend>Company Login</legend>
        Email Address:<br/><input type="text" name="custemail" value="" maxlength="50"/><br/>
        Password:<br/><input type="password" name="custpassword" value="" maxlenght="25"/><br/>
          <input type="submit" name="Button" 
          style='margin-left: 45%; margin-bottom: .5em'
          value="Sign In">        
        <p style='text-align: center; margin: 1em'>
        Don't have an account yet?</p>
        <p style='text-align: center; margin: 1em'>
        <a href="Company_Reg_Form.php">Create one now</a></p>
      </fieldset>
      </form>  
    </div>
        
    </body>
</html>
