<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    for ($row = 1; $row <= 7; $row++) {
        for ($col = 1; $col <= 5; $col++) {

            
            if ($col == 1 || $col == 5) {
                echo "*";
            }
            
            else if ($row == 4) {
                echo "*";
            }
            
            else {
                echo " ";
            }
        }
        echo "<br>";
    }
    ?>
</body>

</html>