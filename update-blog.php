<?php

require_once "repeated/setup.php";

$id = $_POST["id"];
$title = $_POST["title"];
$content = $_POST["content"];
$category = $_POST["category"];

$sql = "UPDATE blogs
        SET title=?, content=?, category=?
        WHERE blog_id=? AND publisher=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sssis",
    $title,
    $content,
    $category,
    $id,
    $_SESSION["username"]
);

$stmt->execute();

header("Location: blog.php");
exit();
