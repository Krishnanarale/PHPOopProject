<?php 
include '../config/Database.php';
class EmployeeModel {

	protected $dbConnection; // for store connection object.

	function __construct() {
		$this->dbConnection = new Database();
	}

	public function addEmployee($data) {
		extract($data);
		$languagesStr = implode(", ",$languages);
		$query = "INSERT INTO employees (firstName, lastName, gender, dateOfBirth, email, phone, languages, photo) VALUES ('$firstName', '$lastName', '$gender', '$dateOfBirth', '$email', '$phone', '$languagesStr', '$photo')";
		if($this->dbConnection->query($query) === TRUE){
            return true;
        }else{
            return false;
        }
	}

	public function getEmployee() {
		$query = "SELECT * FROM employees";
		$result = $this->dbConnection->query($query);
		$data = array();
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
	    		array_push($data, $row);    
		    }
		    return $data;
		} else {
	    	return false;
		}
	}

	public function getEmployeeById($id) {
		$query = "SELECT * FROM employees WHERE id = $id";
		$result = $this->dbConnection->query($query);
		$data = array();
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
	    		array_push($data, $row);    
		    }
		    return $data;
		} else {
	    	return false;
		}
	}

	public function updateEmployee($data) {
		extract($data);
		$languagesStr = implode(", ",$languages);
		if (!isset($photo)) {
			$query = "UPDATE employees SET  firstName ='$firstName', lastName ='$lastName', gender ='$gender', dateOfBirth ='$dateOfBirth', email ='$email', phone ='$phone', languages ='$languagesStr' WHERE id = '$id'";
		} else {
			$query = "UPDATE employees SET  firstName ='$firstName', lastName ='$lastName', gender ='$gender', dateOfBirth ='$dateOfBirth', email ='$email', phone ='$phone', languages ='$languagesStr', photo ='$photo' WHERE id = '$id'";
		}
		if($this->dbConnection->query($query) === TRUE){
            return true;
        }else{
            return false;
        }
	}

	public function deleteEmployee($data) {
		extract($data);
		$query = "DELETE FROM employees WHERE id = '$delId'";
		if($this->dbConnection->query($query) === TRUE){
            return true;
        }else{
            return false;
        }
	}

	function __destruct() {
		$this->dbConnection->close();
	}
}?>	