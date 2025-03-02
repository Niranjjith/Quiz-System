<?php
session_start();
$conn = new mysqli("localhost", "root", "", "quiz_system");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_user = $_POST['username'];
    $admin_pass = $_POST['password'];

    if ($admin_user === 'admin' && $admin_pass === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Invalid credentials!";
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Admin Username" required>
    <input type="password" name="password" placeholder="Admin Password" required>
    <button type="submit">Login</button>
</form>
