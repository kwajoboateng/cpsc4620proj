<?php
/* Database */
define('DB_SERVER', 'mysql1.cs.clemson.edu');
define('DB_USERNAME', 'MeTube_n9lo');  //or n9Io
define('DB_PASSWORD', '1sqlisfun1');
define('DB_NAME', 'MeTube_qkk6');
 
/* Connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>