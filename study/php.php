<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // echo date("Y-m-d H:i:s");
    // echo date("d/m/Y");
    // echo date("l, F j,Y");
    // echo date("F j Y g:i:a");
    // echo date("D M j G:i:s T Y");

    // $timestamp = mktime(15, 30, 0, 12, 25, 2024);
    // echo $timestamp;


    // $timestamp = mktime(0, 0, 0, 3, 15, 2026);
    // echo $timestamp;

    // //format timestamp

    // echo (date("Y-m-d H:i:s", $timestamp));


    // $christmas = mktime(0, 0, 0, 12, 25, 2024);

    // $today = time();

    // $daysLeft = ceil(($christmas - $today) / (60 * 60 * 24));

    // echo $daysLeft;


    // // Set timezone (important for correct results)
    // date_default_timezone_set("Africa/Kigali");

    // // Get current year
    // $currentYear = date("Y");

    // // Create timestamp for Christmas this year
    // $christmas = mktime(0, 0, 0, 12, 25, $currentYear);

    // // Get current timestamp
    // $today = time();

    // // If Christmas already passed this year, use next year
    // if ($today > $christmas) {
    //     $christmas = mktime(0, 0, 0, 12, 25, $currentYear + 1);
    // }

    // // Calculate days left
    // $daysLeft = ceil(($christmas - $today) / (60 * 60 * 24));

    // // Display result
    // echo "Days until Christmas: " . $daysLeft;


    // $brithday = mktime(0,0,0,3,25,2008);
    // echo "birthday:".date("l , F j ,Y", $brithday);

    // $text = ".....hello world....";
    // echo rtrim($text,".");


    // $url = "###www.example.com###";
    // echo trim($url,"#");

    // $data = "\n\t Hello \r\n";
    // echo trim($data); // "Hello"


    // $csvData = "john,Doe,john@example.com,30";
    // $userInfo = explode(",",$csvData);
    // print_r($userInfo);

    // for ($i = 1; $i <= 5; ++$i) {
    //     for ($j = 1; $j <= $i; ++$j) {
    //         echo "*";
    //     }
    //     echo "<br>";
    // }
    // for ($m = 4; $m <= 4; --$m) {
    //     for ($n = 1; $n <= $m; ++$n) {
    //         echo "*";
    //     }
    //     echo "<br>";
    // }



    // // Loop from 0 to 99
    // for ($i = 0; $i <= 99; $i++) {
    //     // Print number with two digits (add leading zero if needed)
    //     echo str_pad($i, 2, "0", STR_PAD_LEFT);

    //     // Add a comma except after the last number
    //     if ($i < 99) {
    //         echo ", ";
    //     }
    // }



for ($i = 0; $i <= 99; $i++) {
    // Print number with two digits
    echo str_pad($i, 2, "0", STR_PAD_LEFT);

    // Add comma and space
    if ($i < 99) {
        echo ", ";
    }

    // Add new line after numbers ending with 9
    if ($i % 20 == 19) { // 19, 39, 59, 79, 99
        echo "<br>";
    }
}



    







    ?>
</body>

</html>