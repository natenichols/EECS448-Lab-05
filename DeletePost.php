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
$author = $_POST['choice'];
$query = "SELECT content FROM Posts WHERE author_id = '$author'";
$mysqli->query($query);
if ($result = $mysqli->query($query)) {
    echo "<th> Posts from ".$author."</th>";
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["content"] . "</td>";
        echo "<tr>";
    }
    /* free result set */
    //$result->free();
}
/* close connection */
$mysqli->close();
?>
