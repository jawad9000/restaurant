<?php
include("../model/mydb.php");

// Check if the user is logged in
if(isset($_SESSION['email'])) {
    // Create an instance of MyDB class
    $myDB = new MyDB();

    // Connect to the database
    $conn = $myDB->openCon();

    // Check if the database connection was successful
    if(!$conn) {
        die("Database connection failed: " . $myDB->getError());
    }

    // Fetch user details
    $result = $myDB->viewUser("registration", $_SESSION['email'], $conn);

    // Check if the query was successful
    if($result) {
        if ($result->num_rows > 0) {
            // Output data of the first (assuming unique email) row
            $row = $result->fetch_assoc();
            $fname = $row['first_name'];
            $lname = $row['last_name'];
            $email = $row['email'];
            $dob = $row['dob'];
            $phone = $row['phone'];
            $gender = $row['gender'];
            $password = $row['password'];
        } else {
            echo "No user found with this email.";
        }
    } else {
        echo "Error executing query: " . $myDB->getError();
    }

    // Close the database connection
    $conn->close();
}
?>
