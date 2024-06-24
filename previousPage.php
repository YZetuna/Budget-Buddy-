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

// get data from form input
$userName = $_SESSION["Username"];
$budget1Date = trim($_POST['budget1Date']);
$budget2Date = trim($_POST['budget2Date']);

//echo $budget1Date;
//echo $budget2Date;
//echo $userName;

// get account number
$sql = "SELECT AccountID FROM account WHERE account_name='$userName'";

if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $accountID = $row["AccountID"];
        //echo $accountID;
    }
}

// get information about the first budget

$sql = "SELECT * FROM budget WHERE AccountID=$accountID AND DateOfBudget='$budget1Date'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            // set variables for the first budget
            $budgetID1 = $row["BudgetID"];
            $income1 = $row["Income"];
            $expenses1 = $row["Expenses"];
            $total1 = $row["Total"];
            $estimatedProfit1 = $row["EstimatedProfit"];
            $dateOfBudget1 = $row["DateOfBudget"];
            // test that budget is being selected
            //echo "<br>";
            //echo $estimatedProfit1;
            // end test selecting budget
        }
    }

} else {
    echo "No budgets found for the first date.";
}
////////////////////////////////////////////////////////////////////

// get information about the second budget
$sql = "SELECT * FROM budget WHERE AccountID=$accountID AND DateOfBudget='$budget2Date'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            // set variables for the first budget
            $budgetID12 = $row["BudgetID"];
            $income2 = $row["Income"];
            $expenses2 = $row["Expenses"];
            $total2 = $row["Total"];
            $estimatedProfit2 = $row["EstimatedProfit"];
            $dateOfBudget2 = $row["DateOfBudget"];
            // test that budget is being selected
            //echo "<br>";
            //echo $estimatedProfit1;
            // end test selecting budget
        }
    }

    // calculate differences
$finalIncome = $income1 - $income2;
$finalExpenses = $expenses1 - $expenses2;
$finalTotal = $total1 - $total2;
    
    // display previous budget
    echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Previous Budgets</title>
    <link rel='stylesheet' href='css/styles.css'> <!-- Link of CSS file -->
    <script src='https://cdn.jsdelivr.net/npm/chart.js'></script> 
    <style>
        /* Additional CSS for positioning the date selector */
        .budgetList, .compareBudget1, .compareBudget2, .compareBudget3 {
            position: relative; /* Ensure relative positioning for child elements */
        }
        .budgetDate {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            width: 100%;
        }
        .container2 {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            width: 100%;
        }
        .menu {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }
        .menu > li {
            display: inline-block;
            margin-right: 20px;
            position: relative;
        }
        .menu > li > a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 18px;
            padding: 10px;
            border: 1px solid #333;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .menu > li > ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 5px;
        }
        .menu > li:hover > ul {
            display: block;
        }
        .menu > li > ul > li {
            margin: 5px 0;
        }
        .menu > li > ul > li > a {
            display: block;
            padding: 5px;
            color: #333;
            text-decoration: none;
        }
        .menu > li > ul > li > a:hover {
            background-color: #ccc;
        }
        .content {
            display: flex;
            width: 100%;
            max-width: 1200px;
            margin-top: 20px;
        }
        .main-content {
            flex: 3;
            padding: 20px;
        }
        .sidebar {
            flex: 1;
            padding: 20px;
        }
        .sidebar canvas {
            width: 100%;
            height: 400px;
        }
        .welcomeMessage {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class='header'>
        <h1>Welcome to Budget Buddy</h1>
    </div>
    <div class='container2'>
        <ul class='menu'>
            <li><a href='dashboard.php' onclick='window.location.reload();'>Home</a></li>
            <li>
                <a href='#'>Budget</a>
                <ul>
                    <li><a href='createBudget.html'>Create Budget</a></li>
                    <li><a href='previousPage.html'>Previous Budgets</a></li>
                </ul>
            </li>
            <!--<li><a href='#'>Transactions</a></li>
            <li><a href='#'>Accounts</a></li>-->
            <li><a href='about.html'>About</a></li>
            <li><a href='notifications.html'>Notifications</a></li>
            <li><a href='Calendar/index.html'>Calendar</a></li>
            <li><a href='contact.html'>Contact</a></li>
            <li><a href='Logout.html'>Logout</a></li>
        </ul>
    </div>
    <form action='previousPage.php' method='post'>
        <div class='prevBudget'>
            <!--<input type='text' id='username' name='username' placeholder='username' required>-->
            <h2 style='color: black;'>Previous Budgets </h2>
            <div class='budgetList'>
                <div class='budgetDate'>
                    <input type='date' id='budget1Date' name='budget1Date' required>
                </div>
                <h3>Budget 1:</h3>
                <!-- content for prev Budget1 -->
                <ul>
                    <li id='budget1Income' name='budget1Income'>Income: $income1</li>
                    <li id='budget1Expenses' name='budget1Expenses'>Expenses: $expenses1</li>
                    <li id='budget1Profit' name='budget1Profit'>Total Profit: $total1</li>
                </ul>
            </div>
            <div class='budgetList'>
                <div class='budgetDate'>
                    <input type='date' id='budget2Date' name='budget2Date' required>
                </div>
                <h3>Budget 2:</h3>
                <!-- content for prev Budget -->
                <ul>
                    <li>Income: $income2</li>
                    <li>Expenses: $expenses2</li>
                    <li>Total Profit: $total2</li>
                </ul>
            </div>
            <p><a href='createBudget.html'>Create a New Budget</a></p>
        </div>

        <div class='compareBudget'>
            <h2 style='color: black;'>Budget Comparison</h2>
            <div class='budgetContainer'>
                <div class='compareBudget1'>
                    <!-- Removed date input -->
                    <h3>Difference in Income</h3>
                    <!-- Income Difference goes here -->
                    $ $finalIncome
                </div>
                <div class='compareBudget2'>
                    <!-- Removed date input -->
                    <h3>Difference in Expenses</h3>
                    <!-- Expenses Difference goes here -->
                    $ $finalExpenses
                </div>
                <div class='compareBudget3'>
                    <!-- Removed date input -->
                    <h3>Difference in Total Profit</h3>
                    <!-- Total Profit Difference goes here-->
                    $ $finalTotal
                </div>
            </div>
        </div>
        
        <div class='chart'>
            <canvas id='myChart'></canvas>
        </div>
        
        <button>Submit</button>
    </form>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
                    datasets: [{
                        label: 'Income Trend',
                        data: [12000, 15000, 17000, 14000, 18000, 19000, 20000, 10000, 12000, 5000, 2000, 7000], //This is fixed data, Take data from database into here
                        borderColor: 'rgba(0, 123, 255, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
";

} else {
    echo "No budgets found for the second date. <a href='previousPage.html'>Click Here></a> to return to Previous Page.";
}



$conn->close();
?>
