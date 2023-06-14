<?php

namespace controllers;

class AppointmentsController {
    
    public function index() {
        
        require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/appointments.php';
    } 
}

?>