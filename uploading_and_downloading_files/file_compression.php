<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    //       <!-- FILE COMPRESSION (ZIP)
    // 🔹 What Is Compression?

    // Compression:

    // Reduces file size

    // Packs multiple files into one

    // Creates .zip file

    // 🔹 What Is ZipArchive?

    // ZipArchive is a built-in PHP class for ZIP files.

    // Think of it as:

    // A tool to create ZIP containers.

    // 🔹 How It Works Internally

    // Create ZIP object

    // Open or create archive

    // Add files

    // Close archive

    // 🔹 Full Example
    $zip = new ZipArchive();

    if ($zip->open('archive.zip', ZipArchive::CREATE) === TRUE) {

        $zip->addFile('uploads/file1.txt');
        $zip->addFile('uploads/file2.jpg');

        $zip->close();

        echo "ZIP created.";
    }

    // 
    // Explanation:

    // Line	Meaning
    // new ZipArchive()	Create zip object
    // open()	Create or open zip file
    // addFile()	Add file into archive
    // close()	Save zip file
    // 🔷 REAL WORLD FLOW (IMPORTANT)

    // Here’s how a real system works:

    // User uploads files

    // Server stores them

    // Admin compresses them

    // User downloads ZIP

    // Everything is just:

    // Reading files

    // Writing files

    // Sending files

    // Packaging files

    // ⚠ Common Beginner Confusions
    // Confusion	Reality
    // Upload stores directly in folder	❌ No, first temp
    // Download needs only readfile	❌ Must set headers
    // Zip works automatically	❌ Must open + close
    // File validation optional	❌ Security risk
    // 🔥 Simple Mental Model

    // Think like this:

    // Upload = Receive file
    // Download = Send file
    // Compress = Pack files

    // That’s it. 


    ?>
</body>

</html>