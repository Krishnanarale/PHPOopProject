<?php 
/**
 *  This class help to get connection with database.
 */
class Database {
	
	private $host = "localhost";
	private $database = "oopProject";
	private $username = "root";
	private $password = "";
	public $conn;

	public function __construct(){
		return $this->getMySqliConnection();
	}

	protected function getPDOConnection() {
		try {
			$this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			return "Connection error: " . $e->getMessage();
		}
		return $this->conn;
	}

	protected function getMySqliConnection() {
		$this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
		if ($this->conn->connect_error) {
		    return "Connection failed: " . $this->conn->connect_error;
		}
		return $this->conn;
	}

	public function query($sql) {
		return $this->conn->query($sql);
	}

	public function close() {
		return $this->conn->close();
	}
}
?>