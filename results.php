<?php
session_start();
$score = $_SESSION['score'];
$percentage = ($score / 25) * 100;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5 text-center">
    <h2>Your Results</h2>
    <p><strong>Score:</strong> <?php echo $score; ?>/25</p>
    <p><strong>Percentage:</strong> <?php echo round($percentage, 2); ?>%</p>
    <a href="quizzes.php" class="btn btn-primary">Try Another Quiz</a>
</div>

</body>
</html>
