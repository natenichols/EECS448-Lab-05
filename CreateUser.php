<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "n545n545", "aehee7oh", "n545n545");
$username = $_POST["username"];
if($username == ""){
  echo "<p>Please enter a username</p>";
  exit();
}
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    echo "<p>Could not connect to database</p>";
    exit();
}
if($mysqli->query("SELECT user_id FROM Users WHERE user_id = '$username'")->num_rows != 0){
  echo "<p>User already exists</p>";
  exit();
}

$query = "INSERT INTO Users (user_id) VALUES ('$username')";
$mysqli->query($query);
echo "<p>Thanks for registering, ".$username."</p>";
/* close connection */
$mysqli->close();
?>
