<div id="updateModal" class="modal">

    <div class="modal-content">

        <span class="close" onclick="closeUpdate()">
            &times;
        </span>

        <h2>Update Blog</h2>

        <form action="update-blog.php" method="POST">

            <input type="hidden" name="id" id="updateBlogId">

            <label>Blog Title</label>
            <input type="text" name="title" id="updateTitle" required>

            <label>Blog Content</label>
            <textarea name="content" id="updateContent" required></textarea>

            <label>Category</label>

            <select name="category" id="updateCategory" required>
                <?php foreach ($categoryList as $category) { ?>

                    <option value="<?php echo $category["category_name"]; ?>">
                        <?php echo $category["category_name"]; ?>
                    </option>

                <?php } ?>

            </select>

            <button type="submit">
                Update
            </button>

        </form>

    </div>

</div>