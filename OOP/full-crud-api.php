<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// ======================
// DATABASE CONNECTION
// ======================

$conn = new mysqli("localhost", "root", "", "RCA_mis");

// Check connection
if ($conn->connect_error) {
    die(json_encode([
        "error" => "Database connection failed"
    ]));
}

// ======================
// REQUEST METHOD
// ======================

$method = $_SERVER['REQUEST_METHOD'];

// ======================
// API ROUTES
// ======================

switch ($method) {

    // ===================================
    // GET ALL USERS
    // ===================================
    case "GET":

        $sql = "SELECT * FROM users";

        $result = $conn->query($sql); //sends that SQL command to MySQL.

        $users = [];

        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        echo json_encode($users);

        break;





    // ===================================
    // INSERT USER
    // ===================================
    case "POST":

        $data = json_decode(file_get_contents("php://input"), true);

        $name = $data["name"];
        $email = $data["email"];

        $sql = "INSERT INTO users(name,email)
                VALUES('$name','$email')";

        if ($conn->query($sql)) {
            echo json_encode([
                "message" => "User inserted successfully"
            ]);
        } else {
            echo json_encode([
                "error" => "Insert failed"
            ]);
        }

        break;





    // ===================================
    // UPDATE USER
    // ===================================
    case "PUT":

        $data = json_decode(file_get_contents("php://input"), true);

        $id = $data["id"];
        $name = $data["name"];
        $email = $data["email"];

        $sql = "UPDATE users
                SET
                name='$name',
                email='$email'
                WHERE id=$id";

        if ($conn->query($sql)) {
            echo json_encode([
                "message" => "User updated successfully"
            ]);
        } else {
            echo json_encode([
                "error" => "Update failed"
            ]);
        }

        break;





    // ===================================
    // DELETE USER
    // ===================================
    case "DELETE":

        $id = $_GET["id"];

        $sql = "DELETE FROM users WHERE id=$id";

        if ($conn->query($sql)) {
            echo json_encode([
                "message" => "User deleted successfully"
            ]);
        } else {
            echo json_encode([
                "error" => "Delete failed"
            ]);
        }

        break;





    // ===================================
    // INVALID METHOD
    // ===================================
    default:

        echo json_encode([
            "error" => "Invalid request method"
        ]);

        break;
}

// Close database connection
$conn->close();
