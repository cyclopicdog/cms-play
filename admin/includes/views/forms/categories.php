<?php
require_once './includes/controllers/categories-controller.php';

?>

<div class="col-xs-6">
    <form action="includes/controllers/categories-controller.php" method="post">
        <div class="form-group">
            <label for="cat-title">Add category title</label>
            <input class="form-control" type="text" name="cat_title">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit" value="Add category">
        </div>
    </form>
    <form action="includes/controllers/categories-controller.php" method="post">
        <div class="form-group">
            <label for="cat-title">Edit category title</label>
                <?php
                    $post = isset($_POST['edit']) ? $_POST['edit'] : '';
                    edit($post);
                ?>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="send-edit" value="Edit category">
        </div>
    </form>
</div>
<div class="col-xs-6">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Category title</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
            show_categories();
        ?>
        </tbody>
    </table>
</div>