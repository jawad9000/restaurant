<?php 
include '../controller/addstaf.php';
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo empty($id) ? "Add" : "Edit"; ?> Staff Member</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }
        .error {
            color: #ff0000;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo empty($id) ? "Add" : "Edit"; ?> Staff Member</h1>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
            <?php if (!empty($username_err)) { ?>
                <span class="error"><?php echo $username_err; ?></span>
            <?php } ?>
            <label>Password:</label>
            <input type="password" name="password" value="<?php echo $password; ?>">
            <?php if (!empty($password_err)) { ?>
                <span class="error"><?php echo $password_err; ?></span>
            <?php } ?>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
            <?php if (!empty($email_err)) { ?>
                <span class="error"><?php echo $email_err; ?></span>
            <?php } ?>
            <label>Full Name:</label>
            <input type="text" name="fullName" value="<?php echo $fullName; ?>">
            <?php if (!empty($fullName_err)) { ?>
                <span class="error"><?php echo $fullName_err; ?></span>
            <?php } ?>
            <label>Position:</label>
            <input type="text" name="position" value="<?php echo $position; ?>">
            <?php if (!empty($position_err)) { ?>
                <span class="error"><?php echo $position_err; ?></span>
            <?php } ?>
            <input type="submit" name="submit" value="<?php echo empty($id) ? "Add" : "Update"; ?> Staff">
        </form>
    </div>
</body>
</html>
<?php include "footer.php"; // Include the footer file ?>