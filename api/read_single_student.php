<?php 

// Headers
	header('Access-Control-Allow-Oigin: *');
	header('Content-Type: application/json');

	include_once '../config/Database.php';
	include_once '../models/Student.php';

	// instantiate DB & connect;
	$database = new Database();
	$db = $database->connect();


	// create a new Student object, which take a connection object as an argument
	$student = new Student($db);

	// smth.com?id=3
	// get id from url
	// use isset to get parameters from clients
	// if the field for 'id' is filled or not null, set student.id = $_GET['id'], otherwise die the statement;
	$student->id = isset($_GET['id']) ? $_GET['id'] : die();


	// call readSingleStudent from Student.php, which take a single record of student
	$student->readSingleStudent();

	// an associative array to save data, which is later converted into json format
	$student_arr = array(

					'id' => $student->id,
					'firstName' => $student->firstName,
					'lastName' => $student->lastName,
					'dob' => $student->dob,
					'address'=>$student->address,
					'gender' => $student->gender
				);

		// turn to json
		print_r(json_encode($student_arr));

 ?>