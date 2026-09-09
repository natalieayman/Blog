<header>

    <div class="blog-header">

        <h1>
            <a href="blog.php">Blog</a>
        </h1>

        <div>

            <?php if (isset($_SESSION["username"])) { ?>

                <a class="logout" href="auth/logout.php">
                    Log out
                </a>

                <span>
                    <?php echo $_SESSION["username"]; ?>
                </span>

            <?php } ?>

        </div>

    </div>

</header>