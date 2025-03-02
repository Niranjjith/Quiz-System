<?php
session_start();
$conn = new mysqli("localhost", "root", "", "quiz_system");

$quiz_id = $_GET['quiz_id'];
$questions = $conn->query("SELECT * FROM questions WHERE quiz_id=$quiz_id");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $question_id => $selected_option) {
        $correct_option = $conn->query("SELECT correct_option FROM questions WHERE id=$question_id")->fetch_assoc()['correct_option'];
        $is_correct = ($correct_option === $selected_option) ? 1 : 0;

        $conn->query("INSERT INTO user_responses (user_id, quiz_id, question_id, selected_option, is_correct) 
                      VALUES ({$_SESSION['user_id']}, $quiz_id, $question_id, '$selected_option', $is_correct)");
    }
    header("Location: quiz_results.php?quiz_id=$quiz_id");
    exit();
}
?>

<form method="POST">
    <?php while ($row = $questions->fetch_assoc()): ?>
        <p><?php echo $row['question']; ?></p>
        <input type="radio" name="<?php echo $row['id']; ?>" value="A"> <?php echo $row['option_a']; ?><br>
        <input type="radio" name="<?php echo $row['id']; ?>" value="B"> <?php echo $row['option_b']; ?><br>
        <input type="radio" name="<?php echo $row['id']; ?>" value="C"> <?php echo $row['option_c']; ?><br>
        <input type="radio" name="<?php echo $row['id']; ?>" value="D"> <?php echo $row['option_d']; ?><br>
    <?php endwhile; ?>
    <button type="submit">Submit Quiz</button>
</form>
