<?php

require_once "repeated/setup.php";

$blogId = $_POST["blog_id"];
$comment = $_POST["comment"];
$username = $_SESSION["username"];

$sql = "INSERT INTO comments
        (blog_id, username, comment)
        VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "iss",
    $blogId,
    $username,
    $comment
);

if ($stmt->execute()) {

    echo '<div class="comment">
            <strong>' . htmlspecialchars($username) . ':</strong>
            ' . htmlspecialchars($comment) . '
          </div>';
}
