<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    //==================================Searching in File Content=============================================//

    // foreach ($variable as $key => $value) {
    //     # code...
    // }


    // | Function                 | Purpose                         |
    // | ------------------------ | ------------------------------- |
    // | `file()`                 | Reads file into array of lines  |
    // | `strpos($line, $search)` | Checks if string exists in line |
    // | `!== false`              | Ensures we found a match        |


    // | Code                                       | Meaning                                             |
    // | ------------------------------------------ | --------------------------------------------------- |
    // | `foreach ($lines as $lineNumber => $line)` | Loop through each line with index                   |
    // | `strpos($line, $search)`                   | Find position of `$search` in line                  |
    // | `!== false`                                | Ensures match found (even at start of line)         |
    // | `($lineNumber + 1)`                        | Convert 0-based index to human-readable line number |
    // | `echo ... "<br>"`                          | Display line on web page with line break            |




    //strpos() is case sensitive( stripos()  )
    //Use preg_match() if you need regex search.

    
    $filename = "students.txt";
    $lines = file($filename); //Each line as array Elment 
    $search = "John";
    foreach ($lines as $lineNumber/*index of the line */ => $line/*the values of the array */) {
        if (strpos($line, $search) !== false) {
            echo "found '$search'  on line " . ($lineNumber + 1) . ":" . $line . "<br>";
        }
    }

    

    ?>
</body>

</html>