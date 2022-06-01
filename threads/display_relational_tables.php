<?php

include "../functions.php";


$conn = connect_to_db();
if (!$conn) {
  die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully' . "<br>";

// ToDo: Display relations between all three tables (Users, new_topic, parent_thread)




?>