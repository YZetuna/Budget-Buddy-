<<<<<<< HEAD
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
=======
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
>>>>>>> 54477801f2f6f3967b8c5c43ec8405930fbe4d85
?>