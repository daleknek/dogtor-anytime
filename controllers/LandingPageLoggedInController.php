<?php 
namespace controllers;

class LandingPageLoggedInController {

	public function index() {
		
		//include '../views/landingPageLoggedIn.php';

		require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/landingPageLoggedIn.php';

	}
}

?>