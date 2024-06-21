<?php

session_start();
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

//$grossIncome = trim($_POST['grossIncome']);
$grossIncome = trim($_POST['grossIncome']);

//get accountID using username
$accountName = $_SESSION["Username"];

$sql = "SELECT AccountID FROM account WHERE account_name='$accountName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
      $accountID = $row["AccountID"];
    }
        $sql = "SELECT * FROM budget WHERE DateOfBudget=CURDATE()";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        echo "Budget already exists for this date. <a href='dashboard.html'>Click here</a> to return to the dashboard.";
    } else {
        
        $EstimatedProfit = trim($_POST['estimatedProfit']);
        $Expenses = trim($_POST['grossExpenses']);
        $Income = trim($_POST['grossIncome']);
        $Total = trim($_POST['netTotal']);
        try {
        if (!is_null($EstimatedProfit) && !is_null($Expenses) && !is_null($Income) && !is_null($Total)) {
          $sql = "INSERT INTO budget (DateOfBudget, AccountID, EstimatedProfit, Expenses, Income, Total) VALUES (CURDATE(), $accountID, $EstimatedProfit, $Expenses, $Income, $Total)";

          if ($conn->query($sql) === TRUE) {
              echo "New Budget created successfully. <a href='dashboard.php'>Click here</a> to return to the dashboard.";
              echo $_SESSION["Username"];
          } else {
              echo "There was an error processing the budget. Please try again.";
          }
        } else {
          echo "Please make sure all fields are filled out then try again";
        }
      } catch(Exception $e) {
        echo "Please make sure all fields are filled out then try again";
      }

    }
  } else {
    echo "0 results";
  }


$conn->close();
?>
