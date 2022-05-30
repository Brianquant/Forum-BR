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









?>