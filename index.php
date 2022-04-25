<!DOCTYPE html>
<html>
<head>
</head>

<body>

<?php require_once('navbar.php'); ?>

<form action="login.php" method="post">
  <label for="name">Username:</label><br>
  <input type ="text" id="name" name="name"><br>

  <label for="pass">Password:</label><br>
  <input type ="text" id="pass" name="pass"><br>

  <input type="submit" name="submit" value="Login"><br><br>

  <label for="signup_name">Username:</label><br>
  <input type ="text" id="signup_name" name="signup_name"><br>

  <label for="signup_name">First Name:</label><br>
  <input type ="text" id="signup_firstname" name="signup_firstname"><br>

  <label for="signup_name">Last Name:</label><br>
  <input type ="text" id="signup_lastname" name="signup_lastname"><br>

  <label for="phone">Password:</label><br>
  <input type ="text" id="signup_pass" name="signup_pass"><br>

  <label for="phone">Confirm Password:</label><br>
  <input type ="text" id="conf_signup_pass" name="conf_signup_pass"><br>

  <input type="submit" name="Signup" value="Signup">

</form>
</body>
</html>
