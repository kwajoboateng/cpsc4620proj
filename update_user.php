<!DOCTYPE html>
<html>
<head>


</head>


<body>

<?php

require_once('navbar.php');
require_once('config.php');



$id = $_SESSION['use'];

$query = "SELECT firstname, lastname, password FROM User WHERE user_id = '" . $id . "' ORDER BY user_id DESC";
$response = @mysqli_query($link,$query);

if($row = mysqli_fetch_array($response)){
  echo '<p>First Name: ' . $row['firstname'] . '</p><br>';
  echo '<form action="update_user_store.php" method="post">';
  echo '<label for="firstname">New First Name:</label><br>';
  echo '<input type ="text" id="firstname" name="firstname"><br><br>';

  echo '<p>Last Name: ' . $row['lastname'] . '</p><br>';
  echo '<label for="lastname">New Last Name:</label><br>';
  echo '<input type ="text" id="lastname" name="lastname"><br><br>';

  echo '<p>Password: ' . $row['password'] . '</p><br>';
  echo '<label for="password">New Password:</label><br>';
  echo '<input type ="text" id="password" name="password"><br><br>';

  echo '<label for="password_check">New Password Confirm:</label><br>';
  echo '<input type ="text" id="password_check" name="password_check"><br>';
  echo '<input type="submit" name="submit" value="Sumbit Changes" />';
  echo '</form>';

}

?>
