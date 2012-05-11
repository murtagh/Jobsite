<?php
// This code was taken from netbeans tutorial (http://netbeans.org/kb/docs/php/wish-list-lesson4.html)
//  and altered to work with the database I have created
class jobsiteDB extends mysqli {
    
    private static $instance = null;
    
    // db connection config variables
    private $user = "root";
    private $pass = "";
    private $dbName = "jobsite";
    private $dbHost = "localhost";
    
 //This method must be static, and must return an instance of the object if the object
 //does not already exist.
 public static function getInstance() {
   if (!self::$instance instanceof self) {
     self::$instance = new self;
   }
   return self::$instance;
 }

 // The clone and wakeup methods prevents external instantiation of copies of the Singleton class,
 // thus eliminating the possibility of duplicate objects.
 public function __clone() {
   trigger_error('Clone is not allowed.', E_USER_ERROR);
 }
 public function __wakeup() {
   trigger_error('Deserializing is not allowed.', E_USER_ERROR);
 }
 
 // private constructor
private function __construct() {
    parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
    if (mysqli_connect_error()) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    parent::set_charset('utf-8');
}

public function get_user_id_by_email($email) {

    $email = $this->real_escape_string($email);

    $user = $this->query("SELECT userID FROM useraccount WHERE Email = '" . $email . "'");
    if ($user->num_rows > 0){
        $row = $user->fetch_row();
        return $row[0];
    } else
        return null;
}

//This function takes the values from the variables and inserts them into the
//necessary columns in the useraccount table
public function create_user ($email, $password, $firstname, $lastname, $country, $city, $county){
    $email = $this->real_escape_string($email);
    $password = $this->real_escape_string($password);
    $firstname = $this->real_escape_string($firstname);
    $lastname = $this->real_escape_string($lastname);
    $country = $this->real_escape_string($country);
    $city = $this->real_escape_string($city);
    $county = $this->real_escape_string($county);
    $this->query("INSERT INTO useraccount (Email, Password, First_Name, Last_Name, Country, City, County)
        VALUES ('" . $email . "', '" . $password . "','" . $firstname . "','" . $lastname . "',
            '" . $country . "','" . $city . "','" . $county . "')");
}

//////////////////////////
////User Login
//////////////////////////
  public function userLogin($useremail, $userpassword){
    $logonSuccess = false;
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      jobsiteDB::getInstance();
       $logonSuccess = ($_POST['useremail']&&$_POST['userpassword']);
       $useremail = $this->real_escape_string($useremail);
       $userpassword = $this->real_escape_string($userpassword);
   
       $result = $this->query("SELECT 1 FROM useraccount
          WHERE Email = '" . $useremail . "' AND Password = '" . $userpassword . "'");
        return $result->data_seek(0);
    }
        
    if ($logonSuccess == TRUE) {
      session_start();
      $_SESSION['useremail'] = $_POST['useremail'];
      header('Location: User_Profile.php');
    }
      
      else { if(!$logonSuccess) 
        echo "Invalid email and/or password";
        exit;
      }
    }
        
}
  
 
?>
