<?php
// connects to the database

$host = 'localhost';
$db   = 'dogtorDB';
$user = 'user';
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
$stmt = $pdo->query('SELECT vetId, name FROM vet');
$vets = $stmt->fetchAll();

// outputs vets as JSON
header('Content-Type: application/json');
echo json_encode($vets);

?>
