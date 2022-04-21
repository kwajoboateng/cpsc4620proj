<!DOCTYPE html>
<html>
<head>

<style>
body {margin:0;}

div {
  padding-top: 80px;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}
</style>
</head>


<body>

<ul>
  <li><a href="login_page.html">Login/Signup</a></li>
  <li><a href="messaging.php">Messaging</a></li>
  <li><a href="#mychannel">My Channel</a></li>
  <li><a href="#upload">Upload</a></li>
</ul>


  <br><br><br>
<form action="message_user.php">
    <input type="submit" value="Send Message" />
</form>

<?php
  session_start();
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
