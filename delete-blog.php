<?php

require_once "repeated/setup.php";

$id = $_GET["id"];
$username = $_SESSION["username"];

$sql = "SELECT * FROM blogs
        WHERE blog_id='$id'
        AND publisher='$username'";

$result = $conn->query($sql);
$blog = $result->fetch_assoc();

if (!$blog) {
        echo "You cannot delete this blog";
        exit();
}

$sqlComments = "DELETE FROM comments
                WHERE blog_id='$id'";

$conn->query($sqlComments);

$sql = "DELETE FROM blogs
        WHERE blog_id='$id'";

$conn->query($sql);

header("Location: blog.php");
exit();
