<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!--
| Property   | Meaning             |
| ---------- | ------------------- |
| `name`     | Original file name  |
| `tmp_name` | Temporary file path |
| `size`     | File size in bytes  |
| `error`    | Upload error code   |
| `type`     | MIME type           |

| Risk              | Prevention                     |
| ----------------- | ------------------------------ |
| File overwrite    | Rename file (e.g., `uniqid()`) |
| Malicious files   | Validate extension & MIME      |
| Large file attack | Check file size                |
| Code execution    | Never upload to public root    |

| Key      | Meaning            |
| -------- | ------------------ |
| name     | Original file name |
| tmp_name | Temporary path     |
| size     | File size in bytes |
| type     | MIME type          |
| error    | Upload status      |

-->

    <form action="uploaded_files.php" method="POST" enctype="multipart/form-data">

        <input type="file" name="myfile">
        <br>
        <input type="submit" value="upload">

    </form>

    <?php

    // What does isset() check?
    // It checks:
    // Did the browser send a file field named "myfile"?
    // If user did not select file → this block will not execute.



    // $_FILES is a superglobal associative array that PHP automatically creates when a user uploads a file through an HTML form.

    // It contains all information about uploaded files.

    // You do NOT create it.
    // PHP creates it during the HTTP request processing stage.

    if (isset($_FILES['myfile'])) {

        $fileName = $_FILES['myfile']['name'];

        //This is VERY IMPORTANT.
        // PHP does NOT store file directly in your "uploads" folder.
        // It stores it in a temporary system directory.
        $tempName = $_FILES['myfile']['tmp_name'];


        //This tells you if something went wrong.
        $fileError = $_FILES['myfile']['error'];
        $fileSize = $_FILES['myfile']['size'];

        if ($fileError === 0) {

            if ($fileSize > 2000000) {
                die("File too large.");
            }

            $destination = "uploads/" . $fileName;

            move_uploaded_file($tempName, $destination);

            echo "Upload successful.";
        }
    }


    /*

if (isset($_FILES['myfile'])) {

    $fileName = basename($_FILES['myfile']['name']);
    $tempName = $_FILES['myfile']['tmp_name'];
    $fileError = $_FILES['myfile']['error'];
    $fileSize = $_FILES['myfile']['size'];

    if ($fileError === 0) {

        if ($fileSize > 2000000) {
            die("File too large.");
        }

        $destination = "uploads/" . $fileName;

        if (move_uploaded_file($tempName, $destination)) {
            echo "Upload successful.";
        } else {
            echo "Upload failed.";
        }
    }
}



    // | Step               | Question            |
    // | ------------------ | ------------------- |
    // | isset()            | Did file come?      |
    // | error === 0        | Did upload succeed? |
    // | size check         | Is it allowed size? |
    // | move_uploaded_file | Save permanently    |


 */



    ?>

</body>

</html>