<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "n545n545", "aehee7oh", "n545n545");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    echo "<p>Could not connect to database</p>";
    exit();
}

$query = "SELECT user_id FROM Users";
$mysqli->query($query);

if ($result = $mysqli->query($query)) {



    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
      echo "<option value='" $row["user_id"] "'>" . $row["user_id"] . "</option>";
    }

    /* free result set */
    //$result->free();
}
$author = $_POST["choice"];
echo "<p>".$author."</p>";


/* close connection */
$mysqli->close();
?>
