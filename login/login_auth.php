<?php

include "../functions.php";


function insert_new_user_into_db($email, $password) {
  $conn = connect_to_db();
  if (!$conn) {
    die('Could not connect: ' . mysql_error());
  }
  echo 'Connected successfully';

  // Query column email
  $sql_check_email = "SELECT email FROM Users WHERE email = '$email'";
  $result_email = mysqli_query($conn, $sql_check_email);

  // Query column passwort
  $sql_check_password = "SELECT passwort FROM Users WHERE passwort = '$password'";
  $result_password = mysqli_query($conn, $sql_check_password);

  // Check if email and password already exists
  if(mysqli_num_rows($result_email) == 0 && mysqli_num_rows($result_password) == 0) {
    echo "Email and Password are available";
  } else {
    echo "Email or Password are not available";
  }


  mysqli_close($conn);

}



insert_new_user_into_db($_POST["email"], $_POST["password"]);













?>