<?php
include("../model/mydb.php");


$myDB = new MyDB();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email is empty
    if(empty($_POST['email'])) {
        echo "Please enter an email.";
    } else {
        // Open database connection
        $conn = $myDB->openCon();

        // Escape user inputs for security
        $email = $conn->real_escape_string($_POST['email']);

        // Check if email exists in the database
        $result = $myDB->viewUser("registration", $email, $conn);

        if ($result->num_rows > 0) {
            // Email found, fetch and display name
            $row = $result->fetch_assoc();
            echo "Name: " . $row['first_name'] . " " . $row['last_name'];
        } else {
            // Email not found
            echo "Email is not registered.";
        }

        // Close database connection
        $conn->close();
       
    }

    
}


if (isset($_POST['continue_clicked']) && $_POST['continue_clicked'] === 'true') {
    echo "\ndukse";
    $otp=rand(100000,1000000);
    $_SESSION['otp']=$otp;
    $subject = "Restaurant security password";
    $body = $otp." is your OTP";
    $headers = "From: gardenaid29@gmail.com";
    
    mail("aminulislamsagor3@gmailcom", $subject, $body, $headers);
}

?>