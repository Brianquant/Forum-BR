<?php

include "./functions.php";


function insert_new_user_int_db($email, $password) {
  $conn = connect_to_db();
      if (!$conn) {
        die('Could not connect: ' . mysql_error());
      }
      echo 'Connected successfully';



  // Add new User to db
  $sql = "INSERT INTO Users (email, password)
  VALUES ('$email', '$password')";



  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

}



insert_new_user_int_db($_POST["email"], $_POST["password"]);













?>