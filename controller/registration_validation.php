<?php

include("../model/mydb.php");
// Define variables and initialize with empty values
$fname = $lname = $email = $dob = $phone = $gender = $password = $confirm_password = "";
$fname_err = $lname_err = $email_err = $dob_err = $phone_err = $gender_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if (isset($_REQUEST["submit"])) {
    // Validate First Name
    if (empty(trim($_POST["fname"]))) {
        $fname_err = "Please enter your first name.";
    } else {
        $fname = trim($_POST["fname"]);
    }

    // Validate Last Name
    if (empty(trim($_POST["lname"]))) {
        $lname_err = "Please enter your last name.";
    } else {
        $lname = trim($_POST["lname"]);
    }

    // Validate Email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email address.";
    } else {
        $email = trim($_POST["email"]);
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please enter a valid email address.";
        }
    }

    // Validate Date of Birth
    if (empty(trim($_POST["dob"]))) {
        $dob_err = "Please enter your date of birth.";
    } else {
        $dob = trim($_POST["dob"]);
    }

    // Validate Phone
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter your phone number.";
    } else {
        $phone = trim($_POST["phone"]);
        // Check if phone number is valid (for demonstration purpose, you can add your own validation logic)
    }

    // Validate Gender
    if ($_POST["gender"]=="----Select Option----") {
        $gender_err = "Please select your gender.";
    } else {
        $gender = $_POST["gender"];
    }

    // Validate Password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = "Password must have at least 8 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate Confirm Password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // If there are no errors, proceed to processing the data
    if (empty($fname_err) && empty($lname_err) && empty($email_err) && empty($dob_err) &&
     empty($phone_err) && empty($gender_err) && empty($password_err) && empty($confirm_password_err)) {
        
        {$mydb= new MyDB();
            $conobj= $mydb->openCon();
            $result=$mydb->insertData("registration",
            $_REQUEST["fname"],
            $_REQUEST["lname"],
            $_REQUEST["email"],
            $_REQUEST["dob"],
            $_REQUEST["phone"],
            $_REQUEST["gender"],
            $_REQUEST["password"],
            $conobj);
            if($result===TRUE)
            {
                echo "Account create Successfully";
            }
            else
            {
                echo "Error".$conobj->error;
            }
        }
    }
}
?>