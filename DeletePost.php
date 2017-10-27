<?php

$word123='$'.'word123';
$mysqli = new mysqli("mysql.eecs.ku.edu", "jsittenauer", "P@$$word123", "jsittenauer");
if ($mysqli->connect_errno) {
       printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  $postnums = $_POST['post'];

  if(empty($postnums)){
    echo "<h1>No posts selected </h1>";
  }else{
    $numposts = count($postnums);
    $postid = $postnums[0];
    echo "deleted Post# $postid <br>";
    printf("-----------------<br>");
    $query = "DELETE FROM Posts WHERE post_id = '$postid';";
    for($i=1; $i<$numposts; $i++){
       $postid = $postnums[$i];
       $query .= "DELETE FROM Posts WHERE post_id = '$postid';";
    echo "deleted Post# $postid <br>";
    printf("-----------------<br>");
    }
    if ($mysqli->multi_query($query)) {
    while ($mysqli->result()) {
        /* store first result set */
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
            }
            $result->free();
        }
        else{
          echo "Post deleted<br>";
        }
        /* print divider */
        if ($mysqli->more_results()) {
            printf("-----------------<br>");
        }
      } //while ($mysqli->next_result());
    }
  }



  /* close connection */
  $mysqli->close();
?>
