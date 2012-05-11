<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
			<li><a href="forum.php">Forum</a></li>
			<li><a href="help.php">Help</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
		<div id="intro">
			<h1>Consultants and Contracter Recruiting</h1>
			<p>Right Jobs. Right people. Right solutions.</p>
			<div id="login">
        <a href="CVSearch.php"><b>Candidate Search</b></a> <a href="PostJob.php"><b>Post Contract</b></a>
			</div>
		</div>	
		
    <h2>Company Profile 
    <button type="button" name="CancelcmpProfile" onclick="location.href='Employer_Profile.php'">Cancel</button>
    <input type="submit" value="Save" name="SaveProfile" />
    </h2>
    
       <form action="EditEmpProfile.php" method="POST">  
    *Email:<br/> <input type="text" name="email_employer" maxlength="50" size="70"/><br/>
    
    *Password:<br/> <input type="password" name="password_employer" maxlength="25" size="70"/><br/>
    
    *Company Name:<br/> <input type="text" name="Company_Name" maxlenght="100" size="70" /><br/>
    
    *Address:<br/>
    <input type="text" name="CompAddress1" value="Address 1" size="70" /><br/><br/>
    <input type="text" name="CompAddress2" value="Address 2" size="70" /><br/><br/>
    <input type="text" name="CityTown" value="Enter City or Town" size="70" /><br/><br/>
    <select name="CompCounty">
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
    </select><br/>
    
    *Contact Number:<br/><input type="text" name="CompanyTel" maxlenght="10" /><br/>
    
    *Company Description:<br/> <textarea name="Comp_Description" rows="10" cols="53">
    </textarea><br/>
    
    Upload Logo:<br/>
    <input type="file" name="LogoUpload" value="" size="" />
    <br/>
    
    <input type="submit" value="Save" name="SaveEmpProfile" /><br/><br/>
    </form>
    
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