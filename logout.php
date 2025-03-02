<?php
session_start();
session_destroy(); // Destroy all sessions
header("Location: index.php"); // Redirect back to home page
exit();
?>
