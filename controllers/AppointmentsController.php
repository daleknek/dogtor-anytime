<?php

namespace controllers;
require 'config.php';

class AppointmentsController {
        public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            
            if ($data['task'] === 'create') {
                createAppointment($data['vetId'], $data['date'], $data['time']);
                echo json_encode(['success' => true]);
            }
        }

        $result = $this->getAppointmentData();

        foreach ($result as &$appointment) {
            $vet = $this->getVet($appointment['vetId']);
            $appointment['vet'] = $vet;
        }

        require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/appointments.php';
    }

    function getAppointmentData() {
        global $pdo;
        
        $stmt = $pdo->query("SELECT * FROM appointments");
        $appointmentsData = [];
        while ($row = $stmt->fetch()) {
            $appointmentsData[] = $row;
        }

        return $appointmentsData;
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
}

?>