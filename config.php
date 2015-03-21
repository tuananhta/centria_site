<?php
// connect to database
mysql_connect('pdb14.biz.nf', '1561245_3143', 'bame2724') or die;
mysql_select_db('1561245_3143') or die;

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