<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'connect.php'; // Make sure this includes your database connection

    // Assuming you have already stored the user's email in the session
    $email = $_SESSION["email"];

    // Delete user account and related records using the email
    $deleteQuery = "DELETE FROM users WHERE email='$email'";

    if (mysqli_query($connect, $deleteQuery)) {
        // Redirect to a logout page or another appropriate location
        header("Location: logout.php");
        exit();
    } else {
        echo "Error deleting account: " . mysqli_error($connect);
    }

    mysqli_close($connect); // Close the database connection
}
?>
