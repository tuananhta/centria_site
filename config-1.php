<?php
// connect to database
mysql_connect('localhost', 'root', '07061993') or die;
mysql_select_db('centria') or die;

// login check function
function loggedin()
{
    if (isset($_SESSION['user_name']) || isset($_COOKIE['user_name']))
    {
        $logged = TRUE;
        return $logged;
    }
}
?>