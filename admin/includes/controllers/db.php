<?php
// ob_start();
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__, 4));
define('SERVER_ROOT', "http://".$_SERVER['SERVER_NAME']);
// define('VIEWS_PATH', ROOT.DS.'views');
// define('DOMAIN_PATH', 'https://'.$_SERVER['SERVER_NAME']);

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

function editDatabase($table, $post_array)
{
    global $connection;

    $escaped_keys = [];
    $escaped_inputs = [];

    foreach ($post_array as $key => $value)
    {
        if($key == 'id')
        {
            continue;
        }
        $escaped_keys[] = mysqli_real_escape_string($connection, $key);
        $escaped_inputs[] = mysqli_real_escape_string($connection, $value);
    }

    if($_POST['id'] == '')
    {
    // for a new entry
        $query_columns = implode("`, `", $escaped_keys);
        $query_inputs = implode("', '", $escaped_inputs);

        $query = "
                        INSERT INTO `$table`
                        (`$query_columns`) VALUES ('$query_inputs')
                        ";
    } else {
    // for an update

        $id = intval($post_array['id']);

        $update_values = [];

        for($i = 0; $i < count($escaped_keys); $i++)
        {
            $update_values[] = $escaped_keys[$i] . "` = '" . $escaped_inputs[$i];
        }

        $query_update_values = implode("', `", $update_values);

        $query = "
                    UPDATE `$table`
                    SET `$query_update_values'
                    WHERE `id` = $id
                 ";
    }


    $results = mysqli_query($connection, $query);

    checkConnection($results);
}