<?php 
include '../models/EmployeeModel.php';
if($_POST) {
	$directory = "../uploads/";
	$file = $directory . basename($_FILES["photo"]["name"]);
	if(move_uploaded_file($_FILES["photo"]["tmp_name"], $file)){
		$_POST["photo"] = basename($_FILES["photo"]["name"]);
		$obj = new EmployeeModel();
		$result = $obj->addEmployee($_POST);
		if ($result) {
			$response = array(
				'status' => 'success',
				'message' => 'data added',
				'data' => ''
			);
		}else {
			$response = array(
				'status' => 'failed',
				'message' => 'data not added',
				'data' => $result
			);
		}
		die(json_encode($response));
	}
}?>