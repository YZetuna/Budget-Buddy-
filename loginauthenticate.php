<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "budget_buddy";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Query the database to check if the username and password are correct
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login successful
    session_start();
    $_SESSION['username'] = $username;
    header("Location: dashboard.php"); // Redirect to the dashboard or home page
    exit();
} else {
    // Login failed
    header("Location: login.html?error=invalid"); // Redirect back to the login page with an error message
    exit();
}

$conn->close();
?>