<?php
session_start();
require_once "../database/database.php";
$db = new Database();
$conn = $db->connect();
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirm_password"];
if ($password != $confirmPassword) {
    echo "<script>
    alert('Passwords do not match');
    window.location.href='signup.html';
    </script>";
    exit();
    }
    
    $check = "SELECT * FROM users 
    WHERE username='$username' OR email='$email'";
    $result = $conn->query($check);
    if ($result->num_rows > 0) {
        echo "<script>
        alert('Username or email already exists');
        window.location.href='signup.html';
        </script>";
        exit();
        }
        
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql)) {
            $_SESSION["username"] = $username;
            header("Location: ../blog.php");
            exit();
            }
            ?>