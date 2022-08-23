<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thread Overview</title>
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
    <h3>Your active Threads</h3>
    <?php
    session_start();
    $user_id_active = $_SESSION["user_id"];
     ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <p>
        <label for="user_id">Show only my threads</label>
        <!-- ToDo: Get user id from session -->
        <input
            type="checkbox"
            name="user_id_same"
            value="<?php echo $user_id_active; ?>">
        <input type="submit" value="Show threads">
    </p>
    </form>

    <?php

    include "../functions.php";


    $user_id_same = $_POST["user_id_same"];
    $user_int_id_same = (int) $user_id_same;
    // echo $user_int_id_same . "<br>";
    $user_id_other = $_POST["user_id_other"];
    $user_int_id_other = (int) $user_id_other;
    // echo $user_int_id_other . "<br>";




    $conn = connect_to_db();


    function get_my_threads($conn, $user_int_id_same) {
        $query = "SELECT * from thread WHERE `user_id`=$user_int_id_same";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<br>" . "<b>User id: </b>" . $row["user_id"]. "<br>" .
                "<b>Subject: </b> " . $row["subject"]. "<br>" .
                "<b>Body: </b> " . $row["body"] .
                "<br>" .
                "<a href=" . "http://localhost:8080/Forum-BR/threads_and%20_posts/create_post.php?id=" . $row["id"] . ">Create a Post</a>" .
                "<br>" . "--------------------------------------";
            }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
    }




    function get_other_threads($conn, $user_id_active) {
        $query = "SELECT * from thread WHERE NOT `user_id`=$user_id_active";
        $result = mysqli_query($conn, $query);


        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo "<p><b>User id: </b>" . $row["user_id"]. "</p>" .
            "<p><b>Thread id: </b> " . $row["id"] . "</p>" .
            "<p><b>Subject: </b> " . $row["subject"] . "</p>" .
            "<p><b>Body: </b> " . $row["body"] . "</p>" .
            "<a href=" . "http://localhost:8080/Forum-BR/threads_and%20_posts/create_post.php?id=" . $row["id"] . ">Create a Post</a>"
            . "<br>" .
            "--------------------------------------" . "<br>";
            }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
    }


    if($user_int_id_same == $user_id_active) {
        get_my_threads($conn, $user_int_id_same);
    } else {
        get_other_threads($conn, $user_int_id_other);
    }





    ?>
</body>
</html>