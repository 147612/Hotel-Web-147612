<?php
include 'connect.php'; // Make sure you have a valid database connection here

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Username = $_POST['Username'];
    $password = password_hash($_POST['pwd'], PASSWORD_DEFAULT); // Changed to match the field name
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $yearOfBirth = $_POST['YearOfBirth']; // Fixed capitalization
    $accountType = $_POST['accountType'];
    
    $sql = "INSERT INTO users(Username, password, email, contact, gender, yearOfBirth, accountType) 
            VALUES('$Username', '$password', '$email', '$contact', '$gender', '$yearOfBirth', '$accountType')";
    $result = mysqli_query($connect, $sql);
    
    if ($result) {
        header("Location: login.php");
        exit; // Make sure to exit after redirection
    } else {
        echo "Not successful";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="dbit">
    <title>Register</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <nav>
        <ul class="topnavlist">
           
            <li class="rightlink"><a style="text-decoration: none;color: black;"href="login.php">Already have an account? Login</a></li>
        </ul>
    </nav>
    <h1>Register</h1>
    <div class="login">
        <form method="post" action="register.php">
            <label for="Username">Username</label><br>
            <div><input type="text" name="Username" Placeholder="Type your Name" required></div><br>

            <label for="Pwd">Password</label><br>
            <div><input type="password" id="pwd" name="pwd" required></div>

            <label for="Email">Email</label>
            <div><input type="email" name="email" Placeholder="Email address" required></div>

            <label for="Contact">Contact</label>
            <div><input type="text" pattern="[0-9]{10}" name= "contact" Placeholder="Your number (10 digits)" required></div>

            <label for="Gender">Gender</label>
            <div>
                <label>Male</label>
                <input type="radio" name="gender" value="Male">
                <label>Female</label>
                <input type="radio" name="gender" value="Female">
            </div>

            <label for="YearOfBirth">Year of Birth</label>
            <div><input type="number" name="YearOfBirth" Placeholder="YYYY" min="1900" max="2023" required></div>

            <label for="AccountType">Select Account Type:</label>
            <div>
                <select name="accountType" required>
                    <option value="" disabled selected>Select an option</option>
                    <option value="Customer">Customer</option>
                    <option value="HotelStaff">Hotel Staff</option>
                </select>
            </div>

            <div class="button1">
                <input type="submit" value="Register" id="submitButton" />
            </div>
        </form>
    </div>

    <p>Weston &copy;2023</p>

    
</body>
</html>
