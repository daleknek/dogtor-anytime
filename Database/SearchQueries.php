<?php

$FirstName = ''; //######################## how will I input this value???
$LastName = '';

// Prepare SQL
// search with first name
$stmt = $db->prepare("SELECT * FROM vet WHERE first_name = ?");
$stmt->bind_param('s', $first_name);
// search with last name
$stmt = $db->prepare("SELECT * FROM vet WHERE last_name = ?");
$stmt->bind_param('s', $last_name);

// Execute
$stmt->execute();

// Get the result
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    // Use the data ####################### Here I want to get as result cards of the vets, how will I do that?
    echo $row['first_name'];
    echo $row['last_name'];
    // etc.
}

?>