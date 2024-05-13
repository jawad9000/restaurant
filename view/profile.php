<?php
include "header.php"; 
include "../controller/profile.php";
// Include the header file
?>

<h1>Welcome to your profile</h1>
<div class="profile-details">
    <strong>First Name:</strong> <?php echo $fname; ?><br>
    <strong>Last Name:</strong> <?php echo $lname; ?><br>
    <strong>Email:</strong> <?php echo $email; ?><br>
    <strong>Date of Birth:</strong> <?php echo $dob; ?><br>
    <strong>Phone:</strong> <?php echo $phone; ?><br>
    <strong>Gender:</strong> <?php echo $gender; ?><br>           
    <a href="login.php">Logout</a>
</div>

<?php include "footer.php"; // Include the footer file ?>
