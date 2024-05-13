<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to the login page
    redirectTo('login.php');
}

function redirectTo($url) {
    header("Location: $url");
    exit; // Stop further execution of the script
}
?>
