<?php
namespace controllers;
require 'config.php';

class AppointmentsController {
    public function index() {
        $data = $_POST;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($data['task'] === 'update') {
                $appointmentId = $data['appointmentId'];
                $date = $data['date'];
                $time = $data['time'];
                $this->updateAppointment($appointmentId, $date, $time);
                echo json_encode(['success' => true]);
            } elseif ($data['task'] === 'delete') {
                $appointmentId = $data['appointmentId'];
                $this->deleteAppointment($appointmentId);
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

    public function updateAppointment($appointmentId, $date, $time) {
        global $pdo;

        $stmt = $pdo->prepare("UPDATE appointments SET date = ?, time = ? WHERE appointmentId = ?");
        $stmt->execute([$date, $time, $appointmentId]);
    }

    public function deleteAppointment($appointmentId) {
        global $pdo;

        $stmt = $pdo->prepare("DELETE FROM appointments WHERE appointmentId = ?");
        $stmt->execute([$appointmentId]);
    }
}
?>
