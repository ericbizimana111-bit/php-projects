<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'year1c';
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    exit('Connection failed:' . mysqli_connect_error());
}
echo 'Connected successfully <br>';

//mysqli_close($conn);

?>