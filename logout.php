<?php
// Start the session and get the data
require_once 'navbar.php';
// session_start();
session_unset();
session_destroy();
echo "<br> You have been logged out";
?>
