<?php
include 'connection.php';

$result = $conn->query("SELECT COUNT(*) as count FROM users");
$row = $result->fetch_assoc();
echo "Total users: " . $row['count'] . "<br>";

$result = $conn->query("SELECT id, fname, lname, email, created_at FROM users ORDER BY created_at DESC LIMIT 5");
while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row['id'] . " - " . $row['fname'] . " " . $row['lname'] . " (" . $row['email'] . ") - " . $row['created_at'] . "<br>";
}

$conn->close();
