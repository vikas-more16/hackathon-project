<?php
require "connection.php"; // Database connection
session_start(); // Start session

// Get form data
$student_name = $_POST['student_name'];
$roll_no = $_POST['roll_no'];
$class = $_POST['class'];
$class_code = $_POST['class_code'];

// Insert data into database
$sql = "INSERT INTO students (student_name, roll_no, class, class_code) 
        VALUES ('$student_name', '$roll_no', '$class', '$class_code')";

if ($conn->query($sql) === TRUE) {
    echo "Student registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 header("location:virtualClass.html");
?>