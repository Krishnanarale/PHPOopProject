<?php 
include '../models/EmployeeModel.php';
if ($_POST) {
	$obj = new EmployeeModel();
	$result = $obj->deleteEmployee($_POST);
	if ($result) {
		$response = array(
			'status' => 'success',
			'message' => 'data deleted',
			'data' => ''
		);
	}else {
		$response = array(
			'status' => 'failed',
			'message' => 'data not deleted',
			'data' => $result
		);
	}
	die(json_encode($response));
}?>