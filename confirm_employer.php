<?php
session_start();
require 'header.php';
$id = $_GET['id'];
$query = "SELECT * FROM interns WHERE id=$id";
$r = mysql_query($query);
$row = mysql_fetch_array($r);
$query2 = "UPDATE interns SET confirmed_user='{$row['reserve_user']}' WHERE id=$id";
$r = mysql_query($query2);
header ('Location: confirm_intern.php');
?>