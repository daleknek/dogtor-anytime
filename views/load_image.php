<?php
if (isset($_GET['patientId'])) {
    require 'Config/dbConnect.php';

    $patientId = $_GET['patientId'];

    $stmt = $conn->prepare("SELECT avatar FROM patient WHERE patientId = ?");
    $stmt->bind_param("i", $patientId);
    $stmt->execute();
    $stmt->bind_result($avatar);
    $stmt->fetch();

    if ($avatar !== null) {
        $avatar_data = $avatar;
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $finfo->buffer($avatar_data);

        header("Content-type: $mime_type");
        echo $avatar_data;
    }

    $stmt->close();
    $conn->close();
} else {
    http_response_code(400);
    echo "Patient ID is required";
}
?>