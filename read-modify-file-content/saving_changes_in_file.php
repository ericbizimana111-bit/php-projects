<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //In PHP, saving changes means writing modified data back to a file on disk.
    // Important principle:
    // PHP does NOT automatically save modifications.
    // You must explicitly write data using file-writing functions.

    // fopen()                   it open the file 
    // fwrite()                  it write data inside the file 
    // file_put_contents()       write entire content directly 
    // fflush()                  force <output> buffer to write to file
    // fclose()                  finalize and close the file 


    // | Step       | Action                      |
    // | ---------- | --------------------------- |
    // | `fopen()`  | Opens file pointer          |
    // | `"w"` mode | Clears old content          |
    // | `fwrite()` | Writes new bytes            |
    // | `fclose()` | Saves and releases resource |

    // | Mode   | Behavior                 |
    // | ------ | ------------------------ |
    // | `"w"`  | Overwrite file           |
    // | `"a"`  | Append to end            |
    // | `"r+"` | Read + write (no delete) |

    $handle = fopen("students.txt", "w");
    fwrite($handle, "hello my names are bizimana eric");
    fwrite($handle, "hello my names are bizimana eric");
    fclose($handle);

    //using file_put_content
    file_put_contents("data.txt", "updated content");
    //to append 
    file_put_contents("data.txt", "  more data to add", FILE_APPEND);
    //closes the file automatically


    //modify and save the file
    $content = file_get_contents("data2.txt");
    $content = str_replace("old", "new", $content);
    file_put_contents("data2.txt", $content);

    //  Closing Files
    // 🔹 Concept

    // When you open a file using fopen(), PHP allocates a file handle (resource).

    // You must close it using:

    // fclose($handle);

    // 🔹 Why Closing Is Important
    // Reason	Explanation
    // Free memory	Releases system resource
    // Prevent corruption	Ensures buffer is flushed
    // Avoid file lock	Unlocks file for others

    // If you forget to close:

    // PHP usually closes automatically at script end

    // But this is BAD PRACTICE

    // 🔹 Example
    $handle = fopen("data.txt", "r");
    $data = fread($handle, filesize("data.txt"));
    fclose($handle);   // Good practice













    ?>
</body>

</html>