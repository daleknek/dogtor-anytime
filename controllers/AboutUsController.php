<?php 
namespace controllers;

class AboutUsController {

	public function index() {
		
		//include '../views/aboutUs.php';

		require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/aboutUs.php';

	}
}

?>