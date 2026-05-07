<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'connection.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Prevent users from deleting themselves
    if ($id == $_SESSION['user_id']) {
        $_SESSION['error'] = "You cannot delete your own account!";
        header("Location: read_users.php");
        exit();
    }

    // Delete user
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "User deleted successfully!";
    } else {
        $_SESSION['error'] = "Error deleting user: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
header("Location: read_users.php");
exit();
