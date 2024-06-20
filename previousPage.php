<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "budget_buddy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userName = trim($_POST['username']);

echo $userName;

//$sql = "SELECT * FROM budget WHERE"

$conn->close();
?>
