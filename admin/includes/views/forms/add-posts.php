<?php
    require_once './includes/controllers/posts-controller.php';
?>
<form action="/admin/includes/controllers/posts-controller.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="post_category_id">Category</label>
        <select name="post_category_id" id="">
            <?php categoriesDropdown(); ?>
        </select>
    </div>


    <div class="form-group">
        <label for="post_author">Author</label>
        <select name="post_author" id="">
            <?php usersDropdown(); ?>
        </select>
    </div>

    <!-- <div class="form-group">
       <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div> -->

    <div class="form-group">
        <select name="post_status" id="">
            <option value="draft">Post Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file"  name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>

    <input type="hidden" name="post_date" value="<?php echo findDate() ?>">

    <div class="form-group">
        <button class="btn btn-primary">create post</button>
    </div>
</form>
