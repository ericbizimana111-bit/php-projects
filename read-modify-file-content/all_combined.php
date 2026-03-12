<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // | Stage  | Description             |
    // | ------ | ----------------------- |
    // | Open   | Connect to file         |
    // | Read   | Load content            |
    // | Modify | Process in memory       |
    // | Write  | Save back to disk       |
    // | Close  | Release resource        |
    // | Delete | Remove file from system |

    $filename = ("data3.txt");

    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        $content = str_replace("hello", "hi", $content);
        file_put_contents($filename, $content);
        echo "saved changes successfully";
    } else {
        echo "file does not exist";
    }

    ?>
</body>

</html>