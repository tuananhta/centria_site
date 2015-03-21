<?php
session_start();
    ob_start();
require 'header.php';
$id = mysql_real_escape_string(trim($_GET['id']));
$user_name = mysql_real_escape_string(trim($_GET['user_name']));

$query = "UPDATE interns SET reserve_user='$user_name' WHERE id=$id";
// Execute the query
if (@mysql_query($query)) {
    print '<p>The reservation successed!</p>';
} else {
    print '<p style="color: red;">Could not add the content because:<br />' . mysql_error() . '</p><p>The query being run was: ' . $query . '</p>';
}

header ('Location: intern.php');
mysql_close();

require 'footer.php';
?>
INSERT Select * FROM MyTable WHERE ID = 10;