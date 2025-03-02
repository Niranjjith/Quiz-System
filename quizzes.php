<?php
session_start();
require 'db_connect.php'; // Include database connection

// Fetch categories
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #667eea, #764ba2);
            color: white;
        }
        .container {
            padding: 40px;
        }
        .category-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: 0.3s;
            text-align: center;
        }
        .category-card:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }
        .btn-custom {
            background-color: #ff6b6b;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #ff4757;
        }
.back-btn {
    background: #ff5b5b;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    position: absolute;
    top: 10px;
    left: 10px;
    border-radius: 5px;
}

.back-btn:hover {
    background: #ff2a2a;
}


    </style>
</head>
<body>
<!-- Back Button -->
<button class="back-btn" onclick="goBack()">⬅ Back to Home</button>
<div class="container">
    <h2 class="text-center">Select a Quiz Category</h2>
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="category-card">
                    <h4><?php echo $row['name']; ?></h4>
                    <a href="start_quiz.php?category_id=<?php echo $row['id']; ?>" class="btn btn-custom">Start Quiz</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<script>
    function goBack() {
        window.location.href = "index.php"; // Redirect to index page
    }
</script>
</body>
</html>
