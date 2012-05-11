<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php

require './Includes/process.php';

$values = viewProfile();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<title></title>
</head>
<body>
	<div id="content">
		<div id="logo">
			<h1><a href="home.php">ContractWork.ie</a></h1>
		</div>
		<ul id="menu">
			<li><a href="home.php">Home</a></li>
			<li><a href="help.php">Help</a></li>
			<li><a href="contact.php">Contact</a></li>
      <li><a href="./process/processLogout.php">Log Out</a></li>
		</ul>

		<div id="intro">
			<h1>Consultants and Contracter Recruiting</h1>
			<p>Right Jobs. Right people. Right solutions.</p>
			<div id="login">
				<p><a href="Job_Search.php"><b>Contract Search</b></a> <a href="Forum.php"><b>User Forum</b></a></p>
			</div>
		</div>	
		
    
    <h2>My Profile <button type="button" name="EditProfile" onclick="location.href='EditProfile.php'">Edit</button></h2>
    
    
    <div id="left">
    <table border="0" cellspacing="1">
      <tbody>
        <tr>
          <td><b>Name:</b></td>
          <td><?php echo $values['Full_Name'];?></td>
        </tr>
        <tr>
          <td><b>Job Title:</b></td>
          <td><?php echo $values['JobTitle'];?></td>
        </tr>
        <tr>
          <td><b>Availability:</b></td>
          <td><?php echo $values['availability'];?></td>
        </tr>
        <tr>
          <td><b>Daily Rate (EUR):</b></td>
          <td><?php echo $values['Daily_Rate'];?></td>
        </tr>
        <tr>
          <td><b>Most Recent Employer:</b></td>
          <td><?php echo $values['RecentEmployer'];?></td>
        </tr>
        <tr>
          <td><b>Career Level:</b></td>
          <td><?php echo $values['Career_Level'];?></td>
        </tr>
        <tr>
          <td><b>Years of Professional Experience:</td>
          <td><?php echo $values['Experience'];?></td>
        </tr>
        <tr>
          <td><b>Current Education Level:</b></td>
          <td><?php echo $values['Education_Level'];?></td>
        </tr>
        <tr>
          <td><b>Willing To Travel:</b></td>
          <td><?php echo $values['WillingToTravel'];?></td>
        </tr>
        <tr>
          <td><b>Willing To Relocate:</b></td>
          <td><?php echo $values['WillingToRelocate'];?></td>
        </tr>
      </tbody>
    </table>
      <br/><p><b>Personal Statement:</b></p>
      <textarea name="PersonalStatement" rows="5" cols="100" disabled="disabled">
        <?php echo $values['Personal_Statement'];?>
      </textarea><br/><br/>
      
      <p><b>CV:</b></p>
      <textarea name="CV" rows="100" cols="100" disabled="disabled">
        <?php echo $values['CV'];?>
      </textarea><br/><br/>    
      
      <table border="1" cellpadding="1">
        <thead>
        </thead>
        <tbody>
          <tr>
            <td align="center" style="width:300px"><b>CV Name</b></td>
            <td align="center" style="width:90px"><b>View CV</b></td>
          </tr>
          <tr>
            <td></td>
            <td align="center"><a href="CVview.php" target="_blank">View</a></td>
          </tr>
        </tbody>
      </table>

      
    </div>
    
    <div id="right" style="border-left: none"">
    
    <table border="0" cellspacing="1">
      <tbody>
        <tr>
          <td><b>Email:</b></td>
          <td><?php echo $values['Email'];?></td>
        </tr>
        <tr>
          <td><b>Mobile:</b></td>
          <td><?php echo $values['Mobile'];?></td>
        </tr>
        <tr>
          <td><b>Secondary Number:</b></td>
          <td><?php echo $values['Secondary_Number'];?></td>
        </tr>
        <tr>
          <td><b>Location:</b></td>
          <td><?php echo $values['city'];?></td>
        </tr>
        <tr>
          <td></td>
          <td><?php echo $values['county'];?></td>
        </tr>
        <tr>
          <td><b>Contact Preference:</b></td>
          <td><?php echo $values['Contact_Pref'];?></td>
        </tr>
      </tbody>
    </table>
    </form>
    </div>
    
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