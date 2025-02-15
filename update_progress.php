<?php
session_start();
require 'connection.php'; // Connect to database

if (!isset($_SESSION['user_name'])) {
    exit("Unauthorized");
}

$username = $_SESSION['user_name'];
$level = $_POST['level'];
$points = $_POST['points'];

// Update user progress
$stmt = $conn->prepare("UPDATE users SET level = ?, points = ? WHERE user_name = ?");
$stmt->bind_param("iis", $level, $points, $username);
$stmt->execute();
$stmt->close();

echo "Progress Updated!";
?>
