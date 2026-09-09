<?php

require_once "repeated/setup.php";

$title = $_POST["title"];
$content = $_POST["content"];
$category = $_POST["category"];
$publisher = $_SESSION["username"];

$stmt = $conn->prepare(
    "INSERT INTO blogs (title, content, category, publisher)
     VALUES (?, ?, ?, ?)"
);

$stmt->bind_param("ssss", $title, $content, $category, $publisher);

$stmt->execute();

header("Location: blog.php");
exit();
