<?php
session_start();
include("../model/mydb.php");
if(isset($_SESSION['email'])) {
    // If logged in, redirect back to the previous page
    redirectToReferer();
}

// Other login page content here

function redirectToReferer() {
    if(isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        // If no referer is set, redirect to a default page
        header('Location: staff_view.php');
    }
    exit;
}
$error = ""; // Define the $error variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password
    if (empty($username) || empty($password)) {
        $error = "Username and password are required."; // Set error message
    } else {
        // Escape user inputs to prevent SQL injection
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);

        $mydb= new MyDB();
        $conobj=$mydb->openCon();

        // Prepare and bind parameters to prevent SQL injection
        $result=$mydb->checkUser("registration", $username, $password, $conobj);  

        if($result && $result->num_rows > 0) {
            // Fetch user data if login is successful
            $user_data = $result->fetch_assoc();
            
            // Set session variables
            $_SESSION['email'] = $user_data['email']; // Assuming email is stored in the database
            
            // Redirect to profile page
            header('Location: profile.php');
            exit; // Ensure script execution stops after redirection
        } else {
            $error= "Incorrect email or password. Please try again.";
        }
        // Close database connection
        $mydb->closeCon($conobj);
    }
}
?>
