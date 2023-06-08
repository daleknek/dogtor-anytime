<?php

namespace controllers;

class HomeController {

	public function index() {
		
		// require '../views/index.php';
		// echo '<h1>Home Page</h1>';

		require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/index.php';


	} 
}

?>