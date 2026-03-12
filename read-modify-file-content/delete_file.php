<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        //     Deleting Files
    // 🔹 Function Used
    // unlink("filename.txt");

    // 🔹 What unlink() Does

    // Removes file from filesystem

    // Deletes file permanently

    // Returns true if successful

    // Returns false if failed

    // 🔹 Example

    if (unlink("data.txt")) {
        echo "File deleted successfully.";
    } else {
        echo "Error deleting file.";
    }

    // 🔹 Safe Delete (Recommended)
    // Always check if file exists:

    if (file_exists("data.txt")) {
        unlink("data.txt");
    }
    
    
    ?>
</body>
</html>