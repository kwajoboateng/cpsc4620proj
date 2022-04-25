<?php require_once('navbar.php'); ?>
<HTML>
<body>
    <?php if (isset($result)) { ?>
        <h1> Result: <?php echo $result ?></h1>
    <?php } ?>
    <form action="" method="post">
        <input type="text" name="query" placeholder="Search term"/>
        <input type="submit" value="Search"/>
    </form>
</body>
</HTML>

<?php

/*
Task:
Search media files based on keywords provided by the user who uploaded the media file. 
You may also implement the system to allow search based on the keywords found in the title and description of the media file.

Plan:
Instruct use to enter a few key words
User enters word(s).
Words get stored into array
for each word, check keywords provided by uploader
if so, return video files 

*/

//search database for keywords
function search($input){
    global $link;
    include 'config.php';

    //if($link == NULL){ echo "It's NULL in function";} else{ echo "It's not NULL in function";}

    $input = trim($input);

    //convert string into array of items
    $terms = explode(" ", $input);

    //compare each word searched to the keywords in the db
    foreach($terms as $i){
        //for each term, search the "keywords" field in the database
        $query = "SELECT * FROM Keywords WHERE keyword = '".$i."'";
        $response = mysqli_query($link,$query);
        if(!$response){
            echo "<h1> We could not find a keyword match. </h1>";
        }
        else{
            //you can use $row = mysqli_fetch_row($response), and each element in row is a value
            $row = mysqli_fetch_row($response);
            $keyword_id = $row[0];
            $media_id = $row[1];

            //if theres a match, get that media id
            //use media id to grab video
            $query = "SELECT * FROM Media WHERE media_id = ".$media_id."";
            $result = mysqli_query($link,$query);
            if(!$result) { echo "<h1> We could not find a media match. </h1>";}
            while($row = mysqli_fetch_assoc($result)){
                echo "Here 2!"; 
                //$category = $row['category'];
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
    // Free result set
    mysqli_free_result($response);
    //print the array of videos
    }
}

if (isset($_POST['query'])) {
    $result = search($_POST['query']);
} 

?>
