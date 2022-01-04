<?php
require_once('./includes/db.php');

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    var_dump("username: " . $username . " | password: " . $password);

    $query = "SELECT * FROM `users` WHERE `username` = $username";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result))
    {
        var_dump();
    }

}

if(isset($_POST['submit']))
{
    $search = $_POST['search'];
    if($search != '')
    {
        $query = "
        SELECT * 
        FROM `posts` 
        WHERE `post_title` LIKE '%$search%' OR 
        `post_author` LIKE '%$search%' OR
        `post_content` LIKE '%$search%' OR
        `post_tags` LIKE '%$search%'";

        $results = mysqli_query($connection, $query);

        if ($results) {
            while ($row = mysqli_fetch_assoc($results)) {
                echo "<h2><a href='#'>{$row['post_title']}</a></h2></br><p>{$row['post_content']}</p>";
            }
        } else {
            die("query failed" . mysqli_error($connection));
        }
    }
} else {
    include ('./includes/views/main.php');
    }

?>