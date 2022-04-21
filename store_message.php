<html>
<head>
<title>Login</title>
</head>


<?php
session_start();
require_once('config.php');
if(isset($_POST['submit'])){

  if(empty($_POST['message']) || empty($_POST['user_to'])){

  }
  else{
    $message = trim($_POST['message']);
    $to_user = trim($_POST['user_to']);

    $query = "SELECT user_id, username, password FROM User WHERE username = '" . $to_user . "'";
    $response = mysqli_query($link,$query);

    if($response){
        $row = mysqli_fetch_array($response);
        $to_user_id = $row['user_id'];
        $from_user_id = $_SESSION['use'];

        $query = "SELECT message_id FROM Message ORDER BY message_id DESC";
        $response = mysqli_query($link,$query);
        $row = mysqli_fetch_array($response);
        $id = $row['message_id'] + 1;


        $insert_message = "INSERT INTO Message (message_id, to_id, from_id, message)
        VALUES ('". $id . "', '" . $to_user_id . "', '" . $from_user_id . "', '". $message . "')";

        $response = mysqli_query($link,$insert_message);
        header("Location: messaging.php");
        exit();
    }
  }
}


?>
