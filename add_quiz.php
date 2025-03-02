<?php
$conn = new mysqli("localhost", "root", "", "quiz_system");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $query = "INSERT INTO quizzes (title, description) VALUES ('$title', '$desc')";
    $conn->query($query);
    echo "Quiz added successfully!";
}
?>

<form method="POST">
    <input type="text" name="title" placeholder="Quiz Title" required>
    <textarea name="description" placeholder="Quiz Description"></textarea>
    <button type="submit">Add Quiz</button>
</form>
