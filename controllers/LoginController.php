<?php 
namespace controllers;

class LoginController {

	public function index() {
		
		//include '../views/login.php';

		require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/login.php';

	}
}

?>