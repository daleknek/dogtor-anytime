<?php
// Your database connection script
$db = new mysqli('localhost', 'root', 'password', 'dogtorDB');

if ($db->connect_error) {
    die('Connect Error: ' . $db->connect_error);
}

// Determine whether the signup is for a patient or a vet
$userType = $_POST['UserType'];

// Capture data from sign up form
$FirstName = $_POST['name'];
$LastName = $_POST['surname'];
$Email = $_POST['email'];
$Password = $_POST['password'];

// Capture patient data from sign up form
$PatientID = $_POST['patientId'];
$FirstName = $_POST['first_name'];
$LastName = $_POST['last_name'];
$Email = $_POST ['email'];
$Password = $_POST['patient_password'];

// Capture vet data from sign up form
$VetID = $_POST['vetId'];
$FirstName = $_POST['first_name'];
$LastName = $_POST['last_name'];
$Email = $_POST ['email'];
$Password = $_POST['vet_password'];
 

// Prepare SQL for patient sign up
$query = "INSERT INTO Patients (patientId, first_name, last_name ,email, patient_password) VALUES (?, ?, ?, ?, ?)";

// Bind the variables to the prepared statement for patient
$stmt->bind_param('issss', $patienId, $first_name, $last_name, $email,$pet ,$password);

// Execute the query
if (!$stmt->execute()) {
    die('Error: ' . $stmt->error);
}else{
    echo('Sign Up was successful');
}


// Prepare SQL for vet sign up
$query = "INSERT INTO Vets (vetId, first_date, last_name, email, vet_password) VALUES (?, ?, ?, ?, ?, ?)";

// Bind the variables to the prepared statement for vet
$stmt->bind_param('issss', $vetId, $first_name, $last_name, $email,$pet ,$_vet_password);

// Execute the query
if (!$stmt->execute()) {
    die('Error: ' . $stmt->error);
}else{
    echo('Sign Up was successful');
}

//######################### Not sure if thi is needed #######################
// // Create a prepared statement
// $stmt = $db->prepare($query);
// if ($stmt === false) {
//     die('Error: ' . $db->error);
// }

// Close connections
$stmt->close();
$db->close();

?>