"use strict";
// Strict command
// Creating a Date object
// Hours are in Military
// Format month, day, year, hrs, mins, secs
let currentDate = new Date();

// Get the day, month, and year
let day = currentDate.getDate();
// Month long is full name of the month
let month = currentDate.toLocaleString('default', { month: 'long' });
let year = currentDate.getFullYear();

// Get the current hour
let hour = currentDate.getHours();

// Determine the time of day message
let timeOfDayMessage;
if (hour < 12) {
    timeOfDayMessage = "Good morning!";
} else if (hour < 18) {
    timeOfDayMessage = "Good afternoon!";
} else {
    timeOfDayMessage = "Good evening!";
}

// Get the welcome message element
let welcomeMessage = document.getElementById("welcomeMessage");

// Set the welcome message text
welcomeMessage.textContent = "Today is " + month + " " + day + ", " + year + ". " + timeOfDayMessage;
