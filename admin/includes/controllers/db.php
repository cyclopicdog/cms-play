<?php

$db = [
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_password' => 'w00f',
    'db_name' => 'cms'];

foreach($db as $key => $value)
    {
        define(strtoupper($key), $value);
    }

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(!$connection) {
    echo "connection error";
}


function checkConnection($result)
{
    global $connection;
    if(!$result)
    {
        die("database problem" . mysqli_error($connection));
    }
}

function addToDatabase($table, $post_array)
{
    global $connection;

    $escaped_inputs = [];
    foreach ($post_array as $value)
    {
        $escaped_inputs[] = mysqli_real_escape_string($connection, $value);
    }

    $query_columns = implode("`, `", array_keys($post_array));

    $query_inputs = implode("', '", $escaped_inputs);

    $query = "
                        INSERT INTO `$table`
                        (`$query_columns`) VALUES ('$query_inputs')
                        ";

    $results = mysqli_query($connection, $query);

    checkConnection($results);
}