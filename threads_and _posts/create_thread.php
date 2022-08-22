<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Thread</title>
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
    <h3>Create a Thread</h3>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <!-- Resolve Bug: Form fires the submit event before even submitting anything in the input fields -->
    <!-- ToDo: Check for length in input fields and execute according actions -->
    <!-- ToDo: Destroy Session according to the conditions -->
        <p><input class="subject-thread" type="text" name="subject"> Subject</p>
        <p><input class="subject-post" type="text" name="body"> Body</p>
        <p><input type="submit" value="Submit"></p>
    </form>

    <?php



    session_start();
    $user_id = $_SESSION["user_id"];
    echo "User: " . $user_id . " is logged in";

    // Imports
    include "../functions.php";

    $subject = $_POST["subject"];
    $body = $_POST["body"];




    $conn = connect_to_db();
    if (!$conn) {
     die('Could not connect: ' . mysql_error());
    }


    $sql = "INSERT INTO thread (`user_id`,`body`, `subject`)
        VALUES ($user_id, '$body', '$subject')";


    if(strlen($subject) > 0 && strlen($body) > 0) {
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