<HTML>
<body>
    <H1> My Channel </H1>
    <H3> <a href='playlist.php' target='_blank'>View your playlist!</a> </H3>
    <H3> <a href='favorites.php' target='_blank'>View your favorites!</a> </H3>
    <H3> My Videos </H3>
</body>
</HTML>

<?php
function fetchvideos(){
    global $link;
    include 'config.php';

    //search for all videos associated with this user
    $query = "SELECT * FROM Media WHERE username = '".$username."'";
    $response = mysqli_query($link,$query);
    if(!$response){
        echo "You have not uploaded any videos";
    }
    else{ //! unfinished
        while($row = mysqli_fetch_assoc($response)){ 
            foreach($terms as $i){
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
}

//view your own channel
fetch

//link to playlists
//link to favorites
?>