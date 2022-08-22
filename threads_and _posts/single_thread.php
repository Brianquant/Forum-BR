<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Thread</title>
</head>
<body>
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
    myDump($thread_id);
    echo "User: " . $user_id . " is logged in";

    $sql = "INSERT INTO post (`thread_id`,`user_id`, `body`)
        VALUES ($thread_id, $user_id, '$post')";

    // myDump(strlen($post));


    // myDump($post);
    // $thread_id = $_GET["id"];


    if(strlen($post) > 0) {
    if(mysqli_query($conn, $sql)) {
        echo "<br>" . "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    } else {
        return null;
    }

    mysqli_close($conn);


    ?>
</body>
</html>