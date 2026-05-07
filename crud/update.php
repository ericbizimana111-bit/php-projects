<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'connection.php';

$user = null;
$error = '';
$success = '';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Fetch user data
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
    } else {
        $_SESSION['error'] = "User not found!";
        header("Location: read_users.php");
        exit();
    }
    $stmt->close();
}

if (isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $gender = $_POST['gender'];

    // Validation
    if (empty($fname) || empty($lname) || empty($email) || empty($gender)) {
        $error = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    } else {
        // Check if email already exists for another user
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
        $stmt->bind_param("si", $email, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Email already exists!";
        } else {
            // Update user
            $stmt = $conn->prepare("UPDATE users SET fname = ?, lname = ?, email = ?, gender = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $fname, $lname, $email, $gender, $id);

            if ($stmt->execute()) {
                $_SESSION['success'] = "User updated successfully!";
                header("Location: read_users.php");
                exit();
            } else {
                $error = "Error updating user: " . $conn->error;
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - CRUD System</title>
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

    /* Sidebar Styles */
    .sidebar {
        width: 280px;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        padding: 30px 20px;
        min-height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
    }

    .sidebar-logo {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 40px;
        padding: 0 10px;
    }

    .logo-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .logo-text {
        font-size: 1.25rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #f093fb 50%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .sidebar-title {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: rgba(255, 255, 255, 0.4);
        margin-bottom: 15px;
        padding: 0 10px;
    }

    .nav-menu {
        list-style: none;
    }

    .nav-item {
        margin-bottom: 8px;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 14px 18px;
        border-radius: 12px;
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));
        color: white;
        border: 1px solid rgba(102, 126, 234, 0.3);
    }

    .nav-link.active {
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }

    .nav-icon {
        font-size: 1.2rem;
        width: 24px;
        text-align: center;
    }

    /* Main Content */
    .main-content {
        flex: 1;
        margin-left: 280px;
        padding: 40px;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 40px;
        border-radius: 24px;
        position: relative;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
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

    .header {
        text-align: center;
        margin-bottom: 30px;
    }

    h1 {
        background: linear-gradient(135deg, #667eea 0%, #f093fb 50%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 1.75rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .subtitle {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9rem;
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

    input,
    select {
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

    input::placeholder,
    select option {
        color: rgba(255, 255, 255, 0.5);
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: #667eea;
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
    }

    select {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 15px center;
        background-repeat: no-repeat;
        background-size: 16px;
        padding-right: 45px;
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

    .nav-links {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-top: 25px;
    }

    .btn-secondary {
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.2);
        color: white;
        padding: 12px 24px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        border-color: #667eea;
        background: rgba(102, 126, 234, 0.1);
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

    @media (max-width: 900px) {
        .sidebar {
            width: 70px;
            padding: 20px 10px;
        }

        .sidebar-logo {
            justify-content: center;
        }

        .logo-text,
        .sidebar-title,
        .nav-link span {
            display: none;
        }

        .nav-link {
            justify-content: center;
            padding: 14px;
        }

        .main-content {
            margin-left: 70px;
        }
    }

    @media (max-width: 768px) {
        .container {
            padding: 25px;
        }
    }
</style>

<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-icon">?</div>
            <span class="logo-text">CRUD</span>
        </div>

        <div class="sidebar-title">Menu</div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="index.php" class="nav-link">
                    <span class="nav-icon">?</span>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="signup.php" class="nav-link">
                    <span class="nav-icon">?</span>
                    <span>Register</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="read_users.php" class="nav-link active">
                    <span class="nav-icon">?</span>
                    <span>All Users</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-title" style="margin-top: 30px;">Actions</div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="signup.php" class="nav-link">
                    <span class="nav-icon">?</span>
                    <span>Create User</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="header">
                <h1>Edit User</h1>
                <div class="subtitle">Update user information</div>
            </div>

            <?php if (!empty($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>

            <?php if ($user): ?>
                <form action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="fname" placeholder="First Name" value="<?php echo htmlspecialchars($user['fname']); ?>" required>
                    </div>

                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="lname" placeholder="Last Name" value="<?php echo htmlspecialchars($user['lname']); ?>" required>
                    </div>

                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email Address" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    </div>

                    <div class="form-group">
                        <i class="fas fa-venus-mars"></i>
                        <select name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male" <?php echo ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?php echo ($user['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>

                    <button type="submit" name="update" class="btn">Update User</button>
                </form>
            <?php else: ?>
                <div class="error">User not found!</div>
            <?php endif; ?>

            <div class="nav-links">
                <a href="read_users.php" class="btn-secondary">Back to Users</a>
            </div>
        </div>
    </main>
</body>

</html>

<?php
$conn->close();
?>