<?php

namespace controllers;

class VetAppointmentsController {
    
    public function index() {
        
        require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/vetAppointments.php';
    } 
}
?>