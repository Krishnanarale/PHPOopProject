<?php 
include '../models/EmployeeModel.php';
if($_FILES["photo"]['name'] != '') {
	$directory = "../uploads/";
	$file = $directory . basename($_FILES["photo"]["name"]);
	if(move_uploaded_file($_FILES["photo"]["tmp_name"], $file)){
		$_POST["photo"] = basename($_FILES["photo"]["name"]);
		$obj = new EmployeeModel();
		$result = $obj->updateEmployee($_POST);
		if ($result) {
			$response = array(
				'status' => 'success',
				'message' => 'data updated',
				'data' => ''
			);
		}else {
			$response = array(
				'status' => 'failed',
				'message' => 'data not updated',
				'data' => $result
			);
		}
		die(json_encode($response));
	}
} else {
	$obj = new EmployeeModel();
	$result = $obj->updateEmployee($_POST);
	if ($result) {
		$response = array(
			'status' => 'success',
			'message' => 'data updated',
			'data' => ''
		);
	}else {
		$response = array(
			'status' => 'failed',
			'message' => 'data not updated',
			'data' => $result
		);
	}
	die(json_encode($response));
}?>