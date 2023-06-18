<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Get the current date and time.
$current_date = date('Y-m-d');

// Get the user's birth date.
$birth_date = readline("Input your Date (YYYY-MM-DD): ");

// Calculate the difference between the current date and the user's birth date.
$difference = strtotime($current_date) - strtotime($birth_date);

// Convert the difference to years, months, and days.
$years = floor($difference / (365.25 * 24 * 60 * 60));
$months = floor(($difference % (365.25 * 24 * 60 * 60)) / (30.4375 * 24 * 60 * 60));
$days = floor(($difference % (30.4375 * 24 * 60 * 60)) / (24 * 60 * 60));

// Display the age in years, months, and days.
echo "You are $years years, $months months, and $days days old.";


?>
</body>
</html>


