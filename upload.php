<HTML>
<head> 
    <title> Upload a File! </title>
</head>
<body>
<H1> Uplaod your File: </H1>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="category">Category:</label><br>
    <select name="category" id="category">
        <option value="Music">Music</option>
        <option value="Sports">Sports</option>
        <option value="Learning">Learning</option>
        <option value="Movies & Shows">Movies & Shows</option>
        <option value="Gaming">Gaming</option>
        <option value="News">News</option>
        <option value="Fashion & Beauty">Fashion & Beauty</option>
    </select>
    <br>
    //!make this a required field
    <label for="username">Your Username:</label><br>
    <input type="text" id="username" name="username"><br>

    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br>

    <label for="description">Description:</label><br>
    <input type="text" id="description" name="description"><br>

    <label for="keyword">Keyword:</label><br>
    <input type="text" id="keyword" name="keyword"><br>

  
    <label for="file">Select image to upload:</label><br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</HTML>

<?php
global $link;
include 'config.php';
include 'find_user_info.php';
$destination_dir = "uploads/";
$userfile = $destination_dir . basename($_FILES["fileToUpload"]["name"]);  
$uploadOk = 1;
$FileType = strtolower(pathinfo($userfile,PATHINFO_EXTENSION));

//get value of category
if(isset($_POST["category"])){
    $category_input = $_POST["category"];
}

//get value of username
if(isset($_POST["username"])){
  $username = $_POST["username"];
}

//get value of title
if(isset($_POST["title"])){
    $title_input= $_POST["title"];
}

//get value of description
if(isset($_POST["description"])){
    $description_input = $_POST["description"];
}

//get value of keyword
if(isset($_POST["keyword"])){
  $keyword_input = $_POST["keyword"];
}

if(isset($_POST["submit"])) {
    echo "Uploading your file now!\n";
    $uploadOk = 1;
}

// Check if file already exists
if (file_exists($userfile)) {
  echo "Sorry, file already exists.\n";
  $uploadOk = 0;
}

// If file size is larger than a gigabyte
if ($_FILES["fileToUpload"]["size"] > 1000000000) {
  echo "Sorry, your file is too large.\n";
  $uploadOk = 0;
}

// Make sure it's the correct type
if($FileType != "jpg" && $FileType != "mp3" && $FileType != "mp4" && $FileType != "png") {
  echo "Sorry, only JPG, PNG, MP3 & MP4 files are allowed.\n";
  $uploadOk = 0;
}

// If there's an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.\n";
// otherwise, upload the file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $userfile)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.\n";
  } else {
    echo "Sorry, there was an error uploading your file.\n";
  }

  //generate random number for ids
  $mediaid = rand(1, 100000);
  $keywordid = rand(1,100000);
  $commentid = rand(1,100000);
  $date = date("Y/m/d");
  $userid = finduserid($username);
  $channelid = findchannelid($username);

  //save to comments table
  $query = "INSERT INTO Comments (comment_id, user_id, comment) VALUES (".$commentid.",".$userid.",' ')";
  $response = mysqli_query($link,$query);
  if(!$response){
    echo "Insert to comments table has failed\n";
    }

  //save to keywords table
  $query = "INSERT INTO Keywords (keyword_id, media_id, keyword) VALUES (".$keywordid.",".$mediaid.",'".$keyword_input."')";
  $response = mysqli_query($link,$query);
  if(!$response){
    echo "Insert to keywords table has failed\n";
    }


  //save to media table
  $query = "INSERT INTO Media (media_id, channel_id, category, keyword_id, comment_id, username, file_type, 
  file_name, title, media_description, upload_date)
  VALUES (".$mediaid.", ".$channelid.", '".$category_input."',".$keywordid.",".$commentid.",'".$username."', '".$FileType."','".$userfile."','".$title_input."',
  '".$description_input."','".$date."')";
  
  $response = mysqli_query($link,$query);

  if(!$response){
    echo "Insert to media table has failed\n";
    }
    else{
    echo "insert to media table was successful!\n";
    }
}
?>