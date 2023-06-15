<?php

namespace controllers;

// class ClinicController {
    
//     public function index() {
        
//          $_GET['vetId'] = $vetId;
//         require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/clinic.php';
//     } 
// }

class ClinicController {
    
    public function index($vetId) {
        $_GET['vetId'] = $vetId;
        require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/clinic.php';
    } 
}


?>