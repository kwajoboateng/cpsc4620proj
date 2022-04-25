<HTML>
<body>
    <H1> Browse Metube </H1>
</body>
</HTML>

<?php
    global $link;
    include 'config.php';

    //display all videos listed in Media Table
    $query = "SELECT * FROM Media";
    $response = mysqli_query($link,$query);
    if(!$response){
        echo "There are no videos available";
    }
    else{ 
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
?>