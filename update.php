<?php
session_start(); // Start the session if not already started

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Assuming you have already connected to the database
  include 'connect.php';

  // Get updated account details from the form
  $Username = $_POST["username"];
  $email = $_POST["email"];
  $contact = $_POST["contact"];
  // ... Include other updated fields

  // Get the logged-in user's ID from the session
  $email = $_SESSION["email"]; // Adjust the session variable name as needed

  // Update user account in the database
  $updateQuery = "UPDATE users SET username='$username', email='$email', contact='$contact' WHERE email='$email'";

  if (mysqli_query($connect, $updateQuery)) {
    header("Location: profile.php");
    exit();
  } else {
    echo "Error updating account: " . mysqli_error($connect);
  }

  // Close the database connection
  mysqli_close($connect);
}
?>
