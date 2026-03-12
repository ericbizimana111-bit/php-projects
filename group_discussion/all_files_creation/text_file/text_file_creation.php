<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
//====================== TEXT FILE CREATION ====================================//  
    // $file = fopen("filecreated.txt", "w"); //overwriting the file/replacing text inside the file if it exist
    // //and creating it if it doesnot exist
    // fwrite($file, "hello my names are ERIC");
    // fwrite($file, "this is overwritten text");
    // fclose($file);
    // echo "the textfile has been created";
    

    $file = fopen("example.txt", "w"); // "w" creates file or overwrites
    fwrite($file, "Hello World\n");
    fwrite($file, "This is a text file created using PHP.");
    echo "Text file created successfully.";


    // file_put_contents("example.txt","hello why are you putting me in examole.txt file");
    // echo "the text is successfully put in example.txt"
    //✔ Simpler
    // ✔ Automatically creates file
    // ✔ Automatically closes file



    ?>
</body>

</html>


<?php
