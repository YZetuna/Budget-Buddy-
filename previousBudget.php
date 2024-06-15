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

// Function to fetch previous budgets from the database
function fetchPreviousBudgets($conn) {
    $sql = "SELECT * FROM budget ORDER BY TodaysDate DESC";
    $result = $conn->query($sql);
    $budgets = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $budgets[] = array(
                'Income' => $row['Income'],
                'Expenses' => $row['Expenses'],
                'Total' => $row['Total']
            );
        }
    }
    return $budgets;
}

// Function to fetch budget comparisons from the database
function fetchBudgetComparisons($conn) {
    $data = array();
    
    // Fetch data for one week ago
    $one_week_ago = date('Y-m-d', strtotime('-1 week'));
    $sql_one_week_ago = "SELECT * FROM budget WHERE TodaysDate = '$one_week_ago'";
    $result_one_week_ago = $conn->query($sql_one_week_ago);
    if ($result_one_week_ago->num_rows > 0) {
        $row_one_week_ago = $result_one_week_ago->fetch_assoc();
        $data['week1'] = array(
            'Income' => $row_one_week_ago['Income'],
            'Expenses' => $row_one_week_ago['Expenses'],
            'Total' => $row_one_week_ago['Total']
        );
    }

    // Fetch data for two weeks ago
    $two_weeks_ago = date('Y-m-d', strtotime('-2 weeks'));
    $sql_two_weeks_ago = "SELECT * FROM budget WHERE TodaysDate = '$two_weeks_ago'";
    $result_two_weeks_ago = $conn->query($sql_two_weeks_ago);
    if ($result_two_weeks_ago->num_rows > 0) {
        $row_two_weeks_ago = $result_two_weeks_ago->fetch_assoc();
        $data['week2'] = array(
            'Income' => $row_two_weeks_ago['Income'],
            'Expenses' => $row_two_weeks_ago['Expenses'],
            'Total' => $row_two_weeks_ago['Total']
        );
    }

    return $data;
}

// Handle actions based on query parameter
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    // Fetch previous budgets
    if ($action === 'fetchPreviousBudgets') {
        $budgets = fetchPreviousBudgets($conn);
        echo json_encode($budgets);
    }
    
    // Fetch budget comparisons
    if ($action === 'fetchBudgetComparisons') {
        $comparisons = fetchBudgetComparisons($conn);
        echo json_encode($comparisons);
    }
}

$conn->close();
?>
