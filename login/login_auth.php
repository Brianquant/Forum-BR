<?php

include "../functions.php";


function login($email, $password) {
  $conn = connect_to_db();
  if (!$conn) {
    die('Could not connect: ' . mysql_error());
  }
  echo 'Connected successfully' . "<br>";

  // Query column email
  $sql_check_email = "SELECT email FROM Users WHERE email = '$email'";
  $result_email = mysqli_query($conn, $sql_check_email);

  // Query column passwort
  $sql_check_password = "SELECT passwort FROM Users WHERE passwort = '$password'";
  $result_password = mysqli_query($conn, $sql_check_password);

  // Check if email and password already exists
  if(mysqli_num_rows($result_email) == 0 && mysqli_num_rows($result_password) == 0) {
    $sql = "INSERT INTO Users (email, passwort) VALUES ('$email', '$password')";
    mysqli_query($conn, $sql);
    echo "A new User is created";
  } elseif(mysqli_num_rows($result_email) == 1 && mysqli_num_rows($result_password) == 1) {
    echo "Login succeeded";
  } else {
    echo "Password or Email is not corrected";
  }


  mysqli_close($conn);

}



login($_POST["email"], $_POST["password"]);













?>