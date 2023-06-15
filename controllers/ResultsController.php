<?php 
namespace controllers;

class ResultsController {

	public function index() {
		
		//include '../views/results.php';

		require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/results.php';

	}
}

?>