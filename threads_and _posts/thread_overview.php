<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thread Overview</title>
</head>
<body>

    <?php $user_id_active = 43; ?>
    <h3>Your active Threads</h3>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <p>
        <label for="user_id">Show only my threads</label>
        <!-- ToDo: Get user id from session -->
        <input type="checkbox" name="user_id_same" value="<?php echo $user_id_active ?>">
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
                echo "<br>" . "<b>User id: </b>" . $row["user_id"]. "<br>" . "<b>Body: </b> " . $row["body"]. "<br>" . "<b>Subject: </b> " . $row["subject"]. "<br>" . "--------------------------------------";
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
            echo "<b>User id: </b>" . $row["user_id"]. "<br>" . "<b>Body: </b> " . $row["body"]. "<br>" . "<b>Subject: </b> " . $row["subject"]. "<br>" . "--------------------------------------" . "<br>";
            }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
    }


    if($user_int_id_same === $user_id_active) {
        get_my_threads($conn, $user_int_id_same);
    } else {
        get_other_threads($conn, $user_int_id_other);
    }





    ?>
</body>
</html>