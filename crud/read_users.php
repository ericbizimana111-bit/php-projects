<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'connection.php';

// Fetch all users
$sql = "SELECT id, fname, lname, email, gender, created_at FROM users ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users - CRUD System</title>
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
        max-width: 1100px;
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
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 35px;
        flex-wrap: wrap;
        gap: 20px;
    }

    h1 {
        background: linear-gradient(135deg, #667eea 0%, #f093fb 50%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 1.75rem;
        font-weight: 800;
    }

    .user-count {
        background: linear-gradient(135deg, #667eea, #764ba2);
        padding: 8px 20px;
        border-radius: 20px;
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .welcome {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9rem;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-bottom: 30px;
    }

    th {
        padding: 16px;
        text-align: left;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: rgba(255, 255, 255, 0.6);
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);
    }

    td {
        padding: 18px 16px;
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.85);
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    tr:hover td {
        background: rgba(255, 255, 255, 0.05);
    }

    td:first-child {
        font-weight: 600;
        color: #667eea;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .btn-action {
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background: rgba(102, 126, 234, 0.2);
        color: #667eea;
        border: 1px solid rgba(102, 126, 234, 0.3);
    }

    .btn-edit:hover {
        background: #667eea;
        color: white;
    }

    .btn-delete {
        background: rgba(245, 101, 101, 0.2);
        color: #fc8181;
        border: 1px solid rgba(245, 101, 101, 0.3);
    }

    .btn-delete:hover {
        background: #fc8181;
        color: white;
    }

    .no-users {
        text-align: center;
        padding: 60px;
        color: rgba(255, 255, 255, 0.5);
    }

    .nav-links {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 14px 28px;
        border-radius: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    }

    .btn-secondary {
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.2);
        color: white;
    }

    .btn-secondary:hover {
        border-color: #667eea;
        background: rgba(102, 126, 234, 0.1);
    }

    .logout-btn {
        background: rgba(245, 101, 101, 0.2);
        border: 1px solid rgba(245, 101, 101, 0.3);
        color: #fc8181;
        padding: 8px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .logout-btn:hover {
        background: #fc8181;
        color: white;
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

        .header {
            flex-direction: column;
            align-items: flex-start;
        }

        table {
            display: block;
            overflow-x: auto;
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
                <div>
                    <div class="welcome">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</div>
                    <h1>Registered Users</h1>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <span class="user-count"><?php echo $result->num_rows; ?> Users</span>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Registered At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['fname']}</td>
                                <td>{$row['lname']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['gender']}</td>
                                <td>" . date('M d, Y H:i', strtotime($row['created_at'])) . "</td>
                                <td>
                                    <div class='actions'>
                                        <a href='update.php?id={$row['id']}' class='btn-action btn-edit'>Edit</a>
                                        <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this user?')\" class='btn-action btn-delete'>Delete</a>
                                    </div>
                                </td>
                              </tr>";
                        }
                    } else {
                        echo "<tr class='no-users'><td colspan='7'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="nav-links">
                <a href="index.php" class="btn btn-primary">Home</a>
                <a href="signup.php" class="btn btn-secondary">Register New User</a>
            </div>
        </div>
    </main>
</body>

</html>

<?php
$result->close();
$conn->close();
?>