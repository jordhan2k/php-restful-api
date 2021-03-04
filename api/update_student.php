<?php 

// POST request

// Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; charset=UTF-8');
	header('Access-Control-Allow-Methods: PUT');
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
	// print_r($data);
	$student->id = $data->id;
	$student->firstName = $data->firstName;
	$student->lastName = $data->lastName;
	$student->dob = $data->dob;
	$student->address = $data->address;
	$student->gender = $data->gender;

	// create student
	if ($student->updateStudent()){
		
		echo json_encode(
			array('message' => 'Student updated')
		);
	} else {
		echo json_encode(
			array('message' => 'Student not created'));
	}

	
	








 ?>