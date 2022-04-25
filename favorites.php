<!DOCTYPE html>
<html>
<head>


</head>


<body>

<?php

  require_once('navbar.php');
  require_once('config.php');

  if(!empty($_SESSION['use'])){
    $query = "SELECT * FROM Favorites_List WHERE user_id = " . $_SESSION['use'];
    $response1 = mysqli_query($link, $query);

    if($response){
      while($row1 = mysqli_fetch_array($response1)){
        $query = "SELECT * FROM Media WHERE media_id = " . $row['media_id'];
        $response2 = mysqli_query($link, $query);
        while($row2 = mysqli_fetch_array($response2)){
                print  //this prints a "card"
                "<div class='card'>
                    <div class='container'>
                        <h4><b>".$row2['title']."</b></h4>
                        <p>".$row2['media_description']."</p>
                        <video width='320' height='240' controls>
                            <source src=".$row2['file_name']." type='video/mp4'>
                        </video>
                        <a href='comments.php' target='_blank'>Leave a comment!</a>
                    </div>
                </div>";

              }
          }
    }
    else{
      echo '<p>You have no favorited videos </p>';
    }
  }

?>
