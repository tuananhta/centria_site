<?php
session_start();
define ('TITLE','Reserve the job');
require 'header.php';
print '<img id="cover" src="images/cover5.jpg"/>
        <br />
        <br />';
        
        
if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['user_name']) ) {
    // Display the entry in a form
    
    // Define the user name
    if(isset($_COOKIE['user_name'])) $user_name = $_COOKIE['user_name'];
    else $user_name = $_SESSION['user_name'];
    // Define the query
    $query = "SELECT * FROM interns WHERE id={$_GET['id']}";
    if ($r = mysql_query($query)) { // Run the query
        $row = mysql_fetch_array($r); // Retrieve the information
        // Make the table detail:
        print '<h2 style="padding-bottom:10px;">Hi, '.$user_name.', THANK YOU FOR YOUR RESERVATION, YOU APPLIED FOR:</h2>
               <h2>'.$row['title'].'</h2>
               <h4>Posted by: '.$row['company'].'</h4>
               <h4 style="padding-bottom:15px; border-bottom:1px solid black;">Region: '.$row['region'].'</h4>
               <h4>Please click the CONFIRM button to confirm your decision. Once you done it, this information will be removed on the internship news. </h4>';

        print '<a href="confirm.php?id='.$_GET['id'].'&user_name='.$user_name.'"><img class="button3" src="images/confirm_button.png" style="width:110px;" onclick="alert(\'Reservation Successed!\')"/></a>';   
              
               
    } else {
        // Couldnt get the information.
        print '<p style="color: red;">Could not retrieve the blog entry because:<br />' . mysql_error() . '</p>
                <p>The query being run was: ' . $_query . '</p>';
    }
}

mysql_close(); // Close the database connection.

require 'footer.php';
?>
