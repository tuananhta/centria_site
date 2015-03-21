<?php
session_start();
  ob_start();
define ('TITLE','Welcome to Centria AMK');
require 'header.php';
print '<img id="cover" src="images/cover9.jpg"/>
        <br />';
if(!loggedin()){
    header("Location: login.php");
    exit();
}

print ''
. '<h1 class="background_title" style="background-color:#c53928;">Welcome to Centria University of Applied Sciences</h1>'
        . '<br /><h2>You are logged in!</h2><br />
           <script>
                function goBack()
                {
                    window.history.go(-2)
                }
            </script>
           <button class="button2" type="submit" name="submit" onclick="goBack()"/>Return to previous page</button><br /><br />
           <a href="logout.php"><button class="button2" type="submit" name="submit" />Log Out</button></a>';

require 'footer.php';
?>
