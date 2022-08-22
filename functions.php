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

  function my_dump($input) {
    echo "<pre>" . $input . "</pre>";
  }

function myDump($input) {
  print("<pre>");
    print("<code>");
        print_r($input);
    print("</code>");
  print("</pre>");
}









?>