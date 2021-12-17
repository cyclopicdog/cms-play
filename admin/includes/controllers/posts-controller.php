<?php

require_once 'db.php';
global $connection;

if (!empty($_POST))
{
    die(print_r($_FILES));
    addToDatabase('posts', $_POST);
    header ("Location: /admin?page=add-posts");
}

function findDate()
{
    return date('Y-m-d');
}

function populateTable()
{
    global $connection;

    $query = "
            SELECT *
            FROM `posts`
    ";

    $post_results = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($post_results))
    {
        echo "<tr>";
        foreach ($row as $key => $value)
        {
            if($key == 'post_content')
            {
                continue;
            }
            if($key == 'post_image')
            {
                $image = "../../../$value";
                echo "<td><image class='img-responsive' width='100' src=$image alt='$key'></image></td>";
                continue;
            }
            echo "<td>$value</td>";
        }
    echo "</tr>";
    }
}

function categoriesDropdown()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_categories )) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<option value='$cat_id'>$cat_title</option>";
    }
}

function usersDropdown()
{
    global $connection;
    $users_query = "SELECT * FROM users";
    $select_users = mysqli_query($connection,$users_query);

    while($row = mysqli_fetch_assoc($select_users)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        echo "<option value='$username'>$username</option>";
    }
}

