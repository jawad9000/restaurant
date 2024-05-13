<?php 
include '../controller/registration_validation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registration.css">
    <title>Registration Page</title>
   
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="#" method="post">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname"><br><?php echo $fname_err ?>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" ><br><?php echo $lname_err ?>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" ><br><?php echo $email_err ?>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" ><br><?php echo $dob_err ?>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" ><br><?php echo $phone_err ?>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" >
            <option>----Select Option----</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option> <?php echo $gender_err ?>
            </select><br>
            <?php echo $gender_err ?>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" ><br><?php echo $password_err ?>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" ><br><?php echo $confirm_password_err ?>

            <input type="submit" name="submit" value="Register">
        </form>
        <p>Already have an account? <a href="login.php">Go to login</a></p>
    </div>
</body>
</html>
