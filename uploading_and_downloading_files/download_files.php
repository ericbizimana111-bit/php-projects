<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php

    //This tells browser:
    // This is binary data
    // Do NOT display
    // Download it
    // 🔹 Why Must Headers Be Sent First?
    // Because HTTP protocol requires:
    // Headers → then body.
    // If you echo something before header():
    // Download breaks

    // header("Content-Type: application/octet-stream");
    // header("Content-Disposition: attachment; filename=file.pdf");


    $file = "uploads/sample.pdf";

    if (file_exists($file)) {

        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . basename($file) . "\"");
        header("Content-Length: " . filesize($file));

        readfile($file);
        exit;
    };

    //========== Flow ===============//
    // Check file exists
    // Send headers
    // Read file
    // Output file bytes
    // Browser downloads





    ?>
</body>

</html>