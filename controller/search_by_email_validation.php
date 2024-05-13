<?php
// Assuming you have some mechanism to search for the account based on the email
// For demonstration purposes, let's assume there's an array of accounts
$accounts = array(
    "example1@example.com" => "John Doe",
    "example2@example.com" => "Jane Smith"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email submitted via the form
    $searchEmail = $_POST["email"];

    // Check if the account exists
    if (array_key_exists($searchEmail, $accounts)) {
        $accountName = $accounts[$searchEmail];
        echo "<p>Account Name: $accountName</p>";
    } else {
        echo "<p>No account exists with this email</p>";
    }
}
?>
