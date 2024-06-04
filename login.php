<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD']=='POST'){
  $email= $_POST['email'];
  $password= $_POST['pwd'];
  $sql= "SELECT*FROM users WHERE email= '$email'";
  $result= mysqli_query($connect, $sql);
  if ($result) {
    $rownumber= mysqli_num_rows($result);
    if($rownumber>0) {
      $row= mysqli_fetch_assoc($result);
      $email= $row['email'];
      $passwordhash= $row['password'];
      if (password_verify($password, $passwordhash)) {
        session_start();
        $_SESSION['email']= $email;
        $_SESSION['password']= $passwordharsh;
        header('Location:Westonhotel.php');
      }

    else{
      echo "email or password incorrect";
    }
  }
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
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <nav>
        <ul class="topnavlist">
            
            <li class="rightlink"><a style="text-decoration: none;color: black;" href="register.php">Register </a></li>
        </ul>
    </nav>
    <h1>Login</h1>
    <div class="login">
        <form method="post">
            <label for="Email">Email</label>
            <div><input type="email" name="email" Placeholder="Email address" required></div>
            
            <label for="Pwd">Password</label><br>
            <div><input type="password" id="pwd" name="pwd" required></div><br>

            <div class="button1">
                <!-- Disable the submit button when age is not valid -->
                <input type="submit" value="login" id="submitButton" />
            </div>
            <center><a style="text-decoration: none;color: black;"href="register.php">Don't have an account? Register</a></center>
        </form>

    </div>

    <p>Weston &copy;2023</p>

    
</body>
</html>
