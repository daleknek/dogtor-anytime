<?php

require 'config.php';

// assuming user_id is stored in session when user logs in
//session_start();

$patientId = $_SESSION['user_id'];
$vetId = intval($_POST['vetId']);  // obtain vet_id from POST parameter

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $time = $_POST['time'];

    // $sql = "INSERT INTO appointments (patientId, vetId, appointmentDate, appointmentTime) VALUES (?, ?, ?, ?)";
    $sql = "INSERT INTO appointments (patientId, vetId, appointmentDate, appointmentTime) VALUES ('1', '1', '1', '2023-06-17', '20:31:00')";
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
