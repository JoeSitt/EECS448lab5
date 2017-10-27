 
<?php
$word123='$'.'word123';
 $mysqli = new mysqli("mysql.eecs.ku.edu", "jsittenauer", "P@$$word123", "jsittenauer");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$query = "SELECT * FROM Users";
 //echo "<br>";
 if ($result = $mysqli->query($query)) {
echo "Users: <br>";
     /* fetch associative array */
     while ($row = $result->fetch_assoc()) {
         printf ("   %s\n", $row["user_id"]);
     }

     /* free result set */
     $result->free();
 }
?>
