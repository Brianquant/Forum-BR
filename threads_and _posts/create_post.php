<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post</title>
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

    session_start();
    $tmp = intval($_GET["id"]);
    $_SESSION["thread_id"] =  $tmp;
  ?>
    <h3>Create a Post</h3>
    <form action="./single_thread.php" method="post">
        <p><input class="subject-post" type="text" name="post"> Post</p>
        <p><input type="submit" value="Submit"></p>
    </form>
</body>
</html>



