<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link href="main.css" type="text/css" rel="stylesheet" media="all"
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>User Login Page</title>
    </head>
    <body style="margin: 0">
    <?php	                                                 
    $userfields =   array("Uemail" => "Email Address",	          
                    "Upassword" => "Password"
                   );
    
    $custfields = array("Cemail" => "Email Address",
                  "Cpassword" => "Password"
                   );
    ?>
    
    <div id="Ulogin">
    <form action=<?php echo $_SERVER['PHP_SELF']?>
         method="POST">
        <fieldset style='border: 2px solid #000000'>
        <legend>User Login</legend>
    <?php	                                                    
        if (isset($message_1))	                           
        { 
          echo "<p class='errors'>$message_1</p>\n";
        }
        foreach($userfields as $field => $value)	           
        {
          if(preg_match("/pass/i",$field)) 
             $type = "password";
          else
             $type = "text";
          echo "<div id='field'>
            <label for='$field'>$value</label>
            <input id='$field' name='$field' type='$type' 
            value='".@$$field."' size='20' maxlength='100' />
            </div>\n";
        }	                                                
?>
        <input type="submit" name="Button" 
            style='margin-left: 45%; margin-bottom: .5em'
            value="Sign In" />
        
        <p style='text-align: center; margin: 1em'>
        Don't have an account yet?</p>
        <p style='text-align: center; margin: 1em'>
        <a href="User_Reg_Form.php">Create one now</a></p>
        </fieldset> 
    </form>
    </div>
        
    <div id="Clogin">
      <form action=<?php echo $_SERVER['PHP_SELF']?>
          method="POST">
      <fieldset style='border: 2px solid #000000'>
      <legend>Company Login</legend>
    <?php	                                                    
        if (isset($message_1))	                           
        { 
          echo "<p class='errors'>$message_1</p>\n";
        }
        foreach($custfields as $field => $value)	           
        {
          if(preg_match("/pass/i",$field)) 
             $type = "password";
          else
             $type = "text";
          echo "<div id='field'>
            <label for='$field'>$value</label>
            <input id='$field' name='$field' type='$type' 
            value='".@$$field."' size='20' maxlength='100' />
            </div>\n";
        }	
  ?>   
          <input type="submit" name="Button" 
          style='margin-left: 45%; margin-bottom: .5em'
          value="Sign In">
          
        <p style='text-align: center; margin: 1em'>
        Don't have an account yet?</p>
        <p style='text-align: center; margin: 1em'>
        <a href="Company_Reg_Form.php">Create one now</a></p>
      </fieldset>
      </form>  
    </div>
        
    </body>
</html>
