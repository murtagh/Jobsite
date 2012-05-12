<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php

    require_once './Includes/process.php';

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
		</ul>
    
		<div id="intro">
			<h1>Consultants and Contracter Recruiting</h1>
			<p>Right Jobs. Right people. Right solutions.</p>

		</div>
    
    <h2>Become a Member</h2>
    Fill in the necessary fields in the below form (Marked with *) to create an account<br/><br/>
    
    <?php userFeedback() ?>
    
    <div>
    <form action="./process/processEmpReg.php" enctype="multipart/form-data" method="POST" onsubmit="return checkEmpRegForm(this)">
        
    *Email:<br/> <input type="text" name="email_employer" maxlength="50" size="70"/><br/>
    
    *Password:<br/> <input type="password" name="password_employer" maxlength="25" size="70"/><br/>
    
    *Please confirm your password:<br/> <input type="password" name="password_employer2" maxlength="25" size="70"/><br/>

    *Company Name:<br/> <input type="text" name="Company_Name" maxlenght="100" size="70" /><br/>
    
    *Address 1:<br/> <input type="text" name="CompAddress1" value="Address 1" size="70" onFocus="if(this.value == 'Address 1'){this.value = '';}" onBlur="if (this.value == '') {this.value = 'Address 1';}"/><br/><br/>
    
    Address 2: <br/><input type="text" name="CompAddress2" size="70"/><br/><br/>
    
    *City/Town: <br/><input type="text" name="CityTown" value="Enter City or Town" size="70" onFocus="if(this.value == 'Enter City or Town'){this.value = '';}" onBlur="if (this.value == '') {this.value = 'Enter City or Town';}"/><br/><br/>
    
    *County: <select name="CompCounty">
                <option value="0">Select county</option>
                <option value="Carlow">Carlow</option>
                <option value="Cavan">Cavan</option>
                <option value="Clare">Clare</option>
                <option value="Cork">Cork</option>
                <option value="Donegal">Donegal</option>
                <option value="Dublin">Dublin</option>
                <option value="Galway">Galway</option>
                <option value="Kerry">Kerry</option>
                <option value="Kildare">Kildare</option>
                <option value="Kilkenny">Kilkenny</option>
                <option value="Laois">Laois</option>
                <option value="Leitrim">Leitrim</option>
                <option value="Limerick">Limerick</option>
                <option value="Longford">Longford</option>
                <option value="Louth">Louth</option>
                <option value="Mayo">Mayo</option>
                <option value="Meath">Meath</option>
                <option value="Monaghan">Monaghan</option>
                <option value="Northern Ireland">Northern Ireland</option>
                <option value="Offaly">Offaly</option>
                <option value="Roscommon">Roscommon</option>
                <option value="Sligo">Sligo</option>
                <option value="Tipperary">Tipperary</option>
                <option value="Waterford">Waterford</option>
                <option value="Westmeath">Westmeath</option>
                <option value="Wexford">Wexford</option>
                <option value="Wicklow">Wicklow</option>
    </select><br/><br/>
    
    *Contact Number:<br/><input type="text" name="CompanyTel" maxlenght="10" /><br/><br/>
    
    *Company Description:<br/> <textarea name="Comp_Description" rows="10" cols="53">
    </textarea><br/><br/>
    
    Upload Logo:<br/>
    <input type="file" name="LogoUpload" value="" size="" />
    <br/>
    
    <input type="submit" value="Register" name="Register" /><br/><br/>
    </form>
		</div>
    
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