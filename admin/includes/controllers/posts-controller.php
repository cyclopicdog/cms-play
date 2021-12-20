<?php

require_once 'db.php';
global $connection;

if (!empty($_POST))
{
    $post = $_POST;

    if($_FILES['image']['size'] != 0)
    {
        $image = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $new_image_address = 'images/' . $image_name;

        move_uploaded_file($image, SERVER_ROOT.DS.$new_image_address);

        $post['post_image'] = $new_image_address;
    }

    editDatabase('posts', $post);

    if(($_POST['id']) == '')
    {
        header ("Location: /admin?page=add-posts");
    } else {
        header ("Location: /admin?page=posts");
    }
}

function findDate()
{
    return date('Y-m-d');
}

function getPost($id)
{
    global $connection;

    $query = "
            SELECT *
            FROM `posts`
            WHERE `id` = '$id'
            LIMIT 1
    ";

    $post_results = mysqli_query($connection, $query);

    $post = [];

    while($row = mysqli_fetch_assoc($post_results))
    {
        foreach ($row as $key => $value)
        {
            $post[$key] = $value;
        }
    }

    return $post;
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
                $image = '../' . $value;
                echo "<td><image class='img-responsive' width='100' src=$image alt='$key'></image></td>";
                continue;
            }
            echo "<td>$value</td>";
        }
        $id = $row['id'];
    echo "
          <td><a href='?page=add-posts&edit=$id'>edit</a><br /><a href='?page=posts&delete=$id'>delete post</a></td>
          </tr>
          ";
    }
}

function categoriesDropdown($id = '')
{
    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_categories )) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        if($id == $cat_id)
        {
            echo "<option value='$cat_id' selected>$cat_title</option>";
            continue;
        }
        echo "<option value='$cat_id'>$cat_title</option>";
    }
}

function usersDropdown($id = '')
{
    global $connection;
    $users_query = "SELECT * FROM users";
    $select_users = mysqli_query($connection,$users_query);

    while($row = mysqli_fetch_assoc($select_users)) {
        $user_id = $row['user_id'];
        $username = $row['username'];

        echo "<option value='$user_id'>$username</option>";
    }
}

function deletePost($id)
{
    global $connection;
    $query_id = intval($id);

    $query = "
                DELETE FROM `posts`
                WHERE `id` = $query_id
                LIMIT 1
                ";

    $result = mysqli_query($connection, $query);

    checkConnection($result);

}

