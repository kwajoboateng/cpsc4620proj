<?php 
require_once('navbar.php');
include 'config.php';
//User with a Web browser should be able to download and view multimedia files available in the MeTube system
//Give the name of the video that you want to download



//then click the link/button to download it 
function search($input){
    global $link;
    include 'config.php';
    $query = "SELECT file_name FROM Media WHERE title = '".$input."'";
        $response = mysqli_query($link,$query);
        if(!$response){
            echo "<h1> We could not find a keyword match. </h1>";
        }
        else{
            $row = mysqli_fetch_row($response);
            $path = $row[0];

            echo "<p><a href=download.php?path='".$path."'>Download PDF file</a></p>";

            if(isset($_GET['path'])){

            clearstatcache();

            if(file_exists($path)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($path).'"');
                header('Content-Length: ' . filesize($path));
                header('Pragma: public');

                flush();

                readfile($path,true);

                exit();
            }
            else{
                echo "The file you requested does not exist.";
            }
        }
    }
}
?>

<HTML>
<body>
    <H1> Please enter the name of the video that you would like to download! </H1>
    <form action="" method="post">
        <input type="text" name="query" placeholder="Search title"/>
        <input type="submit" value="Search"/>
    </form>
</body>
</HTML>