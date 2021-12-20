<?php
    require_once './includes/controllers/posts-controller.php';
if(isset($_GET['delete']))
{
    deletePost($_GET['delete']);
}
?>

<h1 class="page-header">
    Post history
    <small>-</small>
</h1>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php populateTable(); ?>
    </tbody>
</table>


