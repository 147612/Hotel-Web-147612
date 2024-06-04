<?php
$server= 'localhost';
$user= 'root';
$password= '';
$db= 'hotel_web';

$connect = mysqli_connect($server, $user, $password, $db);
if(!$connect) {
  die(mysqli_error($connect));
}
?>