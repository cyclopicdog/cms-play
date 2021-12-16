<?php

require_once 'db.php';
global $connection;

if(isset($_POST['submit']))
{
    $category = $_POST['cat_title'];
    if($category != '')
    {
        $query = "
                INSERT INTO `categories` (`cat_title`)
                VALUES ('$category')
                ";

        $added_data = mysqli_query($connection, $query);

        if(!$added_data)
        {
            die("database problem" . mysqli_error($connection));
        }
    header("Location: /admin?page=categories");
    }

}


if(isset($_POST['delete']))
{
    $cat_id = $_POST['delete'];
    $delete_query = "
                    DELETE FROM `categories`
                    WHERE `cat_id` = '$cat_id'
                    ";
    $deleted_data = mysqli_query($connection, $delete_query);
    if(!$deleted_data)
    {
        die("database deletion problem" . mysqli_error($connection));
    }
    header("Location: /admin?page=categories");

}

if(isset($_POST['send-edit']))
{
    $cat_id = $_POST['cat_id'];
    $cat_title = $_POST['cat_title'];
    $query = "
            UPDATE `categories`
            SET `cat_title` = '$cat_title'
            WHERE `cat_id` = '$cat_id'
            LIMIT 1
            ";

    $edit_data = mysqli_query($connection, $query);

    if(!$edit_data)
    {
        die("database problem" . mysqli_error($connection));
    }
    header("Location: /admin?page=categories");

}

function edit($post)
{
    global $connection;
    if($post != null)
    {
        $cat_id = $_POST['edit'];
        $get_category_query = "SELECT * FROM `categories` WHERE `cat_id` = '$cat_id'";
        $fetched_data = mysqli_query($connection, $get_category_query);
        while ($row = mysqli_fetch_assoc($fetched_data))
        {
            $cat_title = $row['cat_title'];
            echo "
                    <input class='form-control' type='text' name='cat_title' value=$cat_title>
                    <input type='hidden' name='cat_id' value=$cat_id>
                    ";
        }
        if(!$fetched_data)
        {
            die("database deletion problem" . mysqli_error($connection));
        }
    } else {
        echo "<input class='form-control' type='text' name='cat_title' value='Please select category to edit'>";
    }

}

function show_categories()
{
    global $connection;
    $query = "SELECT * FROM `categories`";
    $categories = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($categories))
    {
        $cat_id = $row['cat_id'];
//                                   var_dump($cat_id);
        echo "<tr>";
        foreach($row as $value)
        {
            echo "<td>$value</td>";
        }
        echo
        "<td>
           <div class='btn-toolbar'>
               <form action='includes/controllers/categories-controller.php' method='post'>
                      <button class='btn btn-primary' type='submit' name='delete' value=$cat_id>delete</button>
               </form>
               <form action='' method='post'>
                  <button class='btn btn-primary' type='submit' name='edit' value=$cat_id>edit</button>
               </form>
           </div>
        </td></tr>";
    }
}




