<?php
//########################################################################
// this is a chatgpt generated code I copy-pasted
// need to figure out attributes 
// according to db they are appointmentID, VetID PatientID, Time, Data
// How will I use Vet and patient ID? should that be also name?

// Database connection, replace with your connection string
$db = new mysqli('root', 'username', 'password', 'dogtorDB');

// Check connection
if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

// Capture data from form
$user_id = $_POST['userId'];
$vet_id = $_POST['vetId'];
$appointment_date = $_POST['appointment_date'];

// Prepare SQL and execute it based on user type
if($userType == "Patient"){
    $query = "INSERT INTO Patients (first_name, last_name ,email, patient_password) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssss', $FirstName, $LastName, $Email, $Password);
}else if($userType == "Vet"){
    $query = "INSERT INTO Vets (first_name, last_name, email, vet_password) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssss', $FirstName, $LastName, $Email, $Password);
}

// // Prepare SQL
// $stmt = $db->prepare("INSERT INTO Appointments (userId, vetId, apppointment_date) VALUES (?, ?, ?)");
// $stmt->bind_param('iis', $userId, $vetId, $appointment_date);

// // Execute and check for errors
// if ($stmt->execute()) {
//     echo "New appointment booked successfully";
// } else {
//     echo "Error: " . $stmt->error;
// }

// Execute the query
if (!$stmt->execute()) {
    die('Sign Up Error: ' . $stmt->error);
}else{
    echo('Sign Up was successful');
}

// Close connections
$stmt->close();
$db->close();

?>
