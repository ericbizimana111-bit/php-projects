<?php
session_start();
include 'connection.php';

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: read_users.php");
    exit();
}


if (isset($_POST['submit'])) {
    $first_name = trim($_POST['firstname']);
    $last_name = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    // Validation
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($gender)) {
        $_SESSION['error'] = "All fields are required!";
        header("Location: signup.php");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format!";
        header("Location: signup.php");
        exit();
    }

    if (strlen($password) < 6) {
        $_SESSION['error'] = "Password must be at least 6 characters long!";
        header("Location: signup.php");
        exit();
    }

    // Check if email already exists
    $check_email = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Email already exists!";
        header("Location: signup.php");
        exit();
    }

    // Hash password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $sql = "INSERT INTO users (fname, lname, email, password, gender) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $first_name, $last_name, $email, $hashed_password, $gender);

    if ($stmt->execute()) {
        // Get the inserted user ID
        $user_id = $stmt->insert_id;

        // Auto-login the user
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $first_name . ' ' . $last_name;
        $_SESSION['user_email'] = $email;

        $_SESSION['success'] = "Account created successfully! Welcome, " . $first_name . "!";
        header("Location: read_users.php");
        exit();
    } else {
        $_SESSION['error'] = "Error creating account: " . $conn->error;
        header("Location: signup.php");
        exit();
    }

    $stmt->close();
    $check_email->close();
}

$conn->close();
