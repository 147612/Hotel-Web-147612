<?php
include 'connect.php';
session_start(); // Start the session

// Initialize variables
$Username = $email = $contact = $gender = $yearOfBirth = $accountType = "";

// Check if the 'email' session variable is set
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email']; // Assuming you store user email in the session

    // Fetch the logged-in user's details
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $Username = $row['username'];
        $contact = $row['contact'];
        $gender = $row['gender'];
        $yearOfBirth = $row['yearOfBirth'];
        $accountType = $row['accountType'];
    } else {
        // Handle database query error
        echo "Error: " . mysqli_error($connect);
    }
}

// Update user details if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['new_username'];
    $new_email = $_POST['new_email'];
    $new_contact = $_POST['new_contact'];

    // Update the user's username and contact in the database
    $update_sql = "UPDATE users SET username = '$new_username', contact = '$new_contact' WHERE email = '$email'";
    if (mysqli_query($connect, $update_sql)) {
        // Update session variable with new email
        $_SESSION['email'] = $new_email;

        // Successful update
        $Username = $new_username;
        $email = $new_email;
        $contact = $new_contact;
    } else {
        // Handle error
        echo "Error updating username and contact: " . mysqli_error($connect);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="ndungujames" />
  <title>Profile</title>
  <link rel="stylesheet" href="weston.css">
</head>

<body>
    <nav>
        <ul>
            <div class="topnav">
                <li><a class= "active"style="text-decoration: none;color: black;" href="westonhotel.php">HOME</a></li>
                <li class="rightlink"><a style="text-decoration: none;color: black;" href="logout.php">Logout</a></li>
            </div>
        </ul>
    </nav>
<h2>Welcome, <?php echo $Username; ?></h2>
<main>
    <section>
        <p>Here are your details:</p>
        <div class="table-container">
            <table>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Year of Birth</th>
                    <th>Account Type</th>
                </tr>
                <tr>
                    <td><?php echo $Username; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $contact; ?></td>
                    <td><?php echo $gender; ?></td>
                    <td><?php echo $yearOfBirth; ?></td>
                    <td><?php echo $accountType; ?></td>
                </tr>
            </table>
            <h3>Edit Your Details</h3>
            <form method="post" action="">
                <label for="new_username">Username:</label><br>
                <input type="text" id="new_username" name="new_username" value="<?php echo $Username; ?>"><br>
                <label for="new_email">Email:</label><br>
                <input type="text" id="new_email" name="new_email" value="<?php echo $email; ?>"><br>
                <label for="new_contact">Contact:</label><br>
                <input type="text" id="new_contact" name="new_contact" value="<?php echo $contact; ?>"><br>
                <button type="submit">Save Changes</button>
            </form>
            <h3>Delete Your Account</h3>
            <form method="post" action="delete.php">
                <p>Are you sure you want to delete your account?</p>
                <button type="submit" name="delete_account">Delete Account</button>
            </form>
        </div>
    </section>
</main>
</body>
</html>
