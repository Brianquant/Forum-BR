<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Thread</title>
</head>
<body>
    <h3>Create a Thread</h3>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <p><input type="text" name="user_id"> User_id</p>
        <p><input type="text" name="subject"> Subject</p>
        <p><input type="text" name="body"> Body</p>
        <p><input type="submit" value="Submit"></p>
    </form>


    <?php

    include "../functions.php";

    $subject = $_POST["subject"];
    $body = $_POST["body"];
    //ToDo: Get the User Id via session
    $user_id = $_POST["user_id"];

    $conn = connect_to_db();
    if (!$conn) {
     die('Could not connect: ' . mysql_error());
    }
    echo 'Connected successfully' . "<br>";

    $sql = "INSERT INTO thread (`user_id`,`body`, `subject`)
        VALUES ($user_id, '$body', '$subject');";


    if(mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }




    mysqli_close($conn);



    ?>
</body>
</html>