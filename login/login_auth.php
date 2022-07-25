<?php

include "../functions.php";


function login($email, $password) {
  $conn = connect_to_db();
  if (!$conn) {
    die('Could not connect: ' . mysql_error());
  }
  echo 'Connected successfully' . "<br>";

  // $encrypted_pw = openssl_encrypt($password, "AES-128-CTR", "$email", 0, '1234567891011121');
  // $decrypted_pw = openssl_decrypt($encrypted_pw, "AES-128-CTR", "$email", 0, '1234567891011121');


  // Query column email
  $sql_check_email = "SELECT email FROM user WHERE email = '$email'";
  $result_email = mysqli_query($conn, $sql_check_email);

  // Query column passwort
  $sql_check_password = "SELECT `password` FROM user WHERE `password` = '$password'";
  $result_password = mysqli_query($conn, $sql_check_password);


  // Check if email and password already exists
  if(mysqli_num_rows($result_email) == 0 && mysqli_num_rows($result_password) == 0) {
    $sql = "INSERT INTO user (email, `password`) VALUES ('$email', '$password')";
    mysqli_query($conn, $sql);
    echo "A new User is created";
  } elseif(mysqli_num_rows($result_email) == 1 && mysqli_num_rows($result_password) == 1) {
    echo "Login succeeded";
  } else {
    echo "Password or Email is not correct";
  }


  mysqli_close($conn);

}



login($_POST["email"], $_POST["password"]);













?>