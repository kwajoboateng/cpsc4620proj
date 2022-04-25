<?php require_once('navbar.php'); ?>
<HTML>
<body>
    <H1> My Channel </H1>
    <H3> <a href='playlist.php' target='_blank'>View your playlist!</a> </H3>
    <H3> <a href='favorites.php' target='_blank'>View your favorites!</a> </H3>
    <H3> My Videos </H3>
    <p> Enter your username to see your uploaded videos! </p>

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
        $username = $_POST["username"];
    }
    

    //search for all videos associated with this user
    $query = "SELECT * FROM Media WHERE username = '".$username."'";
    $response = mysqli_query($link,$query);
    if(!$response){
        echo "You have not uploaded any videos";
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