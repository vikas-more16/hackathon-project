<?php
require "connection.php"; // Ensure this file contains the correct DB connection
session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $student_name = $_POST["student_name"];
    $roll_no = $_POST["roll_no"];
    $class = $_POST["class"];
    $class_code = $_POST["class_code"];

    // Validate input (optional but recommended)
    if (empty($student_name) || empty($roll_no) || empty($class) || empty($class_code)) {
        die("Please fill all fields.");
    }

    // Prepare SQL statement to prevent SQL injection
    $sql = "INSERT INTO students (student_name, roll_no, class, class_code) VALUES (?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("siss", $student_name, $roll_no, $class, $class_code);

        // Execute and check success
        if ($stmt->execute()) {
            echo "<script>window.location.href='virtualClass.html';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Database error: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
