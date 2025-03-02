<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="text-center">
    <div class="container mt-5">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Your profile page is under construction.</p>
        <a href="index.php" class="btn btn-primary">Back to Home</a>
    </div>
</body>
</html>
