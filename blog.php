<?php

require_once "repeated/setup.php";
require_once "repeated/categories.php";

$username = $_SESSION["username"];

$stmt = $conn->prepare(
    "SELECT * FROM blogs
     WHERE publisher=?
     ORDER BY created_at DESC"
);

$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();


$categoryList = [];

while ($category = $categories->fetch_assoc()) {
    $categoryList[] = $category;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Blogs</title>

    <link rel="stylesheet" href="css/style.css?v=5">
</head>

<body>

    <?php require "repeated/header.php"; ?>


    <main class="blog-main">

        <button class="add-button" onclick="openAddBlog()">
            Add Blog
        </button>

        <a class="explore-link" href="explore.php">
            Explore all blogs ->
        </a>

        <h2 class="latest">
            -- My Blogs --
        </h2>


        <?php while ($blog = $result->fetch_assoc()) { ?>

            <div class="blog-row">

                <div class="blog-content">

                    <h2>
                        <a href="single-blog.php?id=<?php echo $blog["blog_id"]; ?>">
                            <?php echo $blog["title"]; ?>
                        </a>
                    </h2>

                    <p>
                        <?php echo $blog["content"]; ?>
                    </p>

                    <a href="single-blog.php?id=<?php echo $blog["blog_id"]; ?>">
                        Read Blog
                    </a>

                </div>

                <?php require "repeated/info.php"; ?>

            </div>

        <?php } ?>

    </main>


    <!-- ADD BLOG MODAL -->

    <div id="addBlogModal" class="modal">

        <div class="modal-content">

            <span class="close" onclick="closeAddBlog()">
                &times;
            </span>

            <h2>Add Blog</h2>

            <form action="add-blog.php" method="POST">

                <label>Blog Title</label>
                <input type="text" name="title" required>

                <label>Blog Content</label>
                <textarea name="content" required></textarea>

                <label>Category</label>

                <select name="category" required>

                    <?php foreach ($categoryList as $category) { ?>

                        <option value="<?php echo $category["category_name"]; ?>">
                            <?php echo $category["category_name"]; ?>
                        </option>

                    <?php } ?>

                </select>

                <button type="submit">
                    Publish
                </button>

            </form>

        </div>

    </div>


    <!-- UPDATE BLOG MODAL -->

    <?php require "repeated/update.php"; ?>

    <script src="js/modal.js?v=2"></script>

</body>

</html>