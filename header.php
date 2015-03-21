<?php
    require 'config.php';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>
        <?php
            if (defined('TITLE')){
            // Is the title
            print TITLE;}
            else {print 'Centria AMK';}
        ?>
    </title>
    <link rel="shortcut icon" type="image/ico" href="images/centria_logo.ico" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <script  type="text/javascript" src="javascripts/script1.js"></script>
</head>
<body>
    <!-- THE HEADER PAGE -->
    <div id="header">
        <img src="images/centria.png" style="height:80px; padding-left:100px; padding-top:50px;" />
        <span style="position:absolute; right:250px; top:30px;">
            <?php 
                if(!loggedin()){
                    print '<a href="register.php">Register</a>
            <b style="color:#d5c1c1;">|</b>
            <a href="login.php">Login</a>';
                }
                else {
                    if(isset($_COOKIE["user_name"]))
                        $user_name = $_COOKIE["user_name"];
                    else
                        $user_name = $_SESSION["user_name"];
                    
                    print '<a>Welcome, '. $user_name .' </a><b style="color:#d5c1c1;"> | </b>
            <a href="logout.php">Logout</a>';
                }
            ?>
            <b style="color:#d5c1c1;"> | </b>
            <a href="http://intra.cou.fi" target="_blank">Optima</a>
        </span>
        <form action="http://www.google.com/search" method="get" style="position:absolute; right:233px; top:60px;">
            <input type="text" id="tfq" name="q" maxlength="120" value="search & find" />
        </form>
    </div>
        <!-- THE BODY PAGE -->
    <div id="container">
        <!-- MAIN BUTTONS -->
        <table style="padding-top:3px;">
            <tr>
                <td style="padding: 10px 0px 10px 0px;"><a class="home_button" href="index.php">HOME</a></td>
                <td style="padding: 10px 0px 10px 0px;"><a class="home_button" href="studying.php?id=6">STUDYING</a></td>
                <td style="padding: 10px 0px 10px 0px;"><a class="home_button" href="library.php?id=4">LIBRARY</a></td>
                <td style="padding: 10px 0px 10px 0px;"><a class="home_button" href="r&d.php?id=1">R&D</a></td>
                <td style="padding: 10px 0px 10px 0px;"><a class="home_button" href="intern.php">INTERNSHIP</a></td>
                <?php 
                if(loggedin()){
                    
                    if(isset($_COOKIE["user_name"]))
                        $user_name = $_COOKIE["user_name"];
                    else
                        $user_name = $_SESSION["user_name"];
                    
                    $query = "SELECT user_level FROM users WHERE (user_name='$user_name')";
                    
                    if($r = mysql_query($query)) { // Run the query
                        
                        $row = mysql_fetch_array($r); // Retrieve the information                        
                        $user_level = $row['user_level'];
                        
                        if($user_level == 2) print '</tr></table>
                                                    <table>
                                                    <tr>
                                                        <td style="padding: 10px 0px 10px 0px;"><a class="home_button2" href="add_news.php">ADD NEWS</a></td>
                                                        <td style="padding: 10px 0px 10px 0px;"><a class="home_button2" href="add_events.php">ADD EVENTS</a></td>
                                                        <td style="padding: 10px 0px 10px 0px;"><a class="home_button2" href="add_about.php">ADD ABOUT</a></td>
                                                        <td style="padding: 10px 0px 10px 0px;"><a class="home_button2" href="add_studying.php">ADD STUDY</a></td>
                                                        <td style="padding: 10px 0px 10px 0px;"><a class="home_button2" href="add_library.php">ADD LIBRARY</a></td>
                                                        <td style="padding: 10px 0px 10px 0px;"><a class="home_button2" href="add_r&d.php">ADD R&D</a></td>
                                                        <td style="padding: 10px 0px 10px 0px;"><a class="home_button2" href="add_intern.php">ADD INTERN</a></td>
                                                    </tr></table>';
                        if($user_level == 1) print '</tr></table>
                                                    <table>
                                                    <tr>
                                                        <td style="padding: 10px 0px 10px 0px;"><a class="home_button2" href="add_intern.php">ADD INTERN</a></td>
                                                        <td style="padding: 10px 0px 10px 0px;"><a class="home_button2" href="confirm_intern.php">CONFIRM INTERN</a></td>
                                                    </tr></table>';   
                    }
                    
                    else {
                        print '<p style="color: red;">Could not retrieve the data because:<br />'. mysql_error() .'</p>
                        <p>The query being run was: '. $_query .'</p>';
                    }
                }
                ?>

            </tr>
        </table>