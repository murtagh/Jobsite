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
  $result = queryDatabase("SELECT userID
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
// LOGOUT THE USER
//////////////////////////////////////////
function logout() {
  session_unset();
  session_destroy();
  $_SESSION = array();

  header('Location: ' . HOME . 'home.php?feedback=14');
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


// ******************************************************************
// EMPLOYER FUNCTIONS
// ******************************************************************

function EmpLogin(){
  $email = htmlspecialchars(trim($_POST['employemail']), ENT_QUOTES);
  $password = htmlspecialchars(trim($_POST['employpassword']), ENT_QUOTES);
  
  connectDatabase();
  
  $result = queryDatabase("SELECT CompanyID
                           FROM employeraccount
                           WHERE Email = '$email' AND
                                 Password = '$password' AND
                                 Active = 1");

  if (mysql_num_rows($result) == 1) {
    $row = mysql_fetch_object($result);
    $date = date('Y-m-d');
    
    queryDatabase("UPDATE employeraccount SET Last_Login_Date = '$date' WHERE CompanyID = $row->CompanyID");
    $_SESSION['CompanyID'] = $row;

    header('Location: ' . HOME . 'Employer_Profile.php');
  } else {
    $result = queryDatabase("SELECT CompanyID
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
// ******************************************************************
// MISCELLANEOUS FUNCTIONS
// ******************************************************************

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