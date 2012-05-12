<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php

require_once './Includes/process.php';

$values = viewProfile();

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
      <li><a href="./process/processLogout.php">Log Out</a></li>
		</ul>
		<div id="intro">
			<h1>Consultants and Contracter Recruiting</h1>
			<p>Right Jobs. Right people. Right solutions.</p>
			<div id="login">
				<p><a href="JobSearch.php"><b>Contract Search</b></a> <a href="UserForum.php"><b>User Forum</b></a></p>
			</div>
		</div>	
		
    <?php    userFeedback(); ?>

    <div>
    <form name="EditProfile" enctype="multipart/form-data" method="POST" action="./process/processUpdateProf.php" onsubmit="return checkEditProfile(this)">
    <h2>My Profile 
      <button type="button" name="CancelProfile" onclick="location.href='User_Profile.php'">Cancel</button>
      <input type="submit" value="Save" name="SaveProfile"/>
    </h2>
    
    <!--http://corpocrat.com/2009/05/25/retrieve-select-box-value-from-database-using-php/
        Above referenced for retrieving database values for select boxes-->
    <div id="left">
            <table border="0" cellspacing="1">
      <tbody>
        <tr>
          <td><b>Name:</b></td>
          <td><input type="text" name="Name" value="<?php echo $values['Full_Name'];?>" maxlength="50"/></td>
        </tr>
        <tr>
          <td><b>Job Title:</b></td>
          <td><input type="text" name="JobTitle" value="<?php echo $values['JobTitle'];?>" maxlength="50"/></td>
        </tr>
        <tr>
          <td><b>Availability:</b></td>
          <td><select name="availability">
             <?php
              $avoptions = array("Not currently contracted","Currently contracted");
              $dbavvalue = $values['availability'];
              
              foreach ($avoptions as $availability) {
                if($availability == $dbavvalue) {
                  echo "<option value=\"$availability\" SELECTED>$availability</option>";
                } else {
                    echo "<option value=\"$availability\">$availability</option>";
                }
                }
             ?>
            </select></td>
        </tr>
        <tr>
          <td><b>Expected Daily Rate (EUR):</b></td>
          <td><input type="text" name="DailyRate" value="<?php echo $values['Daily_Rate'];?>" maxlenght="11" /></td>
        </tr>
        <tr>
          <td><b>Most Recent Employer:</b></td>
          <td><input type="text" name="RecentEmployer" value="<?php echo $values['RecentEmployer'];?>" maxlenght="100"/></td>
        </tr>
        <tr>
          <td><b>Career Level:</b></td>
          <td><select name="CareerLevel">
             <?php
              $CLoptions = array("Student/Graduate","Experienced (Non-Manager)","Manager","Executive","Senior Executive");
              $dbCLvalue = $values['Career_Level'];
              
              foreach ($CLoptions as $CareerLevel) {
                if($CareerLevel == $dbCLvalue) {
                  echo "<option value=\"$CareerLevel\" SELECTED>$CareerLevel</option>";
                } else {
                    echo "<option value=\"$CareerLevel\">$CareerLevel</option>";
                }
                }
             ?>            
            </select></td>
        </tr>
        <tr>
          <td><b>Years of Professional Experience:</td>
          <td><select name="ExperienceYears">
             <?php
              $EXoptions = array("Less than 1 year","1+ years","2+ years","5+ years","7+ years","10+ years","More than 15 years");
              $dbEXvalue = $values['Experience'];
              
              foreach ($EXoptions as $Experience) {
                if($Experience == $dbEXvalue) {
                  echo "<option value=\"$Experience\" SELECTED>$Experience</option>";
                } else {
                    echo "<option value=\"$Experience\">$Experience</option>";
                }
                }
             ?> 
            </select></td>
        </tr>
        <tr>
          <td><b>Current Education Level:</b></td>
          <td><select name="EducationLevel">
             <?php
              $ELoptions = array("Secondary School","Certificate","Diploma","Bachelors Degree","Masters Degree","Doctorate","Professional");
              $dbELvalue = $values['Education_Level'];
              
              foreach ($ELoptions as $EducationLevel) {
                if($EducationLevel == $dbELvalue) {
                  echo "<option value=\"$EducationLevel\" SELECTED>$EducationLevel</option>";
                } else {
                    echo "<option value=\"$EducationLevel\">$EducationLevel</option>";
                }
               }
             ?> 
            </select></td>
        </tr>
        <tr>
          <td><b>Willing To Travel:</b></td>
          <td><select name="travel">
             <?php
              $traveloptions = array("Yes","No");
              $dbtravelvalue = $values['WillingToTravel'];
              
              foreach ($traveloptions as $travel) {
                if($travel == $dbtravelvalue) {
                  echo "<option value=\"$travel\" SELECTED>$travel</option>";
                } else {
                    echo "<option value=\"$travel\">$travel</option>";
                }
               }
             ?> 
            </select></td>
        </tr>
        <tr>
          <td><b>Willing To Relocate:</b></td>
          <td><select name="relocate">
             <?php
              $relocateoptions = array("Yes","No");
              $dbrelocatevalue = $values['WillingToRelocate'];
              
              foreach ($relocateoptions as $relocate) {
                if($relocate == $dbrelocatevalue) {
                  echo "<option value=\"$relocate\" SELECTED>$relocate</option>";
                } else {
                    echo "<option value=\"$relocate\">$relocate</option>";
                }
               }
             ?> 
            </select></td>
        </tr>
      </tbody>
    </table>
    </div>
		
		<div id="right" style="border-left: none">
    <table border="0" cellspacing="1">
      <tbody>
        <tr>
          <td><b>Mobile:</b></td>
          <td><input type="text" name="mobile" value="<?php echo $values['Mobile'];?>"/></td>
        </tr>
        <tr>
          <td><b>Secondary Number:</b></td>
          <td><input type="text" name="SecNum" value="<?php echo $values['Secondary_Number'];?>"/></td>
        </tr>
        <tr>
          <td><b>Location:</b></td>
          <td><input type="text" name="Town" value="<?php echo $values['city'];?>"/></td>
        </tr>
        <tr>
          <td></td>
          <td><select name="county">
             <?php
              $countyoptions = array("Abroad","Carlow","Cavan","Clare","Cork","Donegal","Dublin","Galway","Kerry","Kildare","Kilkenny","Laois","Leitrim","Limerick","Longford","Louth","Mayo","Meath","Monaghan","Northern Ireland","Offaly","Roscommon","Sligo","Tipperary","Waterford","Westmeath","Wexford","Wicklow");
              $dbcountyvalue = $values['county'];
              
              foreach ($countyoptions as $county) {
                if($county == $dbcountyvalue) {
                  echo "<option value=\"$county\" SELECTED>$county</option>";
                } else {
                    echo "<option value=\"$county\">$county</option>";
                }
               }
             ?> 
                </select></td>
        </tr>
        <tr>
          <td><b>Contact Preference:</b></td>
          <td><select name="ContactPref">
             <?php
              $CPoptions = array("Email","Mobile","Telephone");
              $dbCPvalue = $values['Contact_Pref'];
              
              foreach ($CPoptions as $ContactPref) {
                if($ContactPref == $dbCPvalue) {
                  echo "<option value=\"$ContactPref\" SELECTED>$ContactPref</option>";
                } else {
                    echo "<option value=\"$ContactPref\">$ContactPref</option>";
                }
               }
             ?>               
            </select></td>
        </tr>
      </tbody>
    </table>
		</div>
     
    <div style="clear: both"></div>
    
    <div> 
      <p><b>Personal Statement:</b> Please give a brief description of your main skills, experience, key achievements in this section</p>
      <textarea name="PersonalStatement" rows="5" cols="100"><?php echo $values['Personal_Statement'];?>
      </textarea><br/><br/>
      
      <p><b>CV:</b></p>
      <textarea name="CV" rows="100" cols="100"><?php echo $values['CV'];?>
      </textarea><br/><br/> 
      
      <p><b>Upload New CV</b></p>
      <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
      <p>Browse to upload your CV <input type="file" name="CVupload" value="" />(your CV should not exceed 2MB) </p>
      </div><br/>
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