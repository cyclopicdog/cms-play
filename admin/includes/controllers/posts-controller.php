<?php

require_once 'db.php';
global $connection;

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