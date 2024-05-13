<?php
include("../model/mydb.php");

// Define variables and initialize with empty values
$id = $username = $password = $email = $fullName = $position = "";
$username_err = $password_err = $email_err = $fullName_err = $position_err = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    // Create instance of MyDB class
    $myDB = new MyDB();
    $conobj = $myDB->openCon();

    // Fetch staff member details by ID
    $staff = $myDB->getStaffById($id, $conobj);
    if ($staff) {
        // Assign retrieved data to variables
        $username = $staff['username'];
        $password = $staff['password'];
        $email = $staff['email'];
        $fullName = $staff['full_name'];
        $position = $staff['position'];
    } else {
        // Redirect to error page or handle error as required
        echo "Error: Staff member not found.";
        exit();
    }

    // Close the database connection
    //$myDB->closeCon($conobj);
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate ID
    if (empty(trim($_POST["id"]))) {
        $id_err = "ID is required.";
    } else {
        $id = trim($_POST["id"]);
    }

    // Validate Username, Password, Email, Full Name, Position as before...
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

    // If there are no errors, proceed to update staff
    if (empty($username_err) && empty($password_err) && empty($email_err) && empty($fullName_err) && empty($position_err)) {
        // Create instance of MyDB class
        $myDB = new MyDB();
        $conobj = $myDB->openCon();

        // Attempt to update staff
        $result = $myDB->updateStaff($id, $username, $password, $email, $fullName, $position, $conobj);

        if ($result) {
            echo "Staff updated successfully.";
        } else {
            echo "Error updating staff: " . $conn->error;
        }

        // Close the database connection
        //$myDB->closeCon($conobj);
    }
}
?>
