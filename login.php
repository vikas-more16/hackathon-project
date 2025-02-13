<?php
require "connection.php"; // Database connection
session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST["user_type"];
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE user_name = ? AND user_type = ?");
    $stmt->bind_param("ss", $user_name, $user_type);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) { // Verify hashed password
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user_name;
            $_SESSION["user_type"] = $user_type;

            // Redirect based on user type
            if ($user_type === "student") {
                header("Location: index.php");
                exit();
            } elseif ($user_type === "organization") {
                header("Location: Organization_home.php");
                exit();
            }
        } else {
            echo "<script>alert('Invalid password!'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('User not found!'); window.location='login.php';</script>";
    }
    $stmt->close();
}
$conn->close();
?>
