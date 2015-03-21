<?php
session_start();
define('TITLE', 'Add Internships');
require 'header.php';
print '<img id="cover" src="images/cover7.jpg"/>
        <br />';

/* This script adds a job content to the database. It now does so sercurely! */

if (isset($_POST['submitted'])) {
    // Handle the form
    // Validate the form data:
    $problem = FALSE;
    if (!empty($_POST['title']) && !empty($_POST['company'])) {
        /* $title = trim($_POST['title']);
          $content = trim($_POST['content']); */

        $title = mysql_real_escape_string(trim($_POST['title']));
        $region = mysql_real_escape_string(trim($_POST['region']));
        $period = mysql_real_escape_string(trim($_POST['period']));
        $type = mysql_real_escape_string(trim($_POST['type']));
        $company = mysql_real_escape_string(trim($_POST['company']));
        $descript = mysql_real_escape_string(trim($_POST['descript']));
        $employer_user = mysql_real_escape_string(trim($_POST['employer_user']));
    } else {
        print '<p style="color: red;"> Please submit both title and company name </h3>';
        $problem = TRUE;
    }

    if (!$problem) {
        $query = "INSERT INTO interns(id, title, region, period, type, company, descript, date_updated, employer_user) VALUES (0, '$title', '$region', '$period', '$type', '$company', '$descript', NOW(), '$employer_user')";
        // Execute the query
        if (@mysql_query($query)) {
            print '<h3>The job content has been added!</h3>';
        } else {
            print '<p style="color: red;">Could not add the content because:<br />' . mysql_error() . '</p><p>The query being run was: ' . $query . '</p>';
        }
    } // No problem!

    mysql_close();
} // End of form submission IF
// Display the form:   

    // Check the user permission
    if(!empty($_COOKIE['user_name'])) $user_name = $_COOKIE['user_name'];
    else if(!empty($_SESSION['user_name'])) $user_name = $_SESSION['user_name'];

    if($r2 = mysql_query("SELECT * FROM users WHERE user_name='$user_name'")){
        $row2 = mysql_fetch_array($r2);
 
        print '<br /><br />
        <h2 class="background_title">Hello <i>'.$user_name.'</i>, please fill the form to add the info:</h2>
        <form action="add_intern.php" method="post">
        <table style="padding-left:15px;">
        <tr><td><h3>Job Title: </td><td><input class="borderFormat" type="text" name="title" size="40" maxlength="100"/></td></h3></tr>
        <tr><td><h3>Region: </td><td><input class="borderFormat" style="width:100px;" type="text" name="region" size="40" maxlength="100"/></td></h3></tr>
        <tr><td><h3>Period: </td><td><input class="borderFormat" style="width:100px;" type="text" name="period" size="40" maxlength="100"/></td></h3></tr>
        <tr><td><h3>Type: </td><td><select class="borderFormat" style="width:100px; font-family:Candara; font-weight:800" name="type">
                <option value="Full time">Full time</option>
                <option value="Part time">Part time</option>
            </select></td></h3></tr>
        <tr><td style="vertical-align:0px;"><h3>Description: </td><td><textarea class="borderFormat" style="width:400px;" name="descript" cols="40" rows="10" placeholder="Type here ..."></textarea></td></h3></tr>';

        if($row['user_level'] == 2){
            print ' 
        <tr><td><h3>Company Name: </td><td><input class="borderFormat" type="text" name="company" size="20" maxlength="100"/></td></h3></tr>
        <tr><td><h3>Employer Username: </td><td><input class="borderFormat" type="text" name="employer_user" size="20" maxlength="100"/></td></h3></tr>';
        }
        else if($row['user_level'] == 1){
            print '
            <tr><td><h3>Company Name: </td><td><input class="borderFormat" type="text" name="company" size="20" maxlength="100"/></td></h3></tr>
            <input type="hidden" name="employer_user" value="'.$user_name.'"/>';
        }
        print '  
        </table><br />
        <input class="submitButton" type="submit" name="submit" value="POST NOW"/>
        <input type="hidden" name="submitted" value="true"/>
        
    </form>';
    }
    else
    {
    	die(mysql_error());
    }
    

require 'footer.php';
?>