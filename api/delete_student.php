<?php 

// POST request

// Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; charset=UTF-8');
	header('Access-Control-Allow-Methods: DELETE');
	header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

	include_once '../config/Database.php';
	include_once '../models/Student.php';

	// instantiate DB & connect;
	$database = new Database();
	$db = $database->connect();


	// create a new Student object, which take a connection object as an argument
	$student = new Student($db);


	

	// Get raw posted data
	$data = json_decode(file_get_contents("php://input"));


	// get posted data
	$student->id = $data->id;
	

	// create student
	if ($student->deleteStudent()){
		
		echo json_encode(
			array('message' => 'Student deleted')
		);
	} else {
		echo json_encode(
			array('message' => 'Student not created'));
	}

	
	








 ?>