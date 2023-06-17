<?php

namespace controllers;

class HomePageController {

    public function index() {
        
        // require '../views/index.php';
        // echo '<h1>Landing Page</h1>';

        require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/homepage.php';


    } 
}

?>