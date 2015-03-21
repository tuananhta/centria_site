<?php
session_start();
require 'config.php';

// Destroy session
session_destroy();

// Unset cookies
setcookie('user_name','',time()-7200);

header("Location: login.php");
require 'footer.php';
?>
