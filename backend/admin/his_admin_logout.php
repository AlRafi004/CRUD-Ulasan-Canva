<?php
session_start();
include('assets/inc/config.php');

// Clear all session variables
$_SESSION = array();

// Destroy the session cookie if it exists
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// Destroy the session
session_destroy();

// Redirect to logout page
header("Location: admin_logout.php");
exit();
?>
