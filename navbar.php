<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #717D7E;
  color: white;
}

.topnav-right {
  float: right;
}
</style>

<div class="topnav">
  <a href="search.php">Search</a>
  <a href="messaging.php">Messaging</a>
  <a href="#mychannel">My Channel</a>
  <div class="topnav-right">
    <?php
    session_start();
    if(!empty($_SESSION['use'])){
      echo '<a href="logout.php">Logout</a>';
    }
    else{
      echo '<a href="index.php">Login</a>';
    }
    ?>
    <a href="favorites.php">Favorites</a>
    <a href="#mychannel">My Channel</a>
    <a href="update_user.php">Settings</a>
  </div>
</div>
