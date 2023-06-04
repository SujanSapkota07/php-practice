<?php
// Define a function to sanitize and validate user input
function sanitize_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    // Add additional validation or sanitization steps as needed
    return $input;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and sanitize the user input
    $fname = sanitize_input($_POST["fname"]);
    $lname = sanitize_input($_POST["lname"]);
    $email = sanitize_input($_POST["email"]);

    // Perform further validation or processing as required
    // For example, you can validate the email format using filter_var()
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email format
        // Handle the error appropriately (e.g., display an error message)
        echo '<p class="error">Invalid email format</p>';
    } else {
        // Email is valid, proceed with further processing
        // Save the data to the database or perform other operations
        if (strlen($fname) > 8) {
            // Name length is greater than 8, proceed with further processing
            echo "<p>First Name: " . $fname . "</p>";
        } else {
            // Name length is less than or equal to 8, display an error message
            echo '<p class="error">Name should be greater than 8 characters.</p>';
        }

        echo "<p>Last name: " . $lname . "</p>";
        echo "<p>Email: " . $email . "</p>";
    }
}
