<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Login Page</title>
    <?php include '../controller/login_validation.php'; ?> <!-- Include login validation -->
        <?php if(isset($error)) echo "<span class='error'>$error</span>"; ?> <!-- Display error message -->
</head>
<body>
    <form action="#" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        
        
        <input type="submit" value="Login">
         <!-- Forget Password link -->
    <a href="forget_password.php" class="forget-password">Forget Password?</a>

<!-- Register button -->
<a href="registration.php" class="register-button">Register</a>
    </form>

   
</body>
</html>
