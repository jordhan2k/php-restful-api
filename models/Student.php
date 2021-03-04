<?php 

class Student{
	// DB stuff
	private $conn;
	private $table = "student";
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
		$query = 'SELECT * FROM '.$this->table;
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

	// GET
	public function readSingleStudent(){

		$query = 'SELECT * FROM '. $this->table . ' WHERE id = ? LIMIT 0, 1';

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


	// POST
	public function createStudent(){
		$query = 'INSERT INTO '. $this->table. 
		' SET
			firstName =:firstName,
			lastName =:lastName,
			dob =:dob,
			address =:address,
			gender =:gender';

		// preparedStatement
		$ps = $this->conn->prepare($query);

		// clean data 
		// use htmlspecialchars
		$this->firstName = htmlspecialchars(strip_tags($this->firstName));
		$this->lastName = htmlspecialchars(strip_tags($this->lastName));
		$this->dob = htmlspecialchars(strip_tags($this->dob));
		$this->address = htmlspecialchars(strip_tags($this->address));
		$this->gender = htmlspecialchars(strip_tags($this->gender));
	
		// bind parameters
		$ps->bindParam(':firstName', $this->firstName);
		$ps->bindParam(':lastName', $this->lastName);
		$ps->bindParam(':dob', $this->dob);
		$ps->bindParam(':address', $this->address);
		$ps->bindParam(':gender', $this->gender);

		// execute query
		if ($ps->execute()){
			return true;
		} else {
			// print error
			printf('Error: %s.\n', $ps->error);
			return false;
		}
	}

	// PUT
	public function updateStudent(){
		$query = 'UPDATE '. $this->table. 
		' SET
			firstName =:firstName,
			lastName =:lastName,
			dob =:dob,
			address =:address,
			gender =:gender
		WHERE id =:id
			';

		// preparedStatement
		$ps = $this->conn->prepare($query);

		// clean data 
		// use htmlspecialchars
		$this->firstName = htmlspecialchars(strip_tags($this->firstName));
		$this->lastName = htmlspecialchars(strip_tags($this->lastName));
		$this->dob = htmlspecialchars(strip_tags($this->dob));
		$this->address = htmlspecialchars(strip_tags($this->address));
		$this->gender = htmlspecialchars(strip_tags($this->gender));
		$this->id = htmlspecialchars(strip_tags($this->id));
	
		// bind parameters
		$ps->bindParam(':firstName', $this->firstName);
		$ps->bindParam(':lastName', $this->lastName);
		$ps->bindParam(':dob', $this->dob);
		$ps->bindParam(':address', $this->address);
		$ps->bindParam(':gender', $this->gender);
		$ps->bindParam(':id', $this->id);

		// execute query
		if ($ps->execute()){
			return true;
		} else {
			// print error
			printf('Error: %s.\n', $ps->error);
			return false;
		}
	}


	public function deleteStudent(){
		$query = 'DELETE FROM '.$this->table.' WHERE id=:id';

		$ps = $this->conn->prepare($query);

		$this->id = htmlspecialchars(strip_tags($this->id));

		$ps->bindParam(':id', $this->id);

		if ($ps->execute()){
			return true;
		} else {
			// print error
			printf('Error: %s.\n', $ps->error);
			return false;
		}

	}

}

 ?>