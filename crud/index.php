<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD System - Home</title>
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

    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding: 20px 40px;
        z-index: 1000;
    }

    .navbar-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 15px;
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
        font-size: 1.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #f093fb 50%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .nav-links {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .nav-links a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .nav-links a:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    .hero {
        padding: 120px 40px 80px;
        text-align: center;
        max-width: 1200px;
        margin: 0 auto;
    }

    .hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #f093fb 50%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .hero p {
        font-size: 1.25rem;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
    }

    .features {
        padding: 80px 40px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .features h2 {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 60px;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 40px;
    }

    .feature-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 40px 30px;
        border-radius: 24px;
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: -1px;
        left: -1px;
        right: -1px;
        bottom: -1px;
        background: linear-gradient(135deg, #667eea, #764ba2, #f093fb, #667eea);
        border-radius: 24px;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .feature-card:hover::before {
        opacity: 0.3;
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 20px;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .feature-card h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 15px;
    }

    .feature-card p {
        color: rgba(255, 255, 255, 0.7);
        line-height: 1.6;
    }

    .cta-section {
        padding: 80px 40px;
        text-align: center;
        background: rgba(255, 255, 255, 0.02);
    }

    .cta-section h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 20px;
    }

    .cta-section p {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 40px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        padding: 16px 32px;
        border-radius: 12px;
        font-weight: 700;
        text-decoration: none;
        font-size: 1rem;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .btn-secondary {
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
    }

    .btn-secondary:hover {
        border-color: #667eea;
        background: rgba(102, 126, 234, 0.1);
    }

    .footer {
        padding: 40px;
        text-align: center;
        color: rgba(255, 255, 255, 0.6);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    @media (max-width: 768px) {
        .navbar {
            padding: 15px 20px;
        }

        .hero {
            padding: 100px 20px 60px;
        }

        .hero h1 {
            font-size: 2.5rem;
        }

        .hero p {
            font-size: 1.1rem;
        }

        .features {
            padding: 60px 20px;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }

        .cta-section {
            padding: 60px 20px;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }

        .nav-links {
            gap: 10px;
        }

        .nav-links a {
            padding: 8px 16px;
            font-size: 0.9rem;
        }
    }
</style>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="navbar-content">
            <div class="logo">
                <div class="logo-icon"></div>
                <span class="logo-text">CRUD System</span>
            </div>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <?php if ($is_logged_in): ?>
                    <a href="read_users.php">Dashboard</a>
                    <a href="logout.php" class="btn-primary">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                    <a href="signup.php" class="btn-primary">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome to CRUD System</h1>
        <p>A beautiful and secure user management system with modern design and powerful features. Manage users with ease using our intuitive interface.</p>
    </section>

    <!-- Features Section -->
    <section class="features">
        <h2>Powerful Features</h2>
        <div class="features-grid">
            <div class="feature-card">
              
                <h3>User Registration</h3>
                <p>Secure user registration with validation and password hashing. Create accounts with ease and confidence.</p>
            </div>
            <div class="feature-card">
               
                <h3>User Authentication</h3>
                <p>Robust login system with session management. Keep your data secure with proper authentication.</p>
            </div>
            <div class="feature-card">
                
                <h3>User Management</h3>
                <p>Complete CRUD operations - Create, Read, Update, and Delete users with a beautiful interface.</p>
            </div>
            <div class="feature-card">
                
                <h3>Modern Design</h3>
                <p>Beautiful, responsive design with glassmorphism effects and smooth animations.</p>
            </div>
            <div class="feature-card">
                
                <h3>Data Security</h3>
                <p>Secure password storage, input validation, and protection against common vulnerabilities.</p>
            </div>
            <div class="feature-card">
                
                <h3>Responsive Layout</h3>
                <p>Works perfectly on all devices - desktop, tablet, and mobile with adaptive design.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2>Ready to Get Started?</h2>
        <p>Join our platform and experience the power of modern user management.</p>
        <div class="cta-buttons">
            <?php if ($is_logged_in): ?>
                <a href="read_users.php" class="btn btn-primary">Go to Dashboard</a>
                <a href="signup.php" class="btn btn-secondary">Create New User</a>
            <?php else: ?>
                <a href="signup.php" class="btn btn-primary">Create Account</a>
                <a href="login.php" class="btn btn-secondary">Login</a>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 CRUD System. Built with modern web technologies.</p>
    </footer>
</body>

</html>