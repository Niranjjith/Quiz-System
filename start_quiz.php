<?php
session_start();
require 'db_connect.php';

if (!isset($_GET['category_id'])) {
    die("Invalid category");
}

$category_id = $_GET['category_id'];

// Fetch questions
$sql = "SELECT * FROM questions WHERE category_id = $category_id ORDER BY RAND() LIMIT 25";
$result = $conn->query($sql);
$questions = $result->fetch_all(MYSQLI_ASSOC);
$_SESSION['questions'] = $questions;
$_SESSION['category_id'] = $category_id;
$_SESSION['score'] = 0;
$_SESSION['current_question'] = 0;
header("Location: quiz.php");
exit();
?>
