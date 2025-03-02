<?php
session_start();

if (!isset($_POST['answer'])) {
    die("Invalid submission");
}

if ($_POST['answer'] == $_POST['correct_option']) {
    $_SESSION['score']++;
}

$_SESSION['current_question']++;

if ($_SESSION['current_question'] >= 25) {
    header("Location: results.php");
} else {
    header("Location: quiz.php");
}
exit();
?>
