<?php

session_start();

define('HOME', 'http://localhost/JobSite/');

// DATABASE CONFIG
define('SERVER', 'localhost');                    // WEB SERVER ADDRESS
define('USERNAME', 'root');                       // DATABASE USERNAME
define('PASSWORD', '');														// DATABASE PASSWORD
define('DATABASE_NAME', 'jobsite');               // DATABASE NAME



// ******************************************************************
// DATABASE FUNCTIONS
// ******************************************************************

//////////////////////////////////////////
// CONNECT TO DATABASE
//////////////////////////////////////////

function connectDatabase() {
  mysql_pconnect(SERVER, USERNAME, PASSWORD)
    or die('Could not connect: ' . mysql_error());

  mysql_select_db(DATABASE_NAME)
    or die('Could not select: ' . mysql_error());
}

//////////////////////////////////////////
// QUERY DATABASE
//////////////////////////////////////////
function queryDatabase($query = '') {
  $result = mysql_query($query)
    or die('MYSQL Error: ' . $query . ' ' . mysql_error());
    
  return $result;
}

// ******************************************************************
// USER FUNCTIONS
// ******************************************************************

/////////////////////////
// REGISTER THE USER
////////////////////////
function registeruser(){
  //include mail package from PEAR library
  require_once "mail.php";
  
  /* 
   * Assign values selected in register form to variables
   * htmlspecialchars - convert special characters to HTML entities
   * trim - strip white space from end of beginnging and end of string
   * ENT_QUOTES - Convert both double and single quotes
   */
  $email = htmlspecialchars(trim($_POST['useremail']), ENT_QUOTES);
  $password = htmlspecialchars(trim($_POST['password1']), ENT_QUOTES);
  $fullname = htmlspecialchars(trim($_POST['fullname']), ENT_QUOTES);
  $county = htmlspecialchars(trim($_POST['county']), ENT_QUOTES);
  $city = htmlspecialchars(trim($_POST['city']), ENT_QUOTES);
  $jobtitle = htmlspecialchars(trim($_POST['JobTitle']), ENT_QUOTES);
  $availability = htmlspecialchars(trim($_POST['availability']), ENT_QUOTES);
  $careerlevel = htmlspecialchars(trim($_POST['CareerLevel']), ENT_QUOTES);
  $experienceyears = htmlspecialchars(trim($_POST['ExperienceYears']), ENT_QUOTES);
  $educationlevel = htmlspecialchars(trim($_POST['EducationLevel']), ENT_QUOTES);
  $travel = htmlspecialchars(trim($_POST['travel']), ENT_QUOTES);
  $relocate = htmlspecialchars(trim($_POST['relocate']), ENT_QUOTES);
  $CVtext = htmlspecialchars($_POST['CVtextarea'], ENT_QUOTES);
  $date = date('Y-m-d');
  $hash = md5(rand(0,1000));
  
  connectDatabase();
  
  /*
   * Check to see if email already registered
   * If not insert field values into useraccount table
   */
  $result = queryDatabase("SELECT UserID
                           FROM useraccount
                           WHERE Email = '$email'");
  
    if (mysql_num_rows($result) == 1) {
    header('Location: ' . HOME . 'User_Reg_Form.php?feedback=3');
    } else {
      queryDatabase("INSERT INTO useraccount (Email, Password, Create_Date, Full_Name,
           City, County, JobTitle, 	Availability, Career_Level, Experience, Education_Level, 
          WillingToTravel, WillingToRelocate, CV, hash) VALUES ('$email', '$password', '$date', '$fullname', 
          '$city', '$county', '$jobtitle', '$availability', '$careerlevel', '$experienceyears', 
          '$educationlevel', '$travel', '$relocate', '$CVtext', '$hash')");
      
      /*
       * http://email.about.com/od/emailprogrammingtips/qt/PHP_Email_SMTP_Authentication.htm
       * http://net.tutsplus.com/tutorials/php/how-to-implement-email-verification-for-new-members/
       * When insert is completed send verifcation email to registered email ($email)
       * with link to verify email
       * PEAR email package used here for SMTP authentication for email sent from gmail account
       * Return user to home page
       */
      $from = "contractworkire@gmail.com";
      $to = $email;
      $subject = 'Verification Email';
      $message = '
        
      Thanks for signing up!
      Your account has been created, please click the link below to activate your account
      
      http://localhost/JobSite/home.php?email='.$email.'&hash='.$hash.'
      ';
      
      $host = "smtp.gmail.com";
      $hostusername = "contractworkire@gmail.com";
      $hostpassword = "Skerries09";
      $headers = array ('From' => $from,
        'To' => $to,
        'Subject' => $subject);
      $smtp = Mail::factory('smtp',
        array ('host' => $host,
     'auth' => true,
     'username' => $hostusername,
     'password' => $hostpassword));
      
      $mail = $smtp->send($to, $headers, $message);
 
      if (PEAR::isError($mail)) {
         echo("<p>" . $mail->getMessage() . "</p>");
    } else {
      header('Location: ' . HOME . 'home.php?feedback=4');
    } 
   } 
}

//////////////////////////////////////////
// ACTIVATE USER
//////////////////////////////////////////
function activateUser() {
  if(isset($_GET['email'])AND isset($_GET['hash'])){  
    $email = htmlspecialchars($_GET['email'], ENT_QUOTES);
    $hash = htmlspecialchars($_GET['hash'], ENT_QUOTES);
    
    connectDatabase();
    
    $result = queryDatabase("SELECT Email, hash, Active
                             FROM useraccount
                             WHERE Email='$email' AND hash='$hash' AND Active = 0");
    
    if (mysql_num_rows($result) > 0){
      queryDatabase("UPDATE useraccount SET Active = 1 WHERE Email='$email' AND hash='$hash' AND Active = 0");
      echo '<div class="good">Activation successful - Login using EMAIL and PASSWORD</div>';
    }else {
      echo '<div class="bad">The url is either invalid or you already have activated your account.</div>';
        
      break;
      }
    }


  }

        
//////////////////////////////////////////
// LOGIN THE USER
//////////////////////////////////////////
function loginUser() {
  $email = htmlspecialchars(trim($_POST['useremail']), ENT_QUOTES);
  $password = htmlspecialchars(trim($_POST['userpassword']), ENT_QUOTES);
  
  connectDatabase();
  
  $result = queryDatabase("SELECT UserID
                           FROM useraccount
                           WHERE Email = '$email' AND
                                 Password = '$password' AND
                                 Active = 1");

  if (mysql_num_rows($result) == 1) {
    $row = mysql_fetch_object($result);
    $date = date('Y-m-d');
    
    queryDatabase("UPDATE useraccount SET Last_Login = '$date' WHERE UserID = $row->UserID");
    $_SESSION['UserID'] = $row;

    header('Location: ' . HOME . 'User_Profile.php');
  } else {
    $result = queryDatabase("SELECT UserID
                             FROM useraccount
                             WHERE Email = '$email' AND
                                   Password = '$password' AND
                                   Active = 0");

  
    if (mysql_num_rows($result) >= 1)
      header('Location: ' . HOME . 'home.php?feedback=2');
    else
      header('Location: ' . HOME . 'home.php?feedback=1');
  }
}

//////////////////////////////////////////
// SHOW USER PROFILE
//////////////////////////////////////////
function viewProfile(){
$userid = $_SESSION['UserID']; 

  connectDatabase();
  
  $result = queryDatabase("SELECT Email, Full_Name, City, County, JobTitle, Availability, RecentEmployer, 
      Mobile, Secondary_Number, Contact_Pref, Daily_Rate, Personal_Statement, CV, WillingToRelocate, 
      WillingToTravel, Career_Level, Experience, Education_Level FROM useraccount WHERE UserID = $userid->UserID AND Active = 1");
  
  $row = mysql_fetch_object($result);
  
  $values = array();
  
  $values['Email'] = $row->Email;
  $values['Full_Name'] = $row->Full_Name;
  $values['city'] = $row->City;
  $values['county'] = $row->County;
  $values['JobTitle'] = $row->JobTitle;
  $values['availability'] = $row->Availability;
  $values['RecentEmployer'] = $row->RecentEmployer;
  $values['Mobile'] = $row->Mobile;
  $values['Secondary_Number'] = $row->Secondary_Number;
  $values['Contact_Pref'] = $row->Contact_Pref;
  $values['Daily_Rate'] = $row->Daily_Rate;
  $values['Personal_Statement'] = $row->Personal_Statement;
  $values['CV'] = $row->CV;
  $values['WillingToRelocate'] = $row->WillingToRelocate;
  $values['WillingToTravel'] = $row->WillingToTravel;
  $values['Career_Level'] = $row->Career_Level;
  $values['Experience'] = $row->Experience;
  $values['Education_Level'] = $row->Education_Level;
  
  return $values; 
        
}

//////////////////////////////////////////
// UPDATE PROFILE
//////////////////////////////////////////
function updateProfile(){
  $userID = $_SESSION['UserID'];
  $name = htmlspecialchars(trim($_POST['Name']), ENT_QUOTES);
  $county = htmlspecialchars(trim($_POST['county']), ENT_QUOTES);
  $town = htmlspecialchars(trim($_POST['Town']), ENT_QUOTES);
  $jobtitle = htmlspecialchars(trim($_POST['JobTitle']), ENT_QUOTES);
  $availability = htmlspecialchars(trim($_POST['availability']), ENT_QUOTES);
  $dailyrate = htmlspecialchars(trim($_POST['DailyRate']), ENT_QUOTES);
  $employer = htmlspecialchars(trim($_POST['RecentEmployer']), ENT_QUOTES);
  $careerlevel = htmlspecialchars(trim($_POST['CareerLevel']), ENT_QUOTES);
  $experienceyears = htmlspecialchars(trim($_POST['ExperienceYears']), ENT_QUOTES);
  $educationlevel = htmlspecialchars(trim($_POST['EducationLevel']), ENT_QUOTES);
  $travel = htmlspecialchars(trim($_POST['travel']), ENT_QUOTES);
  $relocate = htmlspecialchars(trim($_POST['relocate']), ENT_QUOTES);
  $mobile = htmlspecialchars(trim($_POST['mobile']), ENT_QUOTES);
  $secnumber = htmlspecialchars(trim($_POST['SecNum']), ENT_QUOTES);
  $contactpref = htmlspecialchars(trim($_POST['ContactPref']), ENT_QUOTES);
  $statement = str_replace(array("\r\n", "\n", "\r"), "<br />", htmlspecialchars(trim($_POST['PersonalStatement']), ENT_QUOTES));
  $CVtext = htmlspecialchars($_POST['CV'], ENT_QUOTES);
  
  connectDatabase();
  
  queryDatabase("UPDATE useraccount SET Full_Name = '$name', 
                                        City = '$town', 
                                        County = '$county', 
                                        JobTitle = '$jobtitle', 
                                        Availability = '$availability', 
                                        Daily_Rate = '$dailyrate', 
                                        RecentEmployer = '$employer', 
                                        Career_Level = '$careerlevel', 
                                        Experience = '$experienceyears', 
                                        Education_Level = '$educationlevel', 
                                        WillingToTravel = '$travel', 
                                        WillingToRelocate = '$relocate', 
                                        Mobile = '$mobile', 
                                        Secondary_Number = '$secnumber', 
                                        Contact_Pref = '$contactpref', 
                                        Personal_Statement = '$statement', 
                                        CV = '$CVtext' WHERE UserID = $userID->UserID");

  header('Location: ' . HOME . 'User_Profile.php?feedback=15');
}

// ******************************************************************
// EMPLOYER FUNCTIONS
// ******************************************************************

/////////////////////////
// EMPLOYER REGISTER
////////////////////////
function registeremployer(){
  //include mail package from PEAR library
  require_once "mail.php";
  
  /* 
   * Assign values selected in employer register form to variables
   * htmlspecialchars - convert special characters to HTML entities
   * trim - strip white space from end of beginnging and end of string
   * ENT_QUOTES - Convert both double and single quotes
   */
  $empemail = htmlspecialchars(trim($_POST['email_employer']), ENT_QUOTES);
  $emppassword = htmlspecialchars(trim($_POST['password_employer']), ENT_QUOTES);
  $compname = htmlspecialchars(trim($_POST['Company_Name']), ENT_QUOTES);
  $address1 = htmlspecialchars(trim($_POST['CompAddress1']), ENT_QUOTES);
  $address2 = htmlspecialchars(trim($_POST['CompAddress2']), ENT_QUOTES);
  $empcity = htmlspecialchars(trim($_POST['CityTown']), ENT_QUOTES);
  $empcounty = htmlspecialchars(trim($_POST['CompCounty']), ENT_QUOTES);
  $emptelephone = htmlspecialchars(trim($_POST['CompanyTel']), ENT_QUOTES);
  $empdescription = htmlspecialchars(trim($_POST['Comp_Description']), ENT_QUOTES);
  $empdate = date('Y-m-d');
  $emphash = md5(rand(0,1000));
  
  connectDatabase();
  
  /*
   * Check to see if email already registered
   * If not insert field values into useraccount table
   */
  $result = queryDatabase("SELECT EmployerID
                           FROM employeraccount
                           WHERE Email = '$empemail'");
  
    if (mysql_num_rows($result) == 1) {
    header('Location: ' . HOME . 'Employer_Reg_Form.php?feedback=3');
    } else {
      queryDatabase("INSERT INTO employeraccount (Email, Password, Company_Name, Address1, Address2, 
          City, County, Contact_Number, Company_Desc, Create_Date, emphash) VALUES ('$empemail', '$emppassword', '$compname', 
          '$address1', '$address2', '$empcity', '$empcounty', '$emptelephone', '$empdescription', '$empdate', '$emphash')");
      
      /*
       * When insert is completed send verifcation email to registered email ($empemail)
       * with link to verify email
       * PEAR email package used here for SMTP authentication for email sent from gmail account
       * Return user to home page
       */
      $from = "contractworkire@gmail.com";
      $to = $empemail;
      $subject = 'Verification Email';
      $message = '
        
      Thanks for signing up!
      Your account has been created, please copy the link below into your browser to activate your account
      
      http://localhost/JobSite/home.php?emailemp='.$empemail.'&emphash='.$emphash.'
      ';
      
      $host = "smtp.gmail.com";
      $hostusername = "contractworkire@gmail.com";
      $hostpassword = "Skerries09";
      $headers = array ('From' => $from,
        'To' => $to,
        'Subject' => $subject);
      $smtp = Mail::factory('smtp',
        array ('host' => $host,
     'auth' => true,
     'username' => $hostusername,
     'password' => $hostpassword));
      
      $mail = $smtp->send($to, $headers, $message);
 
      if (PEAR::isError($mail)) {
         echo("<p>" . $mail->getMessage() . "</p>");
    } else {
      header('Location: ' . HOME . 'home.php?feedback=4');
    } 
   } 
}

//////////////////////////////////////////
// ACTIVATE USER
//////////////////////////////////////////
function activateEmployer() {
  if(isset($_GET['emailemp'])AND isset($_GET['emphash'])){  
    $empemail = htmlspecialchars($_GET['emailemp'], ENT_QUOTES);
    $emphash = htmlspecialchars($_GET['emphash'], ENT_QUOTES);
    
    connectDatabase();
    
    $result = queryDatabase("SELECT Email, emphash, Active
                             FROM employeraccount
                             WHERE Email='$empemail' AND emphash='$emphash' AND Active = 0");
    
    if (mysql_num_rows($result) > 0){
      queryDatabase("UPDATE employeraccount SET Active = 1 WHERE Email='$empemail' AND emphash='$emphash' AND Active = 0");
      echo '<div class="good">Activation successful - Login using EMAIL and PASSWORD</div>';
    }else {
      echo '<div class="bad">The url is either invalid or you already have activated your account.</div>';
        
      break;
      }
    }
  }
  
//////////////////////////////////////////
// EMPLOYER LOGIN
//////////////////////////////////////////
function EmpLogin(){
  $email = htmlspecialchars(trim($_POST['employemail']), ENT_QUOTES);
  $password = htmlspecialchars(trim($_POST['employpassword']), ENT_QUOTES);
  
  connectDatabase();
  
  $result = queryDatabase("SELECT EmployerID
                           FROM employeraccount
                           WHERE Email = '$email' AND
                                 Password = '$password' AND
                                 Active = 1");

  if (mysql_num_rows($result) == 1) {
    $row = mysql_fetch_object($result);
    $date = date('Y-m-d');
    
    queryDatabase("UPDATE employeraccount SET Last_Login_Date = '$date' WHERE EmployerID = $row->EmployerID");
    $_SESSION['EmployerID'] = $row;

    header('Location: ' . HOME . 'Employer_Profile.php');
  } else {
    $result = queryDatabase("SELECT EmployerID
                             FROM employeraccount
                             WHERE Email = '$email' AND
                                   Password = '$password' AND
                                   Active = 0");

  
    if (mysql_num_rows($result) >= 1)
      header('Location: ' . HOME . 'home.php?feedback=2');
    else
      header('Location: ' . HOME . 'home.php?feedback=1');
  }
}

//////////////////////////////////////////
// SHOW EMPLOYER PROFILE
//////////////////////////////////////////
function viewEmpProfile(){
$employerid = $_SESSION['EmployerID']; 

  connectDatabase();
  
  $result = queryDatabase("SELECT Email, Company_Name, Address1, Address2, City, County, Contact_Number, 
      Company_Desc FROM employeraccount WHERE EmployerID = $employerid->EmployerID AND Active = 1");
  
  $row = mysql_fetch_object($result);
  
  $empvalues = array();
  
  $empvalues['Email'] = $row->Email;
  $empvalues['Company_Name'] = $row->Company_Name;
  $empvalues['Address1'] = $row->Address1;
  $empvalues['Address2'] = $row->Address2;
  $empvalues['City'] = $row->City;
  $empvalues['County'] = $row->County;
  $empvalues['Contact_Number'] = $row->Contact_Number;
  $empvalues['Company_Desc'] = $row->Company_Desc;
  
  return $empvalues;         
}

//////////////////////////////////////////
// UPDATE EMPLOYER PROFILE
//////////////////////////////////////////
function updateEmpProfile(){
  $EmployerID = $_SESSION['EmployerID'];
  $compname = htmlspecialchars(trim($_POST['Company_Name']), ENT_QUOTES);
  $address1 = htmlspecialchars(trim($_POST['CompAddress1']), ENT_QUOTES);
  $address2 = htmlspecialchars(trim($_POST['CompAddress2']), ENT_QUOTES);
  $city = htmlspecialchars(trim($_POST['CityTown']), ENT_QUOTES);
  $county = htmlspecialchars(trim($_POST['CompCounty']), ENT_QUOTES);
  $telnumber = htmlspecialchars(trim($_POST['CompanyTel']), ENT_QUOTES);
  $compDesc = htmlspecialchars(trim($_POST['Comp_Description']), ENT_QUOTES);
  
  connectDatabase();
  
  queryDatabase("UPDATE employeraccount SET Company_Name = '$compname', 
                                        Address1 = '$address1', 
                                        Address2 = '$address2', 
                                        City = '$city', 
                                        County = '$county', 
                                        Contact_Number = '$telnumber', 
                                        Company_Desc = '$compDesc' WHERE EmployerID = $EmployerID->EmployerID");

  header('Location: ' . HOME . 'Employer_Profile.php?feedback=15');
}
// ******************************************************************
// MISCELLANEOUS FUNCTIONS
// ******************************************************************

//////////////////////////////////////////
// LOGOUT
//////////////////////////////////////////
function logout() {
  session_unset();
  session_destroy();
  $_SESSION = array();

  header('Location: ' . HOME . 'home.php?feedback=14');
}

//////////////////////////////////////////
// USER FEEDBACK
//////////////////////////////////////////
function userFeedback() {
  if (isset($_GET['feedback'])) {
    switch ($_GET['feedback']) {
      case 1:
        echo '<div class="bad">Login failed - Invalid EMAIL and/or PASSWORD</div>';
        break;
      case 2:
        echo '<div class="bad">Login failed - EMAIL not activated - Check email</div>';
        break;
      case 3:
        echo '<div class="bad">Registration failed - EMAIL/USER ID already exists</div>';
        break;
      case 4:
        echo '<div class="good">Registration successful - Activate EMAIL/USER ID - Check email</div>';
        break;
      case 5:
        echo '<div class="good">Password retrieval successful - Check email</div>';
        break;
      case 6:
        echo '<div class="bad">Password retrieval failed - Invalid EMAIL/USER ID</div>';
        break;
      case 7:
        echo '<div class="bad">Restricted access - Login required</div>';
        break;
      case 8:
        echo '<div class="good">Insert successful</div><hr />';
        break;
      case 9:
        echo '<div class="good">Login successful</div><hr />';
        break;
      case 10:
        echo '<div class="good">Delete successful</div><hr />';
        break;
      case 11:
        echo '<div class="good">Application successful</div>';
        break;
      case 12:
        echo '<div class="bad">Application failed</div>';
        break;
      case 13:
        echo '<div class="good">System administrator has been notified</div>';
        break;
      case 14:
        echo '<div class="good">Logout successful</div><hr />';
        break;
      case 15:
        echo '<div class="good">Update successful</div><hr />';
        break;
    }
  }
}
?>