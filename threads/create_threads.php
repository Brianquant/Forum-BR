<?php

include "../functions.php";


$conn = connect_to_db();
if (!$conn) {
  die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully' . "<br>";

function create_new_topic($conn) {

$sql = "CREATE TABLE `new_topic` (
    `id` INT UNSIGNED NOT NULL,
    `userid` INT UNSIGNED NOT NULL,
    `posted_on` DATETIME NOT NULL,
    `author` CHAR(255),
    `subject` CHAR(255),
    `level` INT UNSIGNED NOT NULL,
    primary key (id)
    )";


    if(mysqli_query($conn, $sql)) {
       echo "new_topic Table created successfully" . "<br>";
      } else {
        echo "Error creating table: " . mysqli_error($conn);
      }




}

function create_new_parent_thread($conn) {

$sql = "CREATE TABLE `parent_thread` (
        `id` INT UNSIGNED NOT NULL,
        `topic_id` INT UNSIGNED NOT NULL,
        `userid` INT UNSIGNED NOT NULL,
        `posted_on` DATETIME NOT NULL,
        `author` CHAR(255),
        `subject` CHAR(255),
        `body` MEDIUMTEXT,
        `level` INT UNSIGNED NOT NULL,
        primary key (id)
      )";



     if(mysqli_query($conn, $sql)) {
        echo "new parent_thread Table created successfully" . "<br>";
       } else {
         echo "Error creating table: " . mysqli_error($conn);
       }


}

create_new_topic($conn);
create_new_parent_thread($conn);


mysqli_close($conn);






?>