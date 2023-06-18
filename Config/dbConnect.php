<?php
// type your $username and $password
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dogtordb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

