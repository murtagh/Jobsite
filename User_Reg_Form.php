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
    $countryIsEmpty = false;
    $cityIsEmpty = false;
            
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["user"]=="") {
            $emailIsEmpty = true;
    }
    
    /** check whether password and confirm passwrods fields are not empty */
    /** Also check if both fileds match */
    if ($_POST["password"]=="")
    $passwordIsEmpty = true;
    if ($_POST["password2"]=="")
    $password2IsEmpty = true;
    if ($_POST["password"]!=$_POST["password2"]) {
    $passwordIsValid = false;} 

    /** creates an instance of the jobsiteDB class and calls the create_user */
    /** function within the jobsiteDB class */
    /** if statement is used to check if Email entered is not unique */
    $userID = jobsiteDB::getInstance()->create_user($_POST["email"]);
        if ($userId) {
            $emailIsUnique = False;
        }
        
        
        if (!$emailIsEmpty && $emailIsUnique && !$passwordIsEmpty && !$password2IsEmpty && $passwordIsValid
            && !$firstnameIsEmpty && !$lastnameIsEmpty && !$countryIsEmpty && !$cityIsEmpty) {
        jobsiteDB::getInstance()->create_user($_POST["email"], $_POST["password"], $_POST["firstname"],$_POST["lastanmename"],
                $_POST["country"], $_POST["city"], $_POST["county"]);
    header('Location: editWishList.php' );
    exit;
    
   }
   }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link href="main.css" type="text/css" rel="stylesheet" media="all"
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>User Registration Page</title>
    </head>
    <body style="margin: 0">
        <h1>Create an Account</h1>
        <div id="Ulogin">
        <form action="User_Reg_Form.php" method="POST">
            <fieldset style='border: 2px solid #000000' style='width: 50%'>
            Fill in the necessary fields in the below form (Marked with *) to create an account<br/><br/>
            *Email:<br/> <input type="text" name="email"/><br/>
            *Password:<br/> <input type="password" name="password"/><br/>
            *Please confirm your password:<br/> <input type="password" name="password2"/><br/>
            *First Name:<br/> <input type="text" name="firstname"/><br/>
            *Last Name:<br/> <input type="text" name="lastname"/><br/>
            *Location:<br/>
                <!--Start of country dropdown list. List retrieved from http://snipplr.com/view/4792/ -->
                <select name ="country">
                <option value="AF">Afghanistan</option>
                <option value="AL">Albania</option>
                <option value="DZ">Algeria</option>
                <option value="AS">American Samoa</option>
                <option value="AD">Andorra</option>
                <option value="AO">Angola</option>
                <option value="AQ">Antarctica</option>
                <option value="AG">Antigua and Barbuda</option>
                <option value="AR">Argentina</option>
                <option value="AM">Armenia</option>
                <option value="AW">Aruba</option>
                <option value="AU">Australia</option>
                <option value="AT">Austria</option>
                <option value="AZ">Azerbaijan</option>
                <option value="BS">Bahamas</option>
                <option value="BH">Bahrain</option>
                <option value="BD">Bangladesh</option>
                <option value="BB">Barbados</option>
                <option value="BY">Belarus</option>
                <option value="BE">Belgium</option>
                <option value="BZ">Belize</option>
                <option value="BJ">Benin</option>
                <option value="BM">Bermuda</option>
                <option value="BT">Bhutan</option>
                <option value="BO">Bolivia</option>
                <option value="BA">Bosnia and Herzegowina</option>
                <option value="BW">Botswana</option>
                <option value="BR">Brazil</option>
                <option value="BN">Brunei Darussalam</option>
                <option value="BG">Bulgaria</option>
                <option value="BF">Burkina Faso</option>
                <option value="BI">Burundi</option>
                <option value="KH">Cambodia</option>
                <option value="CM">Cameroon</option>
                <option value="CA">Canada</option>
                <option value="CV">Cape Verde</option>
                <option value="KY">Cayman Islands</option>
                <option value="CF">Central African Republic</option>
                <option value="TD">Chad</option>
                <option value="CL">Chile</option>
                <option value="CN">China</option>
                <option value="CO">Colombia</option>
                <option value="CG">Congo</option>
                <option value="CD">Congo, the Democratic Republic of the</option>
                <option value="CK">Cook Islands</option>
                <option value="CR">Costa Rica</option>
                <option value="CI">Cote d'Ivoire</option>
                <option value="HR">Croatia</option>
                <option value="CU">Cuba</option>
                <option value="CY">Cyprus</option>
                <option value="CZ">Czech Republic</option>
                <option value="DK">Denmark</option>
                <option value="DJ">Djibouti</option>
                <option value="DM">Dominica</option>
                <option value="DO">Dominican Republic</option>
                <option value="TP">East Timor</option>
                <option value="EC">Ecuador</option>
                <option value="EG">Egypt</option>
                <option value="SV">El Salvador</option>
                <option value="GQ">Equatorial Guinea</option>
                <option value="ER">Eritrea</option>
                <option value="EE">Estonia</option>
                <option value="ET">Ethiopia</option>
                <option value="FO">Faroe Islands</option>
                <option value="FJ">Fiji</option>
                <option value="FI">Finland</option>
                <option value="FR">France</option>
                <option value="GF">French Guiana</option>
                <option value="PF">French Polynesia</option>
                <option value="GA">Gabon</option>
                <option value="GM">Gambia</option>
                <option value="GE">Georgia</option>
                <option value="DE">Germany</option>
                <option value="GH">Ghana</option>
                <option value="GI">Gibraltar</option>
                <option value="GR">Greece</option>
                <option value="GL">Greenland</option>
                <option value="GD">Grenada</option>
                <option value="GP">Guadeloupe</option>
                <option value="GU">Guam</option>
                <option value="GT">Guatemala</option>
                <option value="GN">Guinea</option>
                <option value="GW">Guinea-Bissau</option>
                <option value="GY">Guyana</option>
                <option value="HT">Haiti</option>
                <option value="HN">Honduras</option>
                <option value="HK">Hong Kong</option>
                <option value="HU">Hungary</option>
                <option value="IS">Iceland</option>
                <option value="IN">India</option>
                <option value="ID">Indonesia</option>
                <option value="IR">Iran (Islamic Republic of)</option>
                <option value="IQ">Iraq</option>
                <option selected ="selected" value="IE">Ireland</option>
                <option value="IL">Israel</option>
                <option value="IT">Italy</option>
                <option value="JM">Jamaica</option>
                <option value="JP">Japan</option>
                <option value="JO">Jordan</option>
                <option value="KZ">Kazakhstan</option>
                <option value="KE">Kenya</option>
                <option value="KW">Kuwait</option>
                <option value="KG">Kyrgyzstan</option>
                <option value="LA">Laos</option>
                <option value="LV">Latvia</option>
                <option value="LB">Lebanon</option>
                <option value="LS">Lesotho</option>
                <option value="LR">Liberia</option>
                <option value="LY">Libya</option>
                <option value="LI">Liechtenstein</option>
                <option value="LT">Lithuania</option>
                <option value="LU">Luxembourg</option>
                <option value="MO">Macau</option>
                <option value="MK">Macedonia</option>
                <option value="MG">Madagascar</option>
                <option value="MW">Malawi</option>
                <option value="MY">Malaysia</option>
                <option value="MV">Maldives</option>
                <option value="ML">Mali</option>
                <option value="MT">Malta</option>
                <option value="MU">Mauritius</option>
                <option value="MX">Mexico</option>
                <option value="MD">Moldova</option>
                <option value="MC">Monaco</option>
                <option value="MN">Mongolia</option>
                <option value="MS">Montserrat</option>
                <option value="MA">Morocco</option>
                <option value="MZ">Mozambique</option>
                <option value="MM">Myanmar</option>
                <option value="NA">Namibia</option>
                <option value="NP">Nepal</option>
                <option value="NL">Netherlands</option>
                <option value="AN">Netherlands Antilles</option>
                <option value="NC">New Caledonia</option>
                <option value="NZ">New Zealand</option>
                <option value="NI">Nicaragua</option>
                <option value="NE">Niger</option>
                <option value="NG">Nigeria</option>
                <option value="KR">North Korea</option>
                <option value="NO">Norway</option>
                <option value="OM">Oman</option>
                <option value="PK">Pakistan</option>
                <option value="PW">Palau</option>
                <option value="PA">Panama</option>
                <option value="PG">Papua New Guinea</option>
                <option value="PY">Paraguay</option>
                <option value="PE">Peru</option>
                <option value="PH">Philippines</option>
                <option value="PL">Poland</option>
                <option value="PT">Portugal</option>
                <option value="PR">Puerto Rico</option>
                <option value="QA">Qatar</option>
                <option value="RO">Romania</option>
                <option value="RU">Russia</option>
                <option value="RW">Rwanda</option>
                <option value="KN">Saint Kitts and Nevis</option>
                <option value="LC">Saint Lucia</option>
                <option value="VC">Saint Vincent and the Grenadines</option>
                <option value="WS">Samoa</option>
                <option value="SM">San Marino</option>
                <option value="SA">Saudi Arabia</option>
                <option value="SN">Senegal</option>
                <option value="SC">Seychelles</option>
                <option value="SL">Sierra Leone</option>
                <option value="SG">Singapore</option>
                <option value="SK">Slovakia)</option>
                <option value="SI">Slovenia</option>
                <option value="SB">Solomon Islands</option>
                <option value="SO">Somalia</option>
                <option value="ZA">South Africa</option>
                <option value="KP">South Korea</option>
                <option value="ES">Spain</option>
                <option value="LK">Sri Lanka</option>
                <option value="SD">Sudan</option>
                <option value="SR">Surinam</option>
                <option value="SZ">Swaziland</option>
                <option value="SE">Sweden</option>
                <option value="CH">Switzerland</option>
                <option value="SY">Syria</option>
                <option value="TW">Taiwan</option>
                <option value="TJ">Tajikistan</option>
                <option value="TZ">Tanzania</option>
                <option value="TH">Thailand</option>
                <option value="TG">Togo</option>
                <option value="TO">Tonga</option>
                <option value="TT">Trinidad and Tobago</option>
                <option value="TN">Tunisia</option>
                <option value="TR">Turkey</option>
                <option value="TM">Turkmenistan</option>
                <option value="UG">Uganda</option>
                <option value="UA">Ukraine</option>
                <option value="AE">United Arab Emirates</option>
                <option value="GB">United Kingdom</option>
                <option value="US">United States</option>
                <option value="UY">Uruguay</option>
                <option value="UZ">Uzbekistan</option>
                <option value="VU">Vanuatu</option>
                <option value="VE">Venezuela</option>
                <option value="VN">Vietnam</option>
                <option value="VG">Virgin Islands (British)</option>
                <option value="VI">Virgin Islands (U.S.)</option>
                <option value="EH">Western Sahara</option>
                <option value="YE">Yemen</option>
                <option value="YU">Yugoslavia</option>
                <option value="ZM">Zambia</option>
                <option value="ZW">Zimbabwe</option>
                </select><br/>
                <!-- End of dropdown list -->
                
                <input type="text" name="Last_Name" value="city"/><br/>
                
                <!--Start of counties dropdown list.--> 
                <select name="county">
                <option value="0">Select county</option>
                <option value="1">Carlow</option>
                <option value="2">Cavan</option>
                <option value="3">Clare</option>
                <option value="4">Cork</option>
                <option value="5">Donegal</option>
                <option value="6">Dublin</option>
                <option value="7">Galway</option>
                <option value="8">Kerry</option>
                <option value="9">Kildare</option>
                <option value="10">Kilkenny</option>
                <option value="11">Laois</option>
                <option value="12">Leitrim</option>
                <option value="13">Limerick</option>
                <option value="14">Longford</option>
                <option value="15">Louth</option>
                <option value="16">Mayo</option>
                <option value="17">Meath</option>
                <option value="18">Monaghan</option>
                <option value="19">Northern Ireland</option>
                <option value="20">Offaly</option>
                <option value="21">Roscommon</option>
                <option value="22">Sligo</option>
                <option value="23">Tipperary</option>
                <option value="24">Waterford</option>
                <option value="25">Westmeath</option>
                <option value="26">Wexford</option>
                <option value="27">Wicklow</option>
                </select><br/>
                <!-- End of dropdown list -->
                
                </select>
            <input type="submit" value="Register" />
            </fieldset>
        </form>
        </div>
     </body>
</html>