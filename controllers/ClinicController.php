<?php

namespace controllers;
require 'config.php';


class ClinicController {
    
    public function index($vetId) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $patientId = $_SESSION['id'];
            $vetId = intval($_POST['vetId']);
            $date = $_POST['date'];
            $time = $_POST['time'];
            $this->createAppointment($patientId, $vetId, $date, $time);
        }
        $vetData = $this->getVet($vetId);
        $vet=$vetData[0];
        require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/clinic.php';
        
    } 

    function getVet($vetId) {

        global $pdo;
        
        $stmt = $pdo->query("SELECT * FROM vet WHERE vetId=$vetId");
        $vetsData = [];
        while ($row = $stmt->fetch()) {
            $vetsData[] = $row;
        }
    
        return $vetsData;
    }

    function createAppointment($patientId, $vetId, $date, $time) {
        global $pdo;
    
        $sql = "INSERT INTO appointments (patientId, vetId, appointmentDate, appointmentTime) VALUES (?, ?, ?, ?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$patientId, $vetId, $date, $time]);
    }
    
};
?>