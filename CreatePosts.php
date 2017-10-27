
 <?php
 $word123='$'.'word123';
 $mysqli = new mysqli("mysql.eecs.ku.edu", "jsittenauer", "P@$$word123", "jsittenauer");
 $name = $_POST["name"];
 $Post = $_POST["Post"];
 /* check connection */
 if ($mysqli->connect_errno) {
     printf("Connect failed: %s\n", $mysqli->connect_error);
     exit();
 }
if ($Post=="") {
   echo "The post wasnt added as it had no contents";
   exit();
 }
else{
 $query = "INSERT INTO Posts (content, author_id)VALUES ('".$Post."','".$name."') ";
 if($mysqli->query($query)===True){
   echo $name."'s post was added";
 }else{
   echo "$name 's post wasnt added";

   echo "Error: " . "<br>" . $mysqli->error;

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
