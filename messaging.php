<!DOCTYPE html>
<html>
<head>


</head>


<body>

<?php require_once('navbar.php'); ?>

<form action="message_user.php">
    <input type="submit" value="Send Message" />
</form>

<?php

  require_once('config.php');

  $id = $_SESSION['use'];

  $query = "SELECT message_id, message, to_id, from_id FROM Message WHERE to_id = '" . $id . "' ORDER BY message_id DESC";
  $response = @mysqli_query($link,$query);

  while($row = mysqli_fetch_array($response)){
    $query2 = "SELECT user_id, username FROM User WHERE user_id = '" . $row['from_id'] . "'";
    $response2 = @mysqli_query($link,$query2);
    $from = mysqli_fetch_array($response2);
    echo '<h>From: ' . $from['username'] . '</h>';
    echo '<p>' . $row['message'] . '</p><br><br>';
  }
?>
