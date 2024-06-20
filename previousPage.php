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

// get data from form input
$userName = trim($_POST['username']);
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
    
    echo "success!";
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
    
    echo "success!";
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

} else {
    echo "No budgets found for the first date.";
}
    
    // display previous budget
    echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Previous Budgets</title>
                <link rel='stylesheet' href='css/styles.css'> <!-- Link of CSS file -->
                <style>
                    /* Additional CSS for positioning the date selector */
                    .budgetList, .compareBudget1, .compareBudget2 {
                        position: relative; /* Ensure relative positioning for child elements */
                    }
                    .budgetDate {
                        position: absolute;
                        top: 10px;
                        right: 10px;
                    }
                </style>
            </head>
            <body>
                <form action='previousPage.php' method='post'>
                    
                <div class='prevBudget'>
                    <input type='text' id='username' name='username' placeholder='username' required>
                    <h2 style='color: black;'>Previous Budgets </h2>
                    <div class='budgetList'>
                        <div class='budgetDate'>
                            <input type='date' id='budget1Date' name='budget1Date' required>
                        </div>
                        <h3>Budget 1:</h3>
                        <!-- content for prev Budget1 -->
                        <ul>
                            <li id='budget1Income' name='budget1Income' >Income: $ $income1;</li>
                            <li id='budget1Expenses' name='budget1Expenses'>Expenses: $ $expenses1</li>
                            <li id='budget1Profit' name='budget1Profit'>Total Profit: $ $total1</li>
                        </ul>
                    </div>
                    <div class='budgetList'>
                        <div class='budgetDate'>
                            <input type='date' id='budget2Date' name='budget2Date' required>
                        </div>
                        <h3>Budget 2:</h3>
                        <!-- content for prev Budget -->
                        <ul>
                            <li id='budget2Income' name='budget2Income' >Income: $ $income2;</li>
                            <li id='budget2Expenses' name='budget2Expenses'>Expenses: $ $expenses2</li>
                            <li id='budget2Profit' name='budget2Profit'>Total Profit: $ $total2</li>
                        </ul>
                    </div>
                    <p><a href='createBudget.html'>Create a New Budget</a></p>
                </div>

                <div class='compareBudget'>
                    <h2 style='color: black;'>Budget Comparison</h2>
                    <div class='budgetContainer'>
                        <div class='compareBudget1'>
                            <div class='budgetDate'>
                                <input type='date'>
                            </div>
                            <h3>Budget 1 Week Ago:</h3>
                            <!-- content for Budget 1 here -->
                            <ul>
                                <li>Income:</li>
                                <li>Expenses:</li>
                                <li>Total Profit:</li> 
                            </ul>
                        </div>
                        <div class='compareBudget2'>
                            <div class='budgetDate'>
                                <input type='date'>
                            </div>
                            <h3>Budget 2 Weeks Ago:</h3>
                            <!-- content for Budget 2 here -->
                            <ul>
                                <li>Income:</li>
                                <li>Expenses:</li>
                                <li>Total Profit:</li>
                            </ul>
                        </div>
                    </div><br>
                    <button>Submit</button>
                </div>
            </form>
            </body>
            </html>
            ";

$conn->close();
?>
