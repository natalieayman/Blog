<?php
session_start();
require_once "../database/database.php";
$db = new Database();
$conn = $db->connect();
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user["password"])) {
        $_SESSION["username"] = $user["username"];
        header("Location: ../blog.php");
        exit();
    } else {
        echo "<script>
            alert('Wrong password');
            window.location.href='login.html';
            </script>";
    }
} else {
    echo "<script>
                alert('User not found');
                window.location.href='login.html';
                </script>";
}
