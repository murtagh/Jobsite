<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php

    require_once './Includes/process.php';
    
    $values = viewEmpProfile();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
  <script src="./Includes/FormChecks.js"></script>
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
			<h1>Consultants and Contracter Recruiting</h1>
			<p>Right Jobs. Right people. Right solutions.</p>
			<div id="login">
        <a href="CVSearch.php"><b>Candidate Search</b></a> <a href="PostJob.php"><b>Post Contract</b></a>
			</div>
		</div>	
    
    <?php    userFeedback(); ?>
    
    <div>
    <form name="editEmpProf" enctype="multipart/form-data" method="POST" action="./process/processUpdateEmpProf.php" onsubmit="return checkEditEmpProfile(this)">
      
    <h2>Company Profile 
    <button type="button" name="CancelcmpProfile" onclick="location.href='Employer_Profile.php'">Cancel</button>
    <input type="submit" value="Save" name="SaveProfile"/>
    </h2>
    
    *Company Name:<br/> <input type="text" name="Company_Name" maxlength="100" size="70" value="<?php echo $values['Company_Name'];?>"/><br/><br/>
    
    *Address:<br/>
    <input type="text" name="CompAddress1" size="70" value="<?php echo $values['Address1'];?>"/><br/><br/>
    <input type="text" name="CompAddress2" size="70" value="<?php echo $values['Address2'];?>"/><br/><br/>
    <input type="text" name="CityTown" size="70" value="<?php echo $values['City'];?>"/><br/><br/>
    <select name="CompCounty">
               <?php
              $countyoptions = array("Carlow","Cavan","Clare","Cork","Donegal","Dublin","Galway","Kerry","Kildare","Kilkenny","Laois","Leitrim","Limerick","Longford","Louth","Mayo","Meath","Monaghan","Northern Ireland","Offaly","Roscommon","Sligo","Tipperary","Waterford","Westmeath","Wexford","Wicklow");
              $dbcountyvalue = $values['County'];
              
              foreach ($countyoptions as $county) {
                if($county == $dbcountyvalue) {
                  echo "<option value=\"$county\" SELECTED>$county</option>";
                } else {
                    echo "<option value=\"$county\">$county</option>";
                }
               }
             ?>
    </select><br/><br/>
    
    *Contact Number: <input type="text" name="CompanyTel" maxlenght="10" value="<?php echo $values['Contact_Number'];?>"/><br/><br/>
    
    *Company Description:<br/> <textarea name="Comp_Description" rows="10" cols="53"><?php echo $values['Company_Desc'];?>"
    </textarea><br/><br/>
    
    Upload Logo:<br/>
    <input type="file" name="LogoUpload" value="" size="" />
    <br/>
    </form>
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