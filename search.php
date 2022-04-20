<?php
include('config.php');
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

//convert string into an array of searchable terms
//!you copy and pasted this
function split($query){
    $query = trim(preg_replace("/(\s+)+/", " ", $query));
    $words = array();
    // expand this list with your words.
    $list = array("in","it","a","the","of","or","I","you","he","me","us","they","she","to","but","that","this","those","then");
    $c = 0;
    foreach(explode(" ", $query) as $key){
        if (in_array($key, $list)){
            continue;
        }
        $words[] = $key;
        if ($c >= 15){
            break;
        }
        $c++;
    }
    return $words;
}

//search database for keywords
function search($query){
    $query = trim($query);
    //ensure that the search is not empty
    if (mb_strlen($query)===0){
        echo "No results were found.";
        exit;
    }
    //limit the amount of characters that can be searched for to 200
    $query = subst($query,0,200);

    //convert string into searchable terms
    $terms = split($query);

    //compare each word searched to the keywords in the db
    foreach($terms as $i){
        //for each term, search the "keywords" field in the database
        //if theres a match, add that video to an array
    }
    
    //print the array of videos
}
?>

<html>
<body>
    <center>
    <form action="/search.php" method="get">
        <input type="text" name = "search" placeholder="Search for a video"/>
        <input type="submit" name = "search" />
    </form>
    </center>
</body>
</html>