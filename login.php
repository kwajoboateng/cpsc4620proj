<?php
session_start();
?>

<html>
<head>
<title>Login</title>
</head>

<body>
<?php
//session_start();
require_once('config.php');


  if(isset($_POST['submit'])){

    if(empty($_POST['name']) || empty($_POST['pass'])){

    }
    else{
      $user = trim($_POST['name']);
      $pass = trim($_POST['pass']);

      $query = "SELECT user_id, username, password FROM User WHERE username = '" . $user . "'";
      $response = mysqli_query($link,$query);

      if($response){
          $row = mysqli_fetch_array($response);
          if($row["username"] == $user){
            if($row["password"] == $pass){
              $_SESSION['use'] = $row["user_id"];
              echo "<p>Log in successful</p>";
            }
            else{
              echo "<p>incorrect username or password</p>";
            }
          }
          else{
            echo "<p>incorrect username or password</p>";
          }
      }
    }
  }
  if(isset($_POST['Signup'])){

    if(empty($_POST['signup_name']) || empty($_POST['signup_pass']) || empty($_POST['conf_signup_pass'])){

    }
    else{

      $signup_user = trim($_POST['signup_name']);
      $signup_firstname = trim($_POST['signup_firstname']);
      $signup_lastname = trim($_POST['signup_lastname']);
      $signup_pass = trim($_POST['signup_pass']);
      $signup_pass = trim($_POST['conf_signup_pass']);

      $query = "SELECT user_id, username, password FROM User WHERE username = '" . $signup_user . "'";
      $response = mysqli_query($link,$query);

      if($response != NULL){
        $query = "SELECT user_id, username, password FROM User ORDER BY user_id DESC";
        $response = mysqli_query($link,$query);
        $row = mysqli_fetch_array($response);
        $id = $row['user_id'] + 1;

        $insert_user = "INSERT INTO User (user_id, firstname, lastname, username, password, friendslist_id, blocklist_id)
        VALUES ('". $id . "', '" . $signup_firstname . "', '" . $signup_lastname . "', '". $signup_user . "', '". $signup_pass . "', '". $id . "', '". $id . "')";
        $idk = mysqli_query($link,$insert_user);
        $_SESSION['use'] = $id;

        echo "<p>Signup Successful!</p>";
        //set session variable
        //$_SESSION["loggedin"] = "true";

      }
      else{
        echo "<p>Username taken</p>";
      }

    }
}

header("Location: login_page.html");
exit();

?>
</body>
</html>
