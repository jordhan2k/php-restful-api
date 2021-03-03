<?php 

class Student{
	// DB stuff
	private $conn;
	private $table = 'student';
	// Object properties
	public $id;
	public $firstName;
	public $lastName;
	public $dob;
	public $address;
	public $gender;


	// constructor with db 
	// nhớ nha con gõ, constructor trong php có 2 dấu _
	public function __construct($db){
		$this->conn = $db;
	}


	// Get student 
	public function read(){
		// query
		$query = 'SELECT * FROM student';
		// if ($this->conn){

		// 	echo 'not null bro';
		// } else {

		// 	echo 'Null loiloztryensi';
		// }
		// prepare statement
		$ps = $this->conn->prepare($query);

		// execute
		$ps->execute();
		return $ps;
	}

	public function readSingleStudent(){

		$query = 'SELECT * FROM student WHERE id = ? LIMIT 0, 1';

		$ps = $this->conn->prepare($query);


		// bind id
		$ps->bindParam(1, $this->id);


		$ps->execute();

		$row  = $ps->fetch(PDO::FETCH_ASSOC);


		$this->firstName = $row['firstName'];
		$this->lastName = $row['lastName'];
		$this->dob = $row['dob'];
		$this->address = $row['address'];
		$this->gender = $row['gender'];




	}

}

 ?>