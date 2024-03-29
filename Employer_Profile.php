<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php

    require './Includes/process.php';
    
    $empvalues = viewEmpProfile();
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
      <li><a href="./process/processLogout.php">Logout</a></li>
      
		</ul>
		<div id="intro">
			<h1>Consultants and Contractor Recruiting</h1>
			<p>Right Jobs. Right people. Right solutions.</p>
			<div id="login">
        <a href="CVSearch.php"><b>Candidate Search</b></a> <a href="PostJob.php"><b>Post Contract</b></a>
			</div>
		</div>	
		
    <h2>Company Profile <button type="button" name="EditEmpProfile" onclick="location.href='EditEmpProfile.php'">Edit</button></h2>
    
    <!--Company Logo-->
		<div id="left" style="width: 30000px">
      
		</div>
	
    <!--Company Details-->
		<div id="right" style="width: 500px">
      <table border="0">
        <thead>
        </thead>
        <tbody>
          <tr>
            <td><b>Company Name:</b></td>
            <td><?php echo $empvalues['Company_Name'];?></td>
          </tr>
          <tr>
            <td><b>Address:</b></td>
            <td><?php echo $empvalues['Address1'];?></td>
          </tr>
          <tr>
            <td></td>
            <td><?php echo $empvalues['Address2'];?></td>
          </tr>
          <tr>
            <td></td>
            <td><?php echo $empvalues['City'];?></td>
          </tr>
          <tr>
            <td></td>
            <td><?php echo $empvalues['County'];?></td>
          </tr>
          <tr>
            <td><b>Email:</b></td>
            <td><?php echo $empvalues['Email'];?></td>
          </tr>
          <tr>
            <td><b>Contact Number:</b></td>
            <td><?php echo $empvalues['Contact_Number'];?></td>
          </tr>
        </tbody>
      </table>

    <div style="clear: both"></div>

		</div>
    
    <!--Company Description-->
    <div id="compdesc">
      <textarea name="compdesc" rows="20" cols="110" disabled="disabled"><?php echo $empvalues['Company_Desc'];?>
      </textarea>
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