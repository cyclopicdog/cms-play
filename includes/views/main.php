<h1 class="page-header">
    Page Heading
    <small>Secondary Text</small>
</h1>

<?php
$query = "SELECT * FROM `posts`";
$select_all_posts = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_posts))
{
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];

    ?>

    <h2><a href="?page=posts&<?= $post_title ?>"><?php echo $post_title ?></a></h2>

    <p class="lead">
        by <a href="index.php"><?php echo $post_author ?></a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
    <hr>
    <img class="img-responsive" src="<?php echo $post_image ?>" alt="<?php echo $post_title ?>">
    <hr>
    <p><?php echo $post_content ?></p>
    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>

    <?php
}
?>