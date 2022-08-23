<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Thread</title>
    <link rel="stylesheet" href="../css/style.css">
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

    $conn = connect_to_db();
    if (!$conn) {
    die('Could not connect: ' . mysql_error());
    }


    $post = $_POST["post"];
    session_start();
    $user_id = $_SESSION["user_id"];
    $thread_id = $_SESSION["thread_id"];
    // echo "Thread_id: " . $thread_id . "<br>";
    // echo "User: " . $user_id . " is logged in";

    $sql = "INSERT INTO post (`thread_id`,`user_id`, `body`)
        VALUES ($thread_id, $user_id, '$post')";


    if(strlen($post) > 0) {
    if(mysqli_query($conn, $sql)) {
        echo "<br>" . "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    } else {
        return null;
    }

    $sql_get_selected_thread = "SELECT * FROM thread WHERE id=$thread_id";

    $fetch_thread = mysqli_query($conn, $sql_get_selected_thread);

    if (mysqli_num_rows($fetch_thread) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($fetch_thread)) {
        echo "<div class=\"thread\"><h3>Thread</h3>" .
        "<p><b>Thread id: </b> " . $row["id"] . "</p>" .
        "<p><b>Subject: </b> " . $row["subject"] . "</p>" .
        "<p><b>Body: </b> " . $row["body"] . "</p>" .
        "<a href=" . "http://localhost:8080/Forum-BR/threads_and%20_posts/create_post.php?id=" . $row["id"] . ">Create a Post</a>"
        . "<br>" .
        "--------------------------------------" . "<br></div>";
        }
    } else {
        echo "0 results";
    }

    $sql_get_selected_posts = "SELECT * FROM post WHERE thread_id=$thread_id";

    $fetch_posts = mysqli_query($conn, $sql_get_selected_posts);

    if (mysqli_num_rows($fetch_posts) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($fetch_posts)) {
        echo "<div class=\"post\"><h3>Post</h3>" .
        "<p><b>User id: </b> " . $row["user_id"] . "</p>" .
        "<p><b>Post: </b> " . $row["body"] . "</p>" . "<br>" .
        "--------------------------------------" . "<br></div>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);




    ?>

</body>
</html>