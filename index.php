<?php
session_start();
$loggedIn = isset($_SESSION['user_id']); // Check if user is logged in
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #667eea, #764ba2);
            color: white;
            font-family: 'Arial', sans-serif;
        }
        .container {
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column;
        }
        .card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 600px;
        }
        .welcome-text {
            font-size: 32px;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 10px rgba(255, 255, 255, 0.5);
        }
        .sub-text {
            font-size: 20px;
            font-weight: 600;
            color: white;
            text-shadow: 1px 1px 5px rgba(255, 255, 255, 0.5);
        }
        .btn-quiz {
            background: #ff6b6b;
            color: white;
            font-size: 20px;
            padding: 12px 25px;
            border-radius: 8px;
            border: none;
            margin-top: 20px;
            cursor: pointer;
            transition: 0.3s;
            animation: bounceIn 1s ease-in-out;
        }
        .btn-quiz:hover {
            background: #ff4757;
            transform: scale(1.1);
        }
        @keyframes bounceIn {
            0% { transform: scale(0.5); opacity: 0; }
            60% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); }
        }
        .navbar {
            background: rgba(0, 0, 0, 0.5);
        }
        .navbar a {
            color: white !important;
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Quiz System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (!$loggedIn): ?>
                        <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Centered Content -->
    <div class="container">
        <div class="card">
            <h1 class="welcome-text">Welcome to the Quiz Management System</h1>
            <p class="sub-text">Test your knowledge with exciting quizzes!</p>
            <?php if ($loggedIn): ?>
                <a href="quizzes.php" class="btn-quiz">View Quizzes</a>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
