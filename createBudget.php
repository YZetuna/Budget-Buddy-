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

$grossIncome = trim($_POST['grossIncome']);

//$todaysDate = date("Y-m-d");

$sql = "SELECT * FROM budget WHERE DateOfBudget=CURDATE()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //output data of each row
    /*while ($row = $result->fetch_assoc()) {
        echo "<br>DateOfBudget: ". $row['DateOfBudget']. " Income: ". $row['Income'];
    }*/
    echo "Budget already exists for this date.";
} else {
    //$DateOfBudget = $todaysDate;
    $EstimatedProfit = trim($_POST['estimatedProfit']);
    $Expenses = trim($_POST['grossExpenses']);
    $Income = trim($_POST['grossIncome']);
    $Total = trim($_POST['netTotal']);
    $sql = "INSERT INTO budget (DateOfBudget, EstimatedProfit, Expenses, Income, Total) VALUES (CURDATE(), $EstimatedProfit, $Expenses, $Income, $Total)";

    if ($conn->query($sql) === TRUE) {
        echo "New Budget created successfully.";
    } else {
        
    }
}

//$conn->close();
?>
