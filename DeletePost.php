<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "n545n545", "aehee7oh", "n545n545");
echo "<p>hello</p>";

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    echo "<p>Could not connect to database</p>";
    exit();
}

$dom_document = new DOMDocument();
$dom_document->loadHTML('DeletePost.html');



$query = "SELECT post_id FROM Posts";
$mysqli->query($query);
$deleted = 0;
if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $form = !empty($_POST[$row["post_id"]]);
        if($form){
          $deleted ++;
          $var = $row["post_id"];
          $query2 = "DELETE FROM Posts WHERE post_id='$var'";
          $mysqli->query($query2);
        }

    }
    /* free result set */
    //$result->free();
}
echo "<p>Deleted ".$deleted." entries.</p>";
/* close connection */
$mysqli->close();
?>
