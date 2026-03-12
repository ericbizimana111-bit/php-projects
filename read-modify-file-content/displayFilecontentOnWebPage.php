<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // //=================using file_get_contents()=====================================//

    //     // | Part                           | Meaning                                  |
    //     // | ------------------------------ | ---------------------------------------- |
    //     // | `file_get_contents($filename)` | Reads entire file into a string          |
    //     // | `$content`                     | Stores the file content in PHP variable  |
    //     // | `nl2br($content)`              | Converts line breaks to HTML `<br>` tags |
    //     // | `echo`                         | Prints content to the web page           |

    //     //specify file path 
    //     $filename = "students.txt";

    //     //it reads the entire file 
    //     $content = file_get_contents($filename);

    //     //display on the webpage
    //     echo nl2br($content);





    //=================using file()=====================================================//

    $lines = file("students.txt"); //each line is an array element


    // foreach ($variable as $key => $value) {
    //     # code...
    // }

    $lines = file("students.txt"); // Each line is an array element

    foreach ($lines as $line) {
        echo nl2br($line);
    }




    // //================= fopen() + fgets() =====================================//



    $handle = fopen("students.txt", "r"); // Open file in read mode

    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            echo nl2br($line);
        }
        fclose($handle); // Always close file
    } else {
        echo "Unable to open file!";
    }



    $filename = "students.txt";

    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        echo "<h2>Student Scores:</h2>";
        echo "<pre>" . htmlspecialchars($content) . "</pre>";
    } else {
        echo "File does not exist.";
    }

    // Notes:
    // htmlspecialchars() ensures HTML characters in file do not break the page.
    // <pre> preserves formatting.
    // Output will be readable like original file.


    file_put_contents("students.txt", "New Student, 88\n", FILE_APPEND);




    ?>
</body>

</html>