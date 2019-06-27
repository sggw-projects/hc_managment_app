<?php
header('Access-Control-Allow-Origin: *');


require_once './SQL.php';

$sql = new SQL();
$call = null;
if (array_key_exists("call",$_REQUEST))
{  
	$call = $_REQUEST['call'];
}
if (isset($_SERVER['REQUEST_METHOD']) && $call == NULL )
{
	$data = file_get_contents('php://input');
	$data = json_decode($data,true);
	
	switch ($_SERVER['REQUEST_METHOD'])
	{
		case 'PUT': 
			echo json_encode($sql -> addEmployee($data));
			break;
		case 'DELETE': 
			echo json_encode($sql -> removeEmployee($data));
			break;
		case 'POST':
			echo json_encode($sql -> updateEmployee($data));
			break;
	}
	exit();
}
else {
	switch ($call){
		case 'employees':
			$empl = $sql->fetchEmployees();
			echo json_encode($empl);
			break;
		default:
			exit("No call specified");
	}
}