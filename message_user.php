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
  <li><a href="index.html">Login/Signup</a></li>
  <li><a href="messaging.php">Messaging</a></li>
  <li><a href="#mychannel">My Channel</a></li>
  <li><a href="upload.php">Upload</a></li>
  <li><a href="search.php">Search</a></li>
</ul>


<br><br><br>

<form action="store_message.php" method="post">
  <label for="name">Send To:</label><br>
  <input type ="text" id="user_to" name="user_to"><br>

  <label for="name">Message:</label><br>
  <input type ="text" id="message" name="message">
  <input type="submit" name="submit" value="Send Message" />
  <br>

</form>
