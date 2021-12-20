<?php
    require_once './includes/controllers/posts-controller.php';

    if(isset($_GET['edit']))
    {
    $post = getPost($_GET['edit']);
    }

?>


<form action="/admin/includes/controllers/posts-controller.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?= $post['post_title'] ?? ''; ?>">
    </div>

    <div class="form-group">
        <label for="post_category_id">Category</label>
        <select name="post_category_id" id="">
            <?php categoriesDropdown($post['post_category_id'] ?? ''); ?>
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
        <label for="image">Post Image</label>
        <input type="file"  name="image">
        <?php
        if(!empty($post['post_image']))
        {
            echo "<img class='img-responsive' src='". SERVER_ROOT.DS.$post['post_image'] . "' alt='" . $post['post_title'] . "' width='50'>";
        }
        ?>
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?= $post['post_tags'] ?? ''; ?>">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?= $post['post_content'] ?? ''; ?></textarea>
    </div>

    <input type="hidden" name="id" value="<?= $post['id'] ?? ''; ?>">
    <input type="hidden" name="post_image" value="<?= $post['post_image'] ?? ''; ?>">
    <input type="hidden" name="post_date" value="<?php echo findDate() ?>">

    <div class="form-group">
        <button class="btn btn-primary"><?= isset($post['id']) ? 'update post' : 'create post' ?></button>
    </div>
</form>
