<?php
session_start();
session_destroy(); // End session
header("Location: index.php"); // Redirect to homepage
exit();
?>
