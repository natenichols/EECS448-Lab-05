<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "n545n545", "aehee7oh", "n545n545");
echo "<p>Hello</p>";
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    echo "<p>Could not connect to database</p>";
    exit();
}

$query = "SELECT author_id, content, post_id FROM Posts";
$mysqli->query($query);

if ($result = $mysqli->query($query)) {



    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td><input value='" $row["post_id"] "'></input></td>";
      echo "<td>".$row["content"]."</td>";
      echo "<td>".$row["author_id"]."</td>"
      echo "</tr>";
    }

    /* free result set */
    //$result->free();
}



/* close connection */
$mysqli->close();
?>
