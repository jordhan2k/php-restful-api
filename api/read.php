<?php 

	


// Headers
	header('Access-Control-Allow-Oigin: *');
	header('Content-Type: application/json');

	include_once '../config/Database.php';
	include_once '../models/Student.php';

	// instantiate DB & connect;
	$database = new Database();
	$db = $database->connect();


	$student = new Student($db);

	// students query 
	$result = $student->read();

	$num = $result->rowCount();

	if ($num>0){

		$student_arr = array();
		$student_arr['data'] = array();

		while ($row = $result->fetch(PDO::FETCH_ASSOC)){

				// read a single row  at a time
				extract($row);
				$student_item = array(
					'id' => $id,
					'firstName' => $firstName,
					'lastName' => $lastName,
					'dob' => $dob,
					'address'=>$address,
					'gender' => $gender
				);

		// push to 'data'
		array_push($student_arr['data'], $student_item);

		}

		// turn to json
		echo json_encode($student_arr);

	}else {
		// no student
		echo json_encode(
			array('message' => 'no student found')

		);
	}
 ?>