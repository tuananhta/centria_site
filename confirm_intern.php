<?php
session_start();
// Confirm intern (for employer user)
define('TITLE', 'Employers\' confirmation');
require 'header.php';
print '<img id="cover" src="images/cover6.jpg"/>
        <br />';

if (isset($_COOKIE['user_name']))
    $user_name = $_COOKIE['user_name'];
else if (isset($_SESSION['user_name']))
    $user_name = $_SESSION['user_name'];

$query = "SELECT * FROM interns WHERE (employer_user='$user_name')";

if ($r = mysql_query($query)) { // Run the query

    $i = 1;
    
    while($row = mysql_fetch_array($r)){ // Retrieve the information
        if($i == 1) {
            print '<h2 style="border-bottom:1px solid black; padding-bottom:10px;">User employer: '.$user_name.'</h2>
                   <div style="padding-left:15px;">
                   <br /><h3>List job added:</h3>';
        }
        print "<p>----------------------</p>
               <p><b><br />$i. Job title: </b>{$row['title']}</p>
               <p><b>Company:</b> {$row['company']}</p>
               <p><i>Entered Date: {$row['date_updated']}</i><p/>";
        $i++; 
    // Make the table detail:
        if(empty($row['reserve_user'])){
            print '<p><b>Status: Job available</b></p>';
        }
        else if(!empty($row['confirmed_user'])) {
            print "<p><b>Reservation completed by: {$row['confirmed_user']}</b></p>";
        }
        else {
            print '<p><b>User Reserved: ' . $row['reserve_user'] . '</b></p><br />
                   <a href="confirm_employer.php?id='.$row['id'].'"><button onclick="alert(\'Do you want to confirm -'.$row['reserve_user'].'- for this job?\')">Confirm</button></a>
                   <a href="reject.php?id='.$row['id'].'"><button onclick="alert(\'Do you want to reject -'.$row['reserve_user'].'- for this job?\')">Reject</button></a>
                   <br />';
            
        }        
    }
    
    print '<p>----------------------</p></div>';
    
} else {
    // Couldnt get the information.
    print '<p style="color: red;">Could not retrieve the blog entry because:<br />' . mysql_error() . '</p>
                <p>The query being run was: ' . $query . '</p>';
}

mysql_close(); // Close the database connection.

require 'footer.php';
?>
<html>
    <body>
        
    </body>
</html>