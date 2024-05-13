<?php 
include '../controller/forget_password_validation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/forget_password.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form id="emailSearchForm" method="post" action="">
        <label for="email">Enter Email:</label>
        <input type="email" id="email" name="email" > <!-- Added 'required' attribute -->
        <button type="submit">Search</button>
        <p id="errorMessage" style="color: red; display: none;"></p> <!-- Error message -->
        <p id="searchResult" style="display: none;"></p> <!-- Name display -->
        <button id="continueBtn" style="display: none;">Continue</button> <!-- Continue button -->
    </form>

    <script>
        document.getElementById("emailSearchForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var email = document.getElementById("email").value;
            var errorMessage = document.getElementById("errorMessage"); // Get the error message element
            var searchResult = document.getElementById("searchResult"); // Get the search result element
            var continueBtn = document.getElementById("continueBtn"); // Get the continue button element

            // Check if email is empty
            if (email.trim() === "") {
                errorMessage.textContent = "Please enter an email."; // Set error message
                errorMessage.style.display = "block"; // Display error message
                searchResult.style.display = "none"; // Hide search result
                continueBtn.style.display = "none"; // Hide continue button
                return; // Exit function
            } else {
                errorMessage.style.display = "none"; // Hide error message if email is not empty
            }
            
            // Display loading message while processing
            searchResult.textContent = "Searching...";
            searchResult.style.display = "block";
            continueBtn.style.display = "none";
            
            // Make an AJAX call to handle the form submission
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../controller/forget_password_validation.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Handle the response
                        var response = xhr.responseText;
                        if (response.trim() !== "Email is not registered.") {
                            // If email is found, display the name and show the continue button
                            searchResult.textContent = response;
                            continueBtn.style.display = "block";
                        } else {
                            // If email is not found, display the message
                            searchResult.textContent = response;
                            continueBtn.style.display = "none"; // Hide continue button
                        }
                    } else {
                        console.error("Error:", xhr.statusText);
                    }
                }
            };
            xhr.send("email=" + email);
        });

        // Add functionality to the continue button

document.getElementById("continueBtn").addEventListener("click", function() {
    
    // Send a POST request to a PHP script
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../controller/forget_password_validation.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            // Handle the response from the PHP script if needed
            console.log(xhr.responseText);
        }
    };

    // Set the parameters to send in the request
    var params = "continue_clicked=true&email=" + encodeURIComponent(document.getElementById("email").value);

    // Send the request with the parameters
    xhr.send(params);
});


    </script>
</body>
</html>
