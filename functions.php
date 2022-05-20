<?php

function connect_to_db() {
    $servername = "db";
    $username = "root";
    $dbpassword = "example";
    $db = "forum";

    // Create connection
    $conn = mysqli_connect($servername, $username, $dbpassword, $db);

    return $conn;
  }




//Check if a value exists in a table
// function record_exists($table, $column, $value) {
//     $connection = connect_to_db();
//     // echo $connection;
//     $query = "SELECT * FROM {$table} WHERE {$column} = {$value}";
//     $result = mysqli_query ( $query, $connection );
//     if ( mysqli_num_rows ( $result ) ) {
//         return TRUE;
//     } else {
//         return FALSE;
//     }
// }




?>