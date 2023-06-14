<?php
// connects to the database
//replace 'localhost', 'database_name', 'username', and 'password' 
//with the actual database host, name, username, and password

$host = 'localhost';
$db   = 'database_name';
$user = 'username';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

// fetches vets from the database
$stmt = $pdo->query('SELECT id, name FROM vets');
$vets = $stmt->fetchAll();

// outputs vets as JSON
header('Content-Type: application/json');
echo json_encode($vets);

?>
