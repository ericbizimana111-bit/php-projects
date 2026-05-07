<?php
session_start();
include 'connection.php';

// Simulate POST data
$_POST['firstname'] = 'Test';
$_POST['lastname'] = 'User';
$_POST['email'] = 'test@example.com';
$_POST['password'] = 'password123';
$_POST['gender'] = 'Male';
$_POST['submit'] = 'submit';

// Include create.php logic
if (isset($_POST['submit'])) {
    $first_name = trim($_POST['firstname']);
    $last_name = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    // Validation
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($gender)) {
        echo "All fields are required!";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit();
    }

    if (strlen($password) < 6) {
        echo "Password must be at least 6 characters long!";
        exit();
    }

    // Check if email already exists
    $check_email = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        echo "Email already exists!";
        exit();
    }

    // Hash password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $sql = "INSERT INTO users (fname, lname, email, password, gender) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $first_name, $last_name, $email, $hashed_password, $gender);

    if ($stmt->execute()) {
        echo "Account created successfully!";
    } else {
        echo "Error creating account: " . $conn->error;
    }

    $stmt->close();
    $check_email->close();
}

$conn->close();
