<?php
require('db_connect.php');

$query = "SELECT * FROM questions";
$result = mysqli_query($conn, $query);
$questions = [];

while ($row = mysqli_fetch_assoc($result)) {
    $questions[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="style.css">
    <script>
        let questions = <?php echo json_encode($questions); ?>;
        let selectedQuestions = [];
        let correctAnswers = 0;
        let timeLeft = 600; 
        let timer;

        function startQuiz() {
            if (questions.length < 10) {
                alert("Not enough questions in the database!");
                return;
            }

            document.getElementById("start-container").style.display = "none";
            document.getElementById("quiz-container").style.display = "block";

            selectedQuestions = questions.sort(() => 0.5 - Math.random()).slice(0, 10);
            displayQuestions();
            startTimer();
        }

        function startTimer() {
            timer = setInterval(function () {
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    alert("Time's up! Submitting your quiz...");
                    submitQuiz();
                } else {
                    let minutes = Math.floor(timeLeft / 60);
                    let seconds = timeLeft % 60;
                    document.getElementById("timer").innerText = `⏳ Time Left: ${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
                    timeLeft--;
                }
            }, 1000);
        }

        function displayQuestions() {
            let quizBox = document.getElementById("quiz-box");
            quizBox.innerHTML = "";

            selectedQuestions.forEach((question, index) => {
                quizBox.innerHTML += `
                    <div class="question">
                        <h3>${index + 1}. ${question.question}</h3>
                        <label class="option"><input type="radio" name="q${index}" value="1"> ${question.option1}</label>
                        <label class="option"><input type="radio" name="q${index}" value="2"> ${question.option2}</label>
                        <label class="option"><input type="radio" name="q${index}" value="3"> ${question.option3}</label>
                        <label class="option"><input type="radio" name="q${index}" value="4"> ${question.option4}</label>
                    </div>
                `;
            });

            quizBox.innerHTML += `
                <button class="submit-btn" onclick="submitQuiz()">Submit Quiz</button>
            `;
        }

        function submitQuiz() {
            clearInterval(timer);
            correctAnswers = 0;

            selectedQuestions.forEach((question, index) => {
                let selectedOption = document.querySelector(`input[name="q${index}"]:checked`);
                if (selectedOption) {
                    if (parseInt(selectedOption.value) === parseInt(question.correct_option)) {
                        correctAnswers++;
                        selectedOption.parentElement.style.background = "#4CAF50"; 
                    } else {
                        selectedOption.parentElement.style.background = "#FF5252"; 
                    }
                }
            });

            document.getElementById("score").innerHTML = `🎯 Your Score: ${correctAnswers} / 10`;
        }
    </script>
</head>
<body>

    <button class="back-btn" onclick="goBack()">⬅ Back to Home</button>

    <div id="start-container">
        <h1>🎉 Ready to Test Your Knowledge? 🎯</h1>
        <button class="start-btn" onclick="startQuiz()">Start Quiz 🚀</button>
    </div>

    <div id="quiz-container" style="display: none;">
        <h1>Quiz Time! 🔥</h1>
        <p id="timer">⏳ Time Left: 10:00</p>
        <div id="quiz-box"></div>
        <p id="score"></p>
    </div>

    <script>
        function goBack() {
            window.location.href = "index.php"; 
        }
    </script>

</body>
</html>
