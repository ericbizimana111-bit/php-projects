<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'year1c';

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
// Removed echo for cleaner output
