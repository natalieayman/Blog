<?php

session_start();

require_once __DIR__ . "/../database/database.php";

$db = new Database();
$conn = $db->connect();

if (!isset($_SESSION["username"])) {
    header("Location: auth/login.html");
    exit();
}
