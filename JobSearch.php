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
            <a href="SavedSearch.php"><b>Saved Searches</b></a>
            <a href="SavedJobs.php"><b>Saved Jobs</b></a>
            <a href="Forum.php"><b>User Forum</b></a>
			</div>
		</div>	
		
    <h2>Search for Contracts...</h2><br/>
    
    <div id="left">
    <form name="JobSearch" id="JobSearch" method="GET" action="JobSearch.php">
      <b>Keywords</b>:<input type="text" name="Keywords" value="" size="50" />
      <br/><br/>
      <b>Job Category</b><br/>
      <select name="SearchJobCategory[]" size="5" multiple="multiple">
              <option value="accounting and finance">Accounting and Finance</option>
              <option value="administrative and clerical">Administrative and Clerical</option>
              <option value="business and strategic management">Business and Strategic Management</option>
              <option value="construction">Construction</option>
              <option value="creative and design">Creative and Design</option>
              <option value="customer cupport and client care">Customer Support and Client Care</option>
              <option value="editorial and writing">Editorial and Writing</option>
              <option value="engineering">Engineering</option>
              <option value="Human Resources">Human Resources</option>
              <option value="installation, maintenance, and repair">Installation, Maintenance, and Repair</option>
              <option value="it and software development">IT and Software Development</option>
              <option value="legal">Legal</option>
              <option value="logistics and transportation">Logistics and Transportation</option>
              <option value="marketing/public relations">Marketing/Public Relations</option>
              <option value="other">Other</option>
              <option value="production and operations">Production and Operations</option>
              <option value="project and program management">Project and Program Management</option>
              <option value="quality assurance and safety">Quality Assurance and Safety</option>
              <option value="r&d and science">R&D and Science</option>
              <option value="sales and business development">Sales and Business Development</option>
              <option value="security and protective services">Security and Protective Services</option>
              <option value="training and i nstruction">Training and Instruction</option>
            </select><br/><br/>
            
            <select name="SearchCounty[]" size="5" multiple="multiple">
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
                
        <b>Contract Length</b><br/>
        <select name="SearchContractLength"><br/>
          <option>Any Length</option>
          <option>6 months or less</option>
          <option>1 year</option>
          <option>18 months</option>
          <option>2 years or more</option>
        </select><br/><br/>
                
        <b>Contract Posted</b><br/>
        <select name="SearchContractPosted">
          <option>Any Date</option>
          <option>Today</option>
          <option>Yesterday</option>
          <option>Last 3 days</option>
          <option>Last 7 days</option>
          <option>Last 30 days</option>
        </select><br/><br/>
        
        <b>Career Level</b><br/>
        <select name="SearchCareerLevel">
              <option>Select career level</option>
              <option>Student/Graduate</option>
              <option>Entry Level</option>
              <option>Experienced (Non-Manager)</option>
              <option>Manager</option>
              <option>Executive</option>
              <option>Senior Executive</option>
        </select><br/><br/>
        
        <b>Education Level</b><br/>
        <select name="SearchEducationLevel">
              <option>Select education level</option>
              <option>Secondary School</option>
              <option>Certificate</option>
              <option>Diploma</option>
              <option>Bachelor's Degree</option>
              <option>Master's Degree</option>
              <option>Doctorate</option>
              <option>Professional</option>
        </select><br/><br/>
        
        <b>Year of Experience</b><br/>
        <select name="SearchExperienceYears">
              <option>Select years of professional experience</option>
              <option>Less than 1 year</option>
              <option>1+ years</option>
              <option>2+ years</option>
              <option>5+ years</option>
              <option>7+ years</option>
              <option>10+ years</option>
              <option>More than 15 years</option>
         </select
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