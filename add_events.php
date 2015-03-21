<?php
session_start();
define('TITLE', 'Add EVENTS');
require 'header.php';
print '<h1 class="background_title2">ADD EVENTS</h1>';

/* This script adds a events content to the database. It now does so sercurely! */

if (isset($_POST['submitted'])) {
    // Handle the form
    // Validate the form data:
    $target = "images/uploads/"; 
    $target = $target . basename( $_FILES['photo']['name']);
    
    $pic=($_FILES['photo']['name']);
    $problem = FALSE;
    if (!empty($_POST['title']) && !empty($_POST['context'])) {
        /* $title = trim($_POST['title']);
          $content = trim($_POST['content']); */
        //This is the directory where images will be saved  

        $title = mysql_real_escape_string(trim($_POST['title']));
        $context = mysql_real_escape_string(trim($_POST['context']));
        
    } else {
        print '<p style="color: red;"> Please submit both title and context name </h3>';
        $problem = TRUE;
    }

    if (!$problem) {
        $query = "INSERT INTO events VALUES (0, '$title', '$context', NOW(), '$pic')";
        // Execute the query
        if (@mysql_query($query)) {
            print '<h3>The events content has been added!</h3>';
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) 
            { 
                
                //Tells you if its all ok 
                echo "<h3>The file has been uploaded, and your information has been added to the directory</h3>"; 
            } 
        } else {
            print '<p style="color: red;">Could not add the content because:<br />' . mysql_error() . '</p><p>The query being run was: ' . $query . '</p>';
        }
    } // No problem!

} // End of form submission IF
// Display the form:   

    // Check the user permission
 
        print '
        <h2>Hello <i>'.$user_name.'</i>, please fill the form to add the events:</h2>
        <form enctype="multipart/form-data" action="add_events.php" method="POST">
            <table>
                <tr>
                    <td><h3>Events Title: </h3></td>
                    <td><input class="borderFormat" type="text" name="title" size="40" maxlength="100"/></td>
                </tr>
                <tr>
                    <td style="vertical-align:0px;"><h3>Context: </h3></td>
                    <td><textarea class="borderFormat" style="width:400px;" name="context" cols="40" rows="10" placeholder="Type here ..."></textarea></td>
                </tr>
                <tr>
                    <td><h3>Add photo: </h3></td>
                    <td><input type="file" name="photo" /></td>
                </tr>
            </table>
            <input class="submitButton" type="submit" name="submit" value="ADD NOW"/>
            <input type="hidden" name="submitted" value="true"/>
        </form>';
    
    mysql_close();
require 'footer.php';
?>

