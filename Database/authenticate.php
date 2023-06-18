<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '../Config/dbConnect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT patientId, name FROM patient WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($patientId, $user_name);
    $stmt->fetch();

    $_SESSION['id'] = $patientId;

    header("Location: ../homepage");
} else {
    header("Location: login.php?error=1");
}

$stmt->close();
$conn->close();
?>