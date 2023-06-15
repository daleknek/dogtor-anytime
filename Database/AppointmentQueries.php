<?php
// Database connection, replace with your connection string
$db = new mysqli('localhost', 'username', 'password', 'dogtorDB');

// Check connection
if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

// Check if task is set
if(!isset($_POST['task'])) {
    die('Task not set.');
}

$task = $_POST['task'];

// Handle the task

switch($task) {

    case 'create':
        // Check if required data for creating is set
        if(!isset($_POST['date'], $_POST['time'], $_POST['patient_id'], $_POST['vet_id'])) {
            die('Required data not set for create task.');
        }

        $date = $_POST['date'];
        $time = $_POST['time'];
        $patient_id = $_POST['patient_id'];
        $vet_id = $_POST['vet_id'];

        // Prepare SQL
        $stmt = $db->prepare("INSERT INTO Appointments (PatientID, VetID, Date, Time) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('iiss', $patient_id, $vet_id, $date, $time);

        // Execute and check for errors
        if (!$stmt->execute()) {
            die('Create Error: ' . $stmt->error);
        } else {
            echo('Appointment was successfully created');
        }
        break;

    case 'edit':
        // Check if required data for editing is set
        if(!isset($_POST['id'], $_POST['date'], $_POST['time'])) {
            die('Required data not set for edit task.');
        }

        $id = $_POST['id'];
        $newDate = $_POST['date'];
        $newTime = $_POST['time'];

        // Prepare SQL
        $stmt = $db->prepare("UPDATE Appointments SET Date = ?, Time = ? WHERE AppointmentID = ?");
        $stmt->bind_param('ssi', $newDate, $newTime, $id);

        // Execute and check for errors
        if (!$stmt->execute()) {
            die('Edit Error: ' . $stmt->error);
        } else {
            echo('Edit was successful');
        }
        break;

        case 'delete':
            // Check if required data for deleting is set
            if(!isset($_POST['id'])) {
                die('Required data not set for delete task.');
            }
    
            $id = $_POST['id'];
    
            // Prepare SQL
            $stmt = $db->prepare("DELETE FROM Appointments WHERE AppointmentID = ?");
            $stmt->bind_param('i', $id);
    
            // Execute and check for errors
            if (!$stmt->execute()) {
                die('Delete Error: ' . $stmt->error);
            } else {
                echo('Appointment was successfully deleted');
            }
            break;
    
        default:
            die('Invalid task.');
}

// Close connections
$stmt->close();
$db->close();

?>

