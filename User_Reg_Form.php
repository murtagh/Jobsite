<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php

    require_once './Includes/process.php';

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
      </ul>
      <div id="intro">
        <h1>Consultants and Contracter Recruiting</h1>
        <p>Right Jobs. Right people. Right solutions.</p>
      </div>	

      <h2>Become a Member</h2>
      Fill in the necessary fields in the below form (Marked with *) to create an account<br/><br/>
      
      <?php userFeedback() ?>
      
      <div>
      <form name="UserRegForm" action="./process/processUserReg.php" method="POST" onsubmit="return checkUserRegForm(this)">   
            <table border="0" cellspacing="1">
              <thead><b>Login Details</b></thead>
              <tbody>
              <tr>
            <td>*Email:</td>
            <td><input type="text" name="useremail" maxlength="50" size="40"/></td>
              </tr>
              
            <tr>
            <td>*Password:</td>
            <td><input type="password" name="password1" maxlength="25" size="40"/></td>
            </tr>
            
              <tr>
            <td>*Please confirm your password:</td>
            <td><input type="password" name="password2" maxlength="25" size="40"/></td>
              </tr>
              </tbody>
            </table><br/>
        
            <table border="0" cellspacing="1">
              <thead><b>Personal Information</b></thead>
              <tbody>
              <tr>
            <td>*Full Name:</td>
            <td><input type="text" name="fullname" maxlength="50" size="40"/></td>
              </tr>
            <tr>
              <td>*Location:</td>
             <!--Start of counties dropdown list.--> 
                <td><select name="county">
                <option value="0">Select county</option>
                <option value="Abroad">Abroad</option>
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
                </select></td>
             <!-- End of dropdown list -->
            </tr>  
            <tr><td></td>
                <!-- javascript for make default text disappear got from
                http://www.web-source.net/javascript_disappearing_form_text.htm-->
                <td><input type="text" name="city" maxlength="50" value="Enter a city or town" size="40"
                onFocus="if(this.value == 'Enter a city or town'){this.value = '';}" onBlur="if (this.value == '') {this.value = 'Enter a city or town';}"/></td>
            </tr>  
            <tr>
            <td>*Job Title:</td>
            <td><input type="text" name="JobTitle" value="" maxlength="50"/></td>
            </tr>
            <tr>
              <td>*Availability:</td>
              <td><select name="availability">
                  <option>Select availability</option>
                  <option>Not currently contracted</option>
                  <option>Currently contracted</option>
                </select></td>
            </tr>
        <tr>
          <td>*Career Level:</td>
          <td><select name="CareerLevel">
              <option>Select career level</option>
              <option>Student/Graduate</option>
              <option>Entry Level</option>
              <option>Experienced (Non-Manager)</option>
              <option>Manager</option>
              <option>Executive</option>
              <option>Senior Executive</option>
            </select></td>
        </tr>
        <tr>
          <td>*Years of Professional Experience:</td>
          <td><select name="ExperienceYears">
              <option>Select years of professional experience</option>
              <option>Less than 1 year</option>
              <option>1+ years</option>
              <option>2+ years</option>
              <option>5+ years</option>
              <option>7+ years</option>
              <option>10+ years</option>
              <option>More than 15 years</option>
            </select></td>
        </tr>
        <tr>
          <td>*Current Education Level:</td>
          <td><select name="EducationLevel">
              <option>Select education level</option>
              <option>Secondary School</option>
              <option>Certificate</option>
              <option>Diploma</option>
              <option>Bachelors Degree</option>
              <option>Masters Degree</option>
              <option>Doctorate</option>
              <option>Professional</option>
            </select></td>
        </tr>
        <tr>
          <td>*Willing To Travel:</td>
          <td><select name="travel">
              <option>Please Select</option>
              <option>Yes</option>
              <option>No</option>
            </select></td>
        </tr>
        <tr>
          <td>*Willing To Relocate:</b</td>
          <td><select name="relocate">
              <option>Please Select</option>
              <option>Yes</option>
              <option>No</option>
            </select></td>
        </tr>                
        </tbody>
        </table><br/>
       
        <b>Your CV</b><br/>
        Please type your CV in the box below, or alternatively, do a "copy & paste" from your CV file<br/><br/>
        <table border="0" cellspacing="1">
          <tbody>
            <tr>
              <td><textarea name="CVtextarea" rows="25" cols="80"></textarea></td>
              <td></td>
            </tr>
          </tbody>
        </table>
        <input type="submit" value="Register" action=""/>
       </form>
       </div>   
            <p>&nbsp;</p>
           
      

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
  </body>
</html>