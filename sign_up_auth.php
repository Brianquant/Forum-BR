<?php

function connect_to_mysql_db() {
  $servername = "db";
  $username = "root";
  $password = "example";
  $db = "forum";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $db);
  if (!$conn) {
    die('Could not connect: ' . mysql_error());
  }
  echo 'Connected successfully';

  $sql = "INSERT INTO Users (name, password)
  VALUES ('Will Smith', 'Texastav123')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

  mysqli_close($conn);

}

// $name = $_POST["name"];
// $password = $_POST["password"];





connect_to_mysql_db();




?>