<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Menu</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="javascript/dashboard.js" defer></script>
    <style>
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
        .container {
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
    <div class="header">
        <h1>Welcome to Budget Buddy</h1>
    </div>
    <div class="container">
        <ul class="menu">
            <li><a href="#" onclick="window.location.reload();">Home</a></li>
            <li>
                <a href="#">Budget</a>
                <ul>
                    <li><a href="createBudget.html">Create Budget</a></li>
                    <li><a href="previousPage.html">Previous Budgets</a></li>
                </ul>
            </li>
            <li><a href="#">Transactions</a></li>
            <li><a href="#">Accounts</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="notifications.html">Notifications</a></li>
            <li><a href="Calendar/index.html">Calendar</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="Logout.html">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="main-content">
            <h2><?php echo "Welcome " . $_SESSION["Username"];?>!<h2 id="welcomeMessage"></h2></h2>
        </div>
        <div class="sidebar">
            <canvas id="expenseChart" width="600" height="400"></canvas>
        </div>
    </div>
    <script>
        var ctx = document.getElementById('expenseChart').getContext('2d');
        var expenseChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Expenses',
                    data: [120, 139, 430, 519, 121, 59420, 32119, 3118, 100, 20, 21, 22],
                    borderColor: 'red',
                    borderWidth: 2,
                    fill: false,
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Expenses ($)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>