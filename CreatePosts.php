<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "n545n545", "aehee7oh", "n545n545");
$username = $_POST["username"];
$post = $_POST["content"];

if($username == ""){
  echo "<p>Please enter a username</p>";
  exit();
}

if($post== ""){
  echo "<p>Please enter a post</p>";
  exit();
}

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    echo "<p>Could not connect to database</p>";
    exit();
}

if($mysqli->query("SELECT user_id FROM Users WHERE user_id = '$username'")->num_rows == 0){
  echo "<p>User does not exist</p>";
  exit();
}

$id = uniqid();
$query = "INSERT INTO Posts (author_id,content,post_id) VALUES ('$username','$post','$id')";
$mysqli->query($query);
echo "<p>Thanks for posting, ".$username."</p>";
/* close connection */
$mysqli->close();
?>
