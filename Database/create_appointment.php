<?php

require 'Config/dbConnect.php';

// assuming user_id is stored in session when user logs in
session_start();

$patientId = $_SESSION['user_id'];
$vetId = intval($_POST['vetId']);  // obtain vet_id from POST parameter

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO appointments (patientId, vetId, date, time) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $patientId, $vetId, $date, $time);
    if ($stmt->execute()) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

}

$conn->close();
?>
