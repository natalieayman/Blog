<?php

require_once "repeated/setup.php";
require_once "repeated/categories.php";


// Put categories in an array
$categoryList = [];

while ($cat = $categories->fetch_assoc()) {
    $categoryList[] = $cat;
}


$category = $_GET["category"] ?? "All";

$sort = $_GET["sort"] ?? "newest";


if ($sort == "oldest") {
    $order = "ASC";
} else {
    $order = "DESC";
}


if ($category == "All") {

    $sql = "SELECT * FROM blogs
            ORDER BY created_at $order";
} else {

    $sql = "SELECT * FROM blogs
            WHERE category='$category'
            ORDER BY created_at $order";
}


$result = $conn->query($sql);

?>

<!doctype html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Explore Blogs</title>

    <link rel="stylesheet" href="css/style.css?v=5">

</head>

<body>


    <?php require "repeated/header.php"; ?>


    <main class="explore-main">


        <div class="categories">

            <a href="explore.php?category=All">
                All
            </a>


            <?php foreach ($categoryList as $cat) { ?>

                <a href="explore.php?category=<?php echo $cat["category_name"]; ?>">

                    <?php echo $cat["category_name"]; ?>

                </a>

            <?php } ?>

        </div>


        <form class="filter-form" method="GET">

            <input type="hidden"
                name="category"
                value="<?php echo $category; ?>">


            <select name="sort">

                <option value="newest"
                    <?php
                    if ($sort == "newest") {
                        echo "selected";
                    }
                    ?>>

                    NEWEST

                </option>


                <option value="oldest"
                    <?php
                    if ($sort == "oldest") {
                        echo "selected";
                    }
                    ?>>

                    OLDEST

                </option>

            </select>


            <button type="submit">
                Filter
            </button>

        </form>


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


    <?php require "repeated/update.php"; ?>


    <script src="js/modal.js?v=2"></script>


</body>

</html>