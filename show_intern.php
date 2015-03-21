<?php
session_start();
define ('TITLE','Show internship jobs');
require 'header.php';
print '<img id="cover" src="images/cover3.jpg"/>
        <br />
        <br />';
        
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Display the entry in a form
    
    // Define the user name
    if(isset($_COOKIE['user_name'])) $user_name = $_COOKIE['user_name'];
    else if(isset ($_SESSION['user_name'])) $user_name = $_SESSION['user_name'];
    // Define the query
    $query = "SELECT * FROM interns WHERE id={$_GET['id']}";
    if ($r = mysql_query($query)) { // Run the query
        $row = mysql_fetch_array($r); // Retrieve the information
        // Make the table detail:
        print '<h2>'.$row['title'].'</h2>
               <h4>Posted by: '.$row['company'].'</h4>
               <h4>Region: '.$row['region'].'</h4>
               <h4>Periond: '.$row['period'].'</h4>
               <h4>Type: '.$row['type'].'</h4>
               <h4>Posted date: '.$row['date_updated'].'</h4>
               <p><b>Description:</b></p>
               <p>'.nl2br($row['descript']).'</p><br /><br />';

        if (!empty($user_name)) {
            print '<a href="apply_intern.php?id='.$_GET['id'].'&user_name='.$user_name.'"><img src="images/apply_button.png" style="width:220px;"/></a>';    
        } else {
            print '<a href="login.php"><img class="apply_button" src="images/apply_button.png" onclick="alert(\'Please Sign in to our website to continue!\')"/></a>';
            //header ('Location: login.php');
        }
              
               
    } else {
        // Couldnt get the information.
        print '<p style="color: red;">Could not retrieve the blog entry because:<br />' . mysql_error() . '</p>
                <p>The query being run was: ' . $_query . '</p>';
    }
} 

mysql_close(); // Close the database connection.

require 'footer.php';
?>
