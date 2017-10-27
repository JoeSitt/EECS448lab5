<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$word123='$'.'word123';
$mysqli = new mysqli("mysql.eecs.ku.edu", "jsittenauer", "P@$$word123", "jsittenauer");
$name = $_POST["name"];
//$name = "Fran3";

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

else{
$query = "SELECT * FROM Posts where author_id ='$name'";
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ("post#:%d   %s: \"%s\"  <br>\n",$row["post_id"], $row["author_id"], $row["content"]);
        echo "\n";
    }

    /* free result set */
    $result->free();
}
}
// $query = "SELECT * FROM Persons";
// echo "<br>";
// if ($result = $mysqli->query($query)) {
//
//     /* fetch associative array */
//     while ($row = $result->fetch_assoc()) {
//         printf ("%s (%s)\n", $row["FirstName"], $row["City"]);
//     }
//
//     /* free result set */
//     $result->free();
// }

/* close connection */
$mysqli->close();
?>
