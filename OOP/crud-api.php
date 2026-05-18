<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// Database connection details
$host = "localhost";
$db = "RCA_mis";
$user = "root";
$pass = "";

// Connect to database
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if($conn->connect_error)
{
    die(json_encode([
        "error" => "Connection failed: " . $conn->connect_error
    ]));
}

// Get request method


$method = $_SERVER['REQUEST_METHOD'];

switch($method)
{

    // =========================
    // INSERT NEW USER
    // =========================
    case 'POST':

        // Read JSON data from Postman
        $data = json_decode(file_get_contents("php://input"), true);

        // Get values
        $name = $conn->real_escape_string($data['name']);
        $email = $conn->real_escape_string($data['email']);

        // Insert query
        $sql = "INSERT INTO users(name, email)
                VALUES('$name', '$email')";

        // Execute query
        if($conn->query($sql))
        {
            echo json_encode([
                "message" => "User created successfully"
            ]);
        }
        else
        {
            echo json_encode([
                "error" => "Failed to create user"
            ]);
        }

    break;



    // =========================
    // DELETE USER
    // =========================
    case 'DELETE':

        // Get id from URL
        $id = $_GET['id'];

        // Delete query
        $sql = "DELETE FROM users WHERE id = $id";

        // Execute query
        if($conn->query($sql))
        {
            echo json_encode([
                "message" => "User deleted successfully"
            ]);
        }
        else
        {
            echo json_encode([
                "error" => "Failed to delete user"
            ]);
        }

    break;



    // =========================
    // INVALID METHOD
    // =========================
    default:

        echo json_encode([
            "error" => "Invalid request method"
        ]);

    break;
}

// Close connection
$conn->close();

?>