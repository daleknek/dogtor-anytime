<?php
$servername = "localhost";
$username = "arro";
$password = "4NWd.1n/qO7gonNf";
$dbname = "dogtordb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

