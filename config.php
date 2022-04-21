<?php
/* Database */
define('DB_SERVER', 'mysql1.cs.clemson.edu');
define('DB_USERNAME', 'MeTube_n9lo'); 
define('DB_PASSWORD', '1sqlisfun1');
define('DB_NAME', 'MeTube_qkk6');
 
/* Connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
?>