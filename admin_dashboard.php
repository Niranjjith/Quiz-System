<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<h2>Admin Dashboard</h2>
<a href="add_quiz.php">Add Quiz</a>
<a href="view_quizzes.php">Manage Quizzes</a>
<a href="logout.php">Logout</a>
