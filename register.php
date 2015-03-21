<?php
session_start();
  ob_start();
/* This page lets people register for the
  site (in theory). */
define('TITLE', 'Registraion');
// Set the page title and include the header file:
require('header.php');

// Print some introductory text:
print '<h1 class="background_title" style="background-color:#c53928">REGISTRATION</h1> ';

// Add the CSS:
print '<style type="text/css" media=
"screen">
.error { color: red; }
</style>';

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {
    $problem = FALSE; // No problems so far.
    // Check for each value...
    if (empty($_POST['user_name'])) {
        $problem = TRUE;
        print '<p class="error">Please enter your user name!</p>';
    }

    if (empty($_POST['first_name'])) {
        $problem = TRUE;
        print '<p class="error">Please enter your first name!</p>';
    }

    if (empty($_POST['last_name'])) {
        $problem = TRUE;
        print '<p class="error">Please enter your last name!</p>';
    }

    if (empty($_POST['email'])) {
        $problem = TRUE;
        print '<p class="error">Please enter your email address!</p>';
    }

    if (empty($_POST['pass1'])) {
        $problem = TRUE;
        print '<p class="error">Please enter a password!</p>';
    }

    if ($_POST['pass1'] != $_POST['pass2']) {
        $problem = TRUE;
        print '<p class="error">Your password did not match your confirmed password!</p>';
    }

    if (!$problem) { // If there weren�t any problems...
        $user_name = mysql_escape_string($_POST['user_name']);
        $first_name = mysql_escape_string($_POST['first_name']);
        $last_name = mysql_escape_string($_POST['last_name']);
        $email = mysql_escape_string($_POST['email']);
        $pass = mysql_escape_string($_POST['pass1']);

        $pass = md5($pass);

        $check_user = mysql_query("SELECT * FROM users WHERE user_name='$user_name'");
        if (mysql_num_rows($check_user) > 0) {
            print 'Sorry, that user already exists.';
            exit();
        }

        $check_email = mysql_query("SELECT * FROM users WHERE email='$email'");
        if (mysql_num_rows($check_email) > 0) {
            print 'Sorry, that email already exists.';
            exit();
        }

        mysql_query("INSERT INTO users (id, user_name, first_name, last_name, email, pass) VALUES (0, '$user_name', '$first_name', '$last_name', '$email', '$pass')") or die(mysql_error());
        ob_end_clean(); //Destroy the buffer!
        header('Location: welcome.php');


        // Send the email:
        $body = "Thank you for registering with our project!Your password is '{$_POST['pass1']}'.";
        mail($_POST['email'], 'Registration Confirmation', $body, 'From: admin@centria.co.nf');

        // Clear the posted values:
        $_POST = array();
        exit();
    } else { // Forgot a field.
        print '<p class="error">Please try again!</p>';
    }
} // End of handle form IF.
// Create the form:
?>

<form action="register.php" method="post">
    <h2>Please fill the form:</h2>
    <table>
        <tr>
            <td><h3>User Name: </h3></td>
            <td><input class="borderFormat" type="text" name="user_name" size="20" value="<?php
if (isset($_POST['user_name'])) {
    print htmlspecialchars($_POST['user_name']);
}
?>" /></td>
        </tr>

        <tr>
            <td><h3>First Name: </h3></td>
            <td><input class="borderFormat" type="text" name="first_name" size="20" value="<?php
                if (isset($_POST['first_name'])) {
                    print htmlspecialchars($_POST['first_name']);
                }
?>" /></td>
        </tr>
             
        <tr>
            <td><h3>Last Name: </h3></td>
            <td><input class="borderFormat" type="text" name="last_name" size="20" value="<?php
            if (isset($_POST['last_name'])) {
                print htmlspecialchars($_POST['last_name']);
            }
?>" /></td>
        </tr>
            
        <tr>
            <td><h3>Email Address: </h3></td>
            <td><input class="borderFormat" style="width:250px;" type="email" name="email" size="20" value="<?php
            if (isset($_POST['email'])) {
                print htmlspecialchars($_POST['email']);
            }
?>" /></td>
        </tr>
            
        <tr>
            <td><h3>Password: </h3></td>
            <td><input class="borderFormat" type="password" name="pass1" size="20" /></td>
        </tr>

        <tr>
            <td><h3>Confirm Password: </h3></td>
            <td><input class="borderFormat" type="password" name="pass2" size="20" /></td>
        </tr>
    </table>
    <p><input class="submitButton" type="submit" name="submit" value="Register!" /></p>
    <input type="hidden" name="submitted" value="true" />

</form>

<?php
require('footer.php'); // Need the footer. ?>