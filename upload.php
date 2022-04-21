<HTML>
<head> 
    <title> Upload your Video! </title> 
</head>
<body>
<table border="1px" align="center">
       <tr>
           <td>
               <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <button type="submit" name="submit"> Upload</button>
                </form>
           </td>
       </tr>
       <!-- <tr>
           <td>
              <?php
              //global $link;
              //include 'config.php';
               //$query2 = "SELECT * FROM filedownload ";
               //$run2 = mysqli_query($link,$query2);
               
               //while($rows = mysqli_fetch_assoc($run2)){
                   ?>
               <a href="download.php?file=<?php echo $rows['filename'] ?>">Download</a><br>
               <?php
               //}
               ?>
           </td>
       </tr> -->
   </table>
</body>
</HTML>

<?php
    global $link;
    include 'config.php';

    if(isset($_POST['submit'])){
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $path = "uploads/".$fileName;
        
        $query = "INSERT INTO Media(file_name) VALUES ('$fileName')";
        $results = mysqli_query($link,$query);
        
        if($results){
            move_uploaded_file($fileTmpName,$path);
            echo "success";
        }
        else{
            echo "error".mysqli_error($link);
        }
        
    }
    
    ?>
