<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "budget_buddy";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Query the database to check if the username and password are correct
$sql = "SELECT * FROM users WHERE Username='$username' AND Password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login successful
    //session_start();
    //$_SESSION['username'] = $username;
    header("Location: dashboard.html"); // Redirect to the dashboard or home page
    exit();
} else {
    // Login failed
    header("Location: login.html?error=invalid"); // Redirect back to the login page with an error message
    exit();
}

$conn->close();
?>