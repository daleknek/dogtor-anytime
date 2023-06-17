<?php
require 'Config/dbConnect.php';

function search_veterinarians($search) {
  global $conn;

  $stmt = $conn->prepare("SELECT * FROM vet WHERE name LIKE ? OR surname LIKE ? OR specialization LIKE ?");
  $searchPattern = "%$search%";
  $stmt->bind_param("sss", $searchPattern, $searchPattern, $searchPattern);
  $stmt->execute();

  return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
?>