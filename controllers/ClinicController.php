<?php

namespace controllers;

class ClinicController {
    
    public function index() {
        
        require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/clinic.php';
    } 
}

?>