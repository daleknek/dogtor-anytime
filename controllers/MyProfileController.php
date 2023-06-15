<?php 
namespace controllers;

class MyProfileController {

	public function index() {
		
		//include '../views/myprofile.php';

		require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/myprofile.php';

	}
}

?>