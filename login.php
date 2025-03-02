<?php
session_start();
$conn = new mysqli("localhost", "root", "", "quiz_system");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Quiz Management</title>
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
            justify-content: center;
            align-items: center;
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
            color: white;
        }
        .btn-custom {
            background-color: #ff6b6b;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #ff4757;
        }
        .error-msg {
            color: red;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <h2 class="text-center">Login</h2>
            <?php if (isset($error)) echo "<p class='error-msg'>$error</p>"; ?>
            <form method="POST">
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-custom">Login</button>
            </form>
            <p class="text-center mt-3">Don't have an account? <a href="signup.php" style="color: #ff6b6b;">Sign up</a></p>
        </div>
    </div>

</body>
</html>
