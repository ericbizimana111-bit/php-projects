<?php

include 'connection.php';

if (isset($_POST['submit'])) {

    $first_name = $_POST['firstname'];
    $last_name  = $_POST['lastname'];
    $email      = $_POST['email'];
    $password   = md5($_POST['password']);
    $gender     = $_POST['gender'];

    $sql = "INSERT INTO users (fname, lname, email, password, gender)
            VALUES ('$first_name', '$last_name', '$email', '$password', '$gender')";

    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<html>

<body style="display:flex; flex-direction:column; align-items:center; justify-content:center; height:100vh; background:#f0f4f8; font-family:Arial, sans-serif;">

    <a href="signup.html" class="btn" style="
        display:inline-block;
        padding:15px 30px;
        margin:15px 0;
        background: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: 0.3s;
        font-size: 18px;
    ">Home</a>

    <a href="users.php" class="btn" style="
        display:inline-block;
        padding:15px 30px;
        margin:15px 0;
        background: #28a745;
        color: #fff;
        text-decoration: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: 0.3s;
        font-size: 18px;
    ">Creation Page</a>

    <script>
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(btn => {
            btn.addEventListener('mouseover', () => btn.style.transform = 'scale(1.05)');
            btn.addEventListener('mouseout', () => btn.style.transform = 'scale(1)');
        });
    </script>

</body>

</html>