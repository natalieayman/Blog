<div class="blog-info">

    <p>
        Publisher Name:
        <strong><?php echo $blog["publisher"]; ?></strong>
    </p>

    <p>
        Blog Category:
        <?php echo $blog["category"]; ?>
    </p>

    <p>
        Blog Published Date:
        <?php echo $blog["created_at"]; ?>
    </p>


    <?php if (
        isset($_SESSION["username"]) &&
        $blog["publisher"] == $_SESSION["username"]
    ) { ?>

        <button class="update"
            onclick='openUpdate(
        <?php echo $blog["blog_id"]; ?>,
        <?php echo json_encode($blog["title"]); ?>,
        <?php echo json_encode($blog["content"]); ?>,
        <?php echo json_encode($blog["category"]); ?>
    )'>
            Update
        </button>

        <a class="delete"
            href="delete-blog.php?id=<?php echo $blog["blog_id"]; ?>">
            Delete
        </a>

    <?php } ?>

</div>