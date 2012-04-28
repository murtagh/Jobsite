<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php

    require_once("Includes/DBfunctions.php");
    
    /** variables assigned with values */
    $userEmailIsUnique = true;
    $passwordIsValid = true;				
    $emailIsEmpty = false;					
    $passwordIsEmpty = false;				
    $password2IsEmpty = false;
    $firstnameIsEmpty = false;
    $lastnameIsEmpty = false;
    $cityIsEmpty = false;
    $cityIsDefault = false;
            
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["email"]=="" && $_POST["firstname"]=="" && $_POST["lastname"]=="" 
                && $_POST["city"]=="" && $_POST["city"]=="Enter a city or town") {
            $emailIsEmpty = true;
            $firstnameIsEmpty = true;
            $lastnameIsEmpty = true;
            $cityIsEmpty = true;
            $cityIsDefault = true;
    }
        /** creates an instance of the jobsiteDB class and calls the
    * get_user_id_by_email function within the jobsiteDB class 
    * if statement is used to check if Email entered is not unique */
    $userID = jobsiteDB::getInstance()->get_user_id_by_email($_POST["email"]);
        if ($userID) {
            $userEmailIsUnique = False;
        }
    
    /** check whether password and confirm passwrods fields are not empty
    * Also check if both fileds match */
    if ($_POST["password"]=="")
    $passwordIsEmpty = true;
    if ($_POST["password2"]=="")
    $password2IsEmpty = true;
    if ($_POST["password"]!=$_POST["password2"]) {
    $passwordIsValid = false;} 

     /** checks whether data entered in the form was correct
      * if data is validated Ok then, then it is added as new entry to the database
      * user is then re-directed to their new user profile page
      */
        if (!$emailIsEmpty && $userEmailIsUnique && !$passwordIsEmpty && !$password2IsEmpty && $passwordIsValid
            && !$firstnameIsEmpty && !$lastnameIsEmpty && !$cityIsEmpty && !$cityIsDefault) {
        jobsiteDB::getInstance()->create_user($_POST["email"], $_POST["password"], $_POST["firstname"],$_POST["lastname"],
                $_POST["country"], $_POST["city"], $_POST["county"]);
            session_start();
        $_SESSION['email'] = $_POST['email'];
        header('Location: userprofile.php' );
        exit;
    
   }
   }
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

      <h2>Become a Member</h2>
          <form action="User_Reg_Form.php" method="POST">
            Fill in the necessary fields in the below form (Marked with *) to create an account<br/><br/>
            
            *Email:<br/> <input type="text" name="email" maxlength="50" size="70"/><br/>
            <?php
                if ($emailIsEmpty) {
                echo ("<b>Enter an email address, please!</b>");
                echo ("<br/>");
            }    
                if (!$userEmailIsUnique) {
                echo ("<b>This email already exists. Please choose another email</b>");
                echo ("<br/>");
            }
            ?>
            
            *Password:<br/> <input type="password" name="password" maxlength="25" size="70"/><br/>
            <?php
                if ($passwordIsEmpty) {
                echo ("<b>Enter a password, please!</b>");
                echo ("<br/>");
            }   
            ?>
            
            *Please confirm your password:<br/> <input type="password" name="password2" maxlength="25" size="70"/><br/>
            <?php
                if ($password2IsEmpty) {
                echo ("<b>Please confirm you password!</b>");
                echo ("<br/>");
            }  
                if (!$password2IsEmpty && !$passwordIsValid) {
                echo  ("<b>The passwords do not match!</b>");
                echo ("<br/>");  
            }  
            ?>
            
            *First Name:<br/> <input type="text" name="firstname" maxlength="50" size="70"/><br/>
            <?php
                if ($firstnameIsEmpty) {
                echo ("<b>Enter yout first name, please!</b>");
                echo ("<br/>");
            }                
            ?>
            
            *Last Name:<br/> <input type="text" name="lastname" maxlength="50" size="70"/><br/>
            <?php
                if ($lastnameIsEmpty) {
                echo ("<b>Enter yout last name, please!</b>");
                echo ("<br/>");
            }                
            ?>
            *Location:<br/>
                <!--Start of country dropdown list. List retrieved from http://snipplr.com/view/4792/ -->
                <select name ="country">
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Colombia">Colombia</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-Bissau">Guinea-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option selected="selected" value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia">Micronesia</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="North Korea">North Korea</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Korea, Republic of">South Korea</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
                </select><br/>
                <!-- End of dropdown list -->
                 
                <!-- javascript for make default text disappear got from
                http://www.web-source.net/javascript_disappearing_form_text.htm-->
                <input type="text" name="city" maxlength="50" value="Enter a city or town" size="40"
                onFocus="if(this.value == 'Enter a city or town'){this.value = '';}" onBlur="if (this.value == '') {this.value = 'Enter a city or town';}"/><br/>
           <?php
                if ($cityIsEmpty) {
                echo ("<b>Enter a city, please!</b>");
                echo ("<br/>");
            } 
                if ($cityIsDefault) {
                echo ("<b>Enter a city, please!</b>");
                echo ("<br/>");
                }
            ?>
                
                <!--Start of counties dropdown list.--> 
                <select name="county" size="70">
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
                <!-- End of dropdown list -->
                
            <input type="submit" value="Register" />
           
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
  </body>
</html>