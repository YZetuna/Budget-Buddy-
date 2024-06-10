<?php
session_start();

// Check if a session is set
if (isset($_POST['logout']) && isset($_SESSION['username'])) {
    // Destroy the session
    session_unset();
    session_destroy();
}

// Redirect to the login page
header("Location: login.html");
exit();
?>