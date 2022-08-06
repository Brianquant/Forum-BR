
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <nav>
        <ul>
            <li><a href="http://localhost:8080/Forum-BR/login/login_mask.php">Login</a></li>
            <li><a href="http://localhost:8080/Forum-BR/threads_and%20_posts/create_thread.php">Create Thread</a></li>
            <li><a href="http://localhost:8080/Forum-BR/threads_and%20_posts/thread_overview.php">Thread Overview</a></li>
            <li><a href="http://localhost:8080/Forum-BR/login/account.php">Verify account</a></li>
        </ul>
  </nav>


<?php

include "../functions.php";
// include "../threads_and _posts/session_management.php";


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
  $login_user_id = null;
  // Query column passwort
  $sql_check_password = "SELECT `password` FROM user WHERE `password` = '$password'";
  $result_password = mysqli_query($conn, $sql_check_password);

  // Check if email and password already exists
  if(mysqli_num_rows($result_email) == 0 && mysqli_num_rows($result_password) == 0) {
    $sql = "INSERT INTO user (`email`, `password`) VALUES ('$email', '$password')";
    mysqli_query($conn, $sql);
    echo "A new User is created";
  } elseif(mysqli_num_rows($result_email) == 1 && mysqli_num_rows($result_password) == 1) {
    echo "Login succeeded";
    // Get the user id according to the entered email address
    $get_user_data ="SELECT * FROM user";
    $query_user_data = mysqli_query($conn, $get_user_data);
    if (mysqli_num_rows($query_user_data) > 0) {
      while ($row = mysqli_fetch_assoc($query_user_data)) {
        if($row["email"] === $email) {
          $login_user_id = $row["id"];
          session_start();
          $_SESSION["user_id"] = $login_user_id;
          echo "<br>" . "Login in User ID: " . $login_user_id;
        }
      }
    }
  } else {
    echo "Password or Email is not correct";
  }

  mysqli_close($conn);






}



login($_POST["email"], $_POST["password"]);



?>


</body>
</html>















