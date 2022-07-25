<?php

include "../functions.php";

// $author = $_POST["author"];

$subject = $_POST["subject"];

$body = $_POST["body"];

// Static: Current User which is loged in
$user_id = 40;
$author = "test@mailStackfuel.com";

// $generate_ids = uniqid();
//    echo $generate_ids;


$conn = connect_to_db();
  if (!$conn) {
    die('Could not connect: ' . mysql_error());
  }
  echo 'Connected successfully' . "<br>";

  $sql = "INSERT INTO thread (`user_id`,`body`, `subject`)
  VALUES (40, 'Das ist ein body', 'das ist ein Subject');";


if(mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




mysqli_close($conn);


?>