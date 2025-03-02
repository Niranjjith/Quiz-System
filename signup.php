<?php
session_start();
$conn = new mysqli("localhost", "root", "", "quiz_system");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if email already exists
    $checkEmail = $conn->query("SELECT id FROM users WHERE email='$email'");
    
    if ($checkEmail->num_rows > 0) {
        $error = "Email already exists! Try a different one.";
    } else {
        // Insert new user
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($query)) {
            $_SESSION['user_id'] = $conn->insert_id; // Store session
            $_SESSION['username'] = $username;
            header("Location: index.php"); // Redirect to index
            exit();
        } else {
            $error = "Signup failed! Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Quiz System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #667eea, #764ba2);
            color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }
        .card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .btn-custom {
            background-color: #ff6b6b;
            border: none;
            color: white;
            font-size: 18px;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #ff4757;
        }
        .error-message {
            color: #ff6b6b;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <h2>Sign Up</h2>
            <p>Create an account to start taking quizzes!</p>
            <?php if (isset($error)): ?>
                <p class="error-message"><?= $error; ?></p>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-custom">Sign Up</button>
            </form>
            <p class="mt-3">Already have an account? <a href="login.php" style="color: #ff6b6b;">Login here</a></p>
        </div>
    </div>

</body>
</html>
