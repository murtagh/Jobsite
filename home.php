<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<title>Home</title>
</head>
<body>
	<div id="content">
		<div id="logo">
			<h1><a href="home.php">ContractWork.ie</a></h1>
		</div>
		<ul id="menu">
			<li><a href="home.php">Home</a></li>
			<li><a href="forum.php">Forum</a></li>
			<li><a href="help.php">Help</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
		<div id="intro">
			<h1>Consultants and Contracter Recruiting</h1>
			<p>Right Jobs. Right people. Right solutions.</p>
			<div id="login">
				<p><a href="User_Reg_Form.php">Jobseekers</a> <a href="Employer_Reg_Form.php">Employers</a></p>
			</div>
		</div>	
		<div id="left">
			<h2>What do we do exactly?</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
			
			<ul id="leftmenu">
				<li>Complete project outsorcing</li>
				<li>Documentation outsorcing</li>
				<li>Support outsorcing</li>
			</ul>		
		</div>
	
		<div id="right">
			<h2>Jobseekers Sign In</h2>
			<form name="userlogon" method="post" action="home.php">
              Email Address:<br/><input type="text" name="useremail" value="" maxlength="50"/><br/>
        			Password:<br/><input type="password" name="userpassword" value="" maxlenght="25"/><br/>
              <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                if (!$logonSuccess)
                echo "Invalid email and/or password";
                }
              ?>
              <input type="submit" name="Button" style='margin-left: 45%; margin-bottom: .5em' value="Sign In" />
              <p style='text-align: center; margin: 1em'>
        				Don't have an account yet?</p>
       				<p style='text-align: center; margin: 1em'>
       				<a href="User_Reg_Form.php">Create one now</a></p>
          </form>
      
			<p style="border-bottom: 1px solid #ccc; padding: 0 0 8px"></p>
      
      <h2>Employers Sign In</h2>
      <form action="home.php" method="post" name="employlogon">
              Email Address:<br/><input type="text" name="employemail" value="" maxlength="50"/><br/>
              Password:<br/><input type="password" name="employpassword" value="" maxlenght="25"/><br/>
              <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                if (!$logonSuccess)
                echo "Invalid email and/or password";
                }
                ?>
          			<input type="submit" name="Button" style='margin-left: 45%; margin-bottom: .5em' value="Sign In"/>        
        			<p style='text-align: center; margin: 1em'>
       					 Don't have an account yet?</p>
       			 	<p style='text-align: center; margin: 1em'>
        			<a href="Employer_Reg_Form.php">Create one now</a></p>
            </form>
			<div style="clear: both"></div>
		</div>
			
		<div id="footer">
			<div id="col1">
				<p>&nbsp;</p>
		  </div>
			<div id="col2">
				<p>&nbsp;</p>
		  </div>
			<div id="col3">
				<p>&nbsp;</p>
		  </div>
		</div>	
	</div>
</body>
</html>