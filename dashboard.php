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
    <link rel="stylesheet" href="styles.css">
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
        /* Slideshow styles */
        .slideshow-container {
            position: relative;
            max-width: 100%;
            max-height: 400px;
            overflow: hidden;
            margin-top: 20px;
        }
        .mySlides {
            display: none;
            width: 100%;
        }
        .mySlides img {
            width: 100%;
            vertical-align: middle;
        }
        .numbertext {
            position: absolute;
            top: 0;
            color: #f2f2f2;
            font-size: 20px;
            padding: 8px 12px;
            background-color: #333;
        }
        .text {
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
        /* Dots/circles style */
        .dot-container {
            text-align: center;
            margin-top: 20px;
        }
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .active, .dot:hover {
            background-color: #717171;
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

            <!-- Slideshow container -->
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="images/temp truck.jpeg" alt="Truck 1">
                    <div class="text">Truck 1</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="images/temp truck.jpeg" alt="Truck 2">
                    <div class="text">Truck 2</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="images/temp truck.jpeg" alt="Truck 3">
                    <div class="text">Truck 3</div>
                </div>

                <!-- Previous and Next buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>

            <!-- Dot container -->
            <div class="dot-container" style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>

        </div>
    </div>
    <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");

        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
    }

    // Automatic slideshow
    var slideIndexAuto = 0;
    var timeout;

    function autoShowSlides() {
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndexAuto++;
        if (slideIndexAuto > slides.length) {slideIndexAuto = 1}    
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndexAuto-1].style.display = "block";  
        dots[slideIndexAuto-1].className += " active";
        timeout = setTimeout(autoShowSlides, 5000); // Change image every 5 seconds
    }

    autoShowSlides(); // Start automatic slideshow on page load

    function pauseSlides() {
        clearTimeout(timeout); // Pause automatic slideshow
    }

    function resumeSlides() {
        autoShowSlides(); // Resume automatic slideshow
    }

    </script>
</body>
</html>