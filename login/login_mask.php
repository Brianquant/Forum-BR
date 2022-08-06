<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Forum</title>
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
    <form action="./login_auth.php" method="post">
       <p>Email <input type="text" name="email"></p>
       <p>Password <input type="text" name="password"></p>
        <input type="submit" value="Login">
    </form>

    <?php
    session_start();
    unset($_SESSION["user_id"]);
    ?>
</body>
</html>