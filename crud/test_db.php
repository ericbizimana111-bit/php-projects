<?php
include 'connection.php';

if ($conn->connect_error) {
    echo 'Connection failed: ' . $conn->connect_error;
} else {
    echo 'Connected successfully<br>';
    $result = $conn->query('SHOW TABLES LIKE "users"');
    if ($result->num_rows > 0) {
        echo 'users table exists<br>';
    } else {
        echo 'users table does not exist<br>';
    }
}
