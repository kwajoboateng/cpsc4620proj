<?php

function finduserid($username){
    global $link;
    include 'config.php';
    //given a username, you can find the user id
    //use username to find user id in user table
    $query = "SELECT user_id FROM User WHERE username = '".$username."'";
    $response = mysqli_query($link,$query);
    if(!$response){
        echo "We could not find a match.";
    } else{ 
        while($row = mysqli_fetch_assoc($response)){ 
            $user_id = $row['user_id'];
            return $user_id;
            
        }
    }
}

function findchannelid($username){
    //given a username, you can find their channel id
    //user user id to find channel id in channel table
    global $link;
    include 'config.php';
    $user_id = finduserid($username);

    $query = "SELECT channel_id FROM Channel WHERE user_id = '".$user_id."'";
    $response = mysqli_query($link,$query);
    if(!$response){
        echo "We could not find a match.";
    } else{ 
        while($row = mysqli_fetch_assoc($response)){ 
            $channel_id = $row['channel_id'];
            return $channel_id;
            
        }
    }

}
?>