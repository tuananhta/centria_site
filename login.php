<?php
session_start();
  ob_start();
error_reporting(0);
define('TITLE', 'Login page');
require ('header.php');

if (loggedin())
{
    header("Location: welcome.php");
    exit();
}
    
// Print some introdctory text:
print '<h1 class="background_title">LOG IN WINDOW</h1>
       <div style="font-family:helvetica; font-size:13px; color:#000000;">
       <p>Please fill your username & password in the following table. If you can\'t sign In, please don\'t hesitate to contact us at (+358) 4 68 415 967.</p>';

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {
    

    //handle the form:
    if (!empty($_POST['user_name']) && (!empty($_POST['pass']))) {
        
        $user_name = mysql_escape_string($_POST['user_name']);
        $pass      = mysql_escape_string($_POST['pass']);
        $pass   = md5($pass);
        $rememberme = $_POST['rememberme'];
    
        $check_account = mysql_query("SELECT * FROM users WHERE user_name='$user_name' AND pass='$pass'");
        if(mysql_num_rows($check_account) > 0) {
            
            // Do session stuff:
            if($rememberme == "on") {
                setcookie("user_name",$user_name, time()+7200);
            }
            
            else if($rememberme == ""){
                $_SESSION['user_name'] = $user_name;
            };
            
            
            ob_end_clean();//Destroy the buffer!
            //Redirect the user to the welcome page!;
            header('Location: welcome.php');
            exit();
        }
        else {
            print '<p style="font-size:14px; font-weight:600;"><br />Sorry, the submitted <b>username and pass</b> do not match those'
            . ' on file!<br /><br /><a href="login.php" style="color:blue; font-size:16px;">Go back</a> and try again.</p></div>';
        }
    }
    else{
        print '<p style="font-size:14px; font-weight:600;"><br />Please make sure you enter both an user_name address and a pass!'
        . '<br /><a href="login.php" style="color:blue; font-size:16px;">Go back</a> and try again.</p></div>';
    }
}
 else {
     print'<form action="login.php" method="post">
        <table>
        <tr><td><h3>Username:</h3></td><td><input class="borderFormat" style="width:150px;" type="text" name="user_name" size="20"/></td></tr>
        <tr><td><h3>password:</h3></td><td><input class="borderFormat" style="width:150px;" type="password" name="pass" size="20" /></h3>
        </table>
        <p><input type="checkbox" name="rememberme" /><i> Remember me</i></p>
        <p><input class="submitButton" type="submit" name="submit" value="Log In" /></p>
        <input type="hidden" name="submitted" value="true" />
    </form></div>';
}

require ('footer.php');
?>