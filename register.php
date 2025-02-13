<?php
require "connection.php"; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST["user_type"];
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $user_name = $_POST["user_name"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (user_type, full_name, email, user_name, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $user_type, $full_name, $email, $user_name, $password);

    if ($stmt->execute()) {
        $_SESSION["user_id"] = $stmt->insert_id;
        $_SESSION["user_name"] = $user_name;
        $_SESSION["user_type"] = $user_type;
        if ($user_type == "student") {
        header("Location: index.php");
        exit();
      } else if( $user_type == "organization") {
        header("Location: Organization_home.html");
        exit();
    }else{
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
}
$conn->close();
?>
