<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User acoount</title>
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
          include_once "../threads_and _posts/session_management.php";


          session_start();
          unset($_SESSION["user_id"]);



          $show_password = null;
          $email = $_POST["email"];
          // echo "Email: " . $email;
          $password = null;


          $conn = connect_to_db();

          $user_post = "SELECT * FROM user";
          $result = mysqli_query($conn, $user_post);

          $sql_check_email = "SELECT email FROM user WHERE email = '$email'";
          $result_email = mysqli_query($conn, $sql_check_email);

          if(mysqli_num_rows($result_email)) {
            echo "Email exist" . "<br>";
            while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $password = $rows["password"];
              // $show_password = openssl_decrypt($password, "AES-128-CTR", "$email", 0, '1234567891011121');
              $show_password = $password;
            }
            echo "<b>This is your Passwort:</b>". $show_password;
          } else {
             echo "Email does not exist";
          }

    ?>
    <h3>Verify your email in order to see your password</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p><input type="text" name="email"></p>
        <p><input type="submit" Value="Verify"></p>
    </form>
</body>
</html>