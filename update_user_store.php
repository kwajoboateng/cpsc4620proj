<?php
session_start();
require_once('config.php');


  if(isset($_POST['submit'])){
    $id = $_SESSION['use'];
    if(!empty($_POST['firstname'])){
      $new_first = trim($_POST['firstname']);
      $query = "UPDATE User SET firstname = '" . $new_first . "' WHERE user_id = " . $id;
      $response = mysqli_query($link,$query);
    }
    if(!empty($_POST['lastname'])){
      $new_last = trim($_POST['lastname']);
      $query = "UPDATE User SET lastname = '" . $new_last . "' WHERE user_id = " . $id;
      $response = mysqli_query($link,$query);
    }
    if(!empty($_POST['password']) && !empty($_POST['password_check'])){
      $new_pass = trim($_POST['password']);
      $new_pass_check = trim($_POST['password_check']);

      if($new_pass == $new_pass_check){
        $query = "UPDATE User SET password = '" . $new_pass . "' WHERE user_id = " . $id;
        $response = mysqli_query($link,$query);
      }
    }
    header('Location: update_user.php');
    exit();
  }
