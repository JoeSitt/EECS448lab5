<?php
$word123='$'.'word123';
$mysqli = new mysqli("mysql.eecs.ku.edu", "jsittenauer", "P@$$word123", "jsittenauer");
$name = $_POST["name"];
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$query = "INSERT INTO Users (user_id)VALUES ('".$name."') ";
if($mysqli->query($query)===True){
  echo $name." was added";
}else{
  echo "$name wasnt added";

  echo "Error: " . "<br>" . $mysqli->error;

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
