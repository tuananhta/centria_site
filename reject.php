<?php
session_start();
require 'header.php';
$id = $_GET['id'];
$query = "UPDATE interns SET reserve_user='' WHERE id=$id";
$r = mysql_query($query);
header ('Location: confirm_intern.php');
?>