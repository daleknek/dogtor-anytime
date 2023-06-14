<?php 
namespace controllers;
// TODO: 
// get appoinments from DB
// display list of appointments
class AppointmentsController {

	public function index() {
		
		require $_SERVER['DOCUMENT_ROOT'] . '/dogtor-anytime/views/appointments.php';

		
	}
}

?>