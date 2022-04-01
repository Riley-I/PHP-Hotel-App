<?php
// Initialize the session
if ( ! session_id() ) {
    session_start();
    }
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php");
exit;
?>