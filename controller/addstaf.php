<?php
include("../model/mydb.php");

// Define variables and initialize with empty values
$username = $password = $email = $fullName = $position = "";
$username_err = $password_err = $email_err = $fullName_err = $position_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate Password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = "Password must have at least 8 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate Email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate Full Name
    if (empty(trim($_POST["fullName"]))) {
        $fullName_err = "Please enter your full name.";
    } else {
        $fullName = trim($_POST["fullName"]);
    }

    // Validate Position
    if (empty(trim($_POST["position"]))) {
        $position_err = "Please enter a position.";
    } else {
        $position = trim($_POST["position"]);
    }

    // If there are no errors, proceed to add staff
    if (empty($username_err) && empty($password_err) && empty($email_err) && empty($fullName_err) && empty($position_err)) {
        // Create instance of MyDB class
        $myDB = new MyDB();
        $conobj = $myDB->openCon(); // Corrected variable name
        // Attempt to add staff
        $result = $myDB->addStaff($username, $password, $email, $fullName, $position, $conobj);

        if ($result === true) {
            echo "Staff added successfully.";
        } else {
            echo "Error adding staff: " . $myDB->getError(); // Corrected method call
        }
    }
}
?>
