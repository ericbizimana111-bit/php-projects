<?php
session_start();

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: read_users.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CRUD System</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: #0f0c29;
        background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow-x: hidden;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 80%, rgba(120, 119, 255, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(255, 107, 107, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 40% 40%, rgba(0, 255, 195, 0.2) 0%, transparent 40%);
        animation: float 20s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes float {

        0%,
        100% {
            transform: translate(0, 0) rotate(0deg);
        }

        33% {
            transform: translate(30px, -30px) rotate(5deg);
        }

        66% {
            transform: translate(-20px, 20px) rotate(-5deg);
        }
    }

    .container {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 40px;
        border-radius: 24px;
        position: relative;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        width: 100%;
        max-width: 450px;
        z-index: 1;
    }

    .container::before {
        content: '';
        position: absolute;
        top: -1px;
        left: -1px;
        right: -1px;
        bottom: -1px;
        background: linear-gradient(135deg, #667eea, #764ba2, #f093fb, #667eea);
        border-radius: 24px;
        z-index: -1;
        opacity: 0.3;
    }

    .logo {
        text-align: center;
        margin-bottom: 30px;
    }

    .logo-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 15px;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .logo-text {
        font-size: 1.75rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #f093fb 50%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    h2 {
        text-align: center;
        color: white;
        margin-bottom: 30px;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .form-group {
        margin-bottom: 20px;
        position: relative;
    }

    .form-group i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.5);
        font-size: 1rem;
    }

    input {
        width: 100%;
        padding: 15px 15px 15px 45px;
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.05);
        color: white;
        font-size: 1rem;
        font-family: inherit;
        transition: all 0.3s ease;
    }

    input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    input:focus {
        outline: none;
        border-color: #667eea;
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
    }

    .btn {
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    }

    .btn:active {
        transform: translateY(0);
    }

    .links {
        text-align: center;
        margin-top: 25px;
    }

    .links a {
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.3s ease;
    }

    .links a:hover {
        color: #667eea;
    }

    .links span {
        color: rgba(255, 255, 255, 0.5);
        margin: 0 10px;
    }

    .error {
        background: rgba(245, 101, 101, 0.2);
        border: 1px solid rgba(245, 101, 101, 0.3);
        color: #fc8181;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }

    .success {
        background: rgba(72, 187, 120, 0.2);
        border: 1px solid rgba(72, 187, 120, 0.3);
        color: #68d391;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }

    @media (max-width: 480px) {
        .container {
            margin: 20px;
            padding: 30px 25px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
    }
</style>

<body>
    <div class="container">
        <div class="logo">
            <div class="logo-icon">?</div>
            <div class="logo-text">CRUD System</div>
        </div>

        <h2>Welcome Back</h2>

        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="error">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo '<div class="success">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']);
        }
        ?>

        <form action="login_process.php" method="POST">
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" name="login" class="btn">Login</button>
        </form>

        <div class="links">
            <a href="signup.php">Don't have an account? Sign Up</a>
            <span>|</span>
            <a href="index.php">Home</a>
        </div>
    </div>
</body>

</html>