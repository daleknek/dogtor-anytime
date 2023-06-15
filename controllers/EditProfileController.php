<?php 
namespace controllers;

class EditProfileController {

	public function index() {
		
		//include '../views/editProfile.php';

		require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/editProfile.php';

	}
}

?>