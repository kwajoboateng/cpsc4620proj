<HTML>
<body>
    <H1> My Playlists </H1>
    <p> Enter your username to see your playlists! </p>

    <form method="post">
        <label for="username">Your Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <input type="submit" name="button" class="button" value="Submit" />
    </form>
</body>
</HTML>

<?php
if(array_key_exists('button', $_POST)) {
    fetchvideos();
}

function fetchvideos(){
    global $link;
    include 'config.php';
    
    if(isset($_POST["username"])){
        echo "got username";
        $username = $_POST["username"];
    }
    

    //search for all playlists videos (gotta change the query below)
    $query = "SELECT * FROM Media WHERE username = '".$username."'";
    $response = mysqli_query($link,$query);
    if(!$response){
        echo "You have not added any videos to your playlist";
    }
    else{ 
        //! Gotta figure out how to loop through the row variable to get every video
        //! that is returned (if multiple are returned)
        while($row = mysqli_fetch_assoc($response)){ 
                print  //this prints a "card" 
                "<div class='card'>
                    <div class='container'>
                        <h4><b>".$row['title']."</b></h4> 
                        <p>".$row['media_description']."</p>
                        <video width='320' height='240' controls>
                            <source src=".$row['file_name']." type='video/mp4'>
                        </video>
                        <a href='comments.php' target='_blank'>Leave a comment!</a>
                    </div>
                </div>";
            
        }
    }
}
?>