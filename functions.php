<?php


// Function to sanitize user input
// function sanitizeInput($input)
// {
//     print_r($input);
//     die();
//     $input = trim($input);
//     $input = stripslashes($input);
//     $input = htmlspecialchars($input);
//     return $input;
// }
function generateOrderNumber() {
    $timestamp = time();
    $randomNumber = mt_rand(1000, 9999);
    return 'ORD-' . $timestamp . '-' . $randomNumber;
}
// Function to check if a user is logged in
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Function to redirect to a specific page
function redirect($url)
{
    header("Location: $url");
    exit();
}

// Function to display success alert
function displaySuccessAlert($message)
{
    echo '<div class="alert alert-success">' . $message . '</div>';
}

// Function to display error alert
function displayErrorAlert($message)
{
    echo '<div class="alert alert-danger">' . $message . '</div>';
}

// Function to check if a mobile number is valid
function isValidMobileNumber($mobile)
{
    return preg_match('/^[0-9]{10}$/', $mobile);
}

// Function to format the price
function formatPrice($price)
{
    return number_format($price, 2);
}

// Add more functions as per your project requirements

?>
