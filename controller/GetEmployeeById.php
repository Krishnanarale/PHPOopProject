<?php 
include '../models/EmployeeModel.php';
$obj = new EmployeeModel();
$result = $obj->getEmployeeById($_POST['id']);
if ($result) {
	$response = array(
		'status' => 'success',
		'message' => 'data found',
		'data' => $result
	);
}else {
	$response = array(
		'status' => 'failed',
		'message' => 'data not found',
		'data' => $result
	);
}
die(json_encode($response));
?>