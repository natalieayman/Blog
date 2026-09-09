<?php

require_once "repeated/setup.php";
require_once "repeated/categories.php";


// Put categories in an array
$categoryList = [];

while ($cat = $categories->fetch_assoc()) {
    $categoryList[] = $cat;
}


$blogId = $_GET["id"];


$sql = "SELECT * FROM blogs
        WHERE blog_id='$blogId'";

$result = $conn->query($sql);

$blog = $result->fetch_assoc();


if (!$blog) {

    echo "Blog not found";
    exit();
}


$sqlComments = "SELECT * FROM comments
                WHERE blog_id='$blogId'
                ORDER BY created_at ASC";

$comments = $conn->query($sqlComments);

?>

<!doctype html>

<html lang="en">

<head>

    <title>
        <?php echo $blog["title"]; ?>
    </title>

    <link rel="stylesheet" href="css/style.css?v=5">

</head>

<body>


    <?php require "repeated/header.php"; ?>


    <main class="blog-main">


        <div class="blog-row">


            <div class="blog-content">

                <h2>
                    <?php echo $blog["title"]; ?>
                </h2>

                <p>
                    <?php echo $blog["content"]; ?>
                </p>

            </div>


            <?php require "repeated/info.php"; ?>


        </div>


        <div class="comments-box">

            <h2>
                Blog Comments
            </h2>


            <div id="commentsList">

                <?php while ($comment = $comments->fetch_assoc()) { ?>

                    <div class="comment">

                        <strong>
                            <?php echo $comment["username"]; ?>:
                        </strong>

                        <?php echo $comment["comment"]; ?>

                    </div>

                <?php } ?>

            </div>


            <?php if (isset($_SESSION["username"])) { ?>


                <form id="commentForm">

                    <input type="hidden"
                        name="blog_id"
                        value="<?php echo $blogId; ?>">


                    <textarea
                        name="comment"
                        placeholder="Write a comment..."
                        required></textarea>


                    <button type="submit">
                        Comment
                    </button>


                </form>


            <?php } ?>


        </div>


    </main>


    <?php require "repeated/update.php"; ?>


    <script src="js/comments.js"></script>
    <script src="js/modal.js?v=2"></script>


</body>

</html>