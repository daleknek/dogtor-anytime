<?php 
namespace controllers;

class ContactUsController {

	public function index() {
		
		//include '../views/contactUs.php';

		require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/contactUs.php';

	}
}

?>