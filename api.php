<?php
header('Access-Control-Allow-Origin: *');
/**
 * Created by PhpStorm.
 * User: jaroslaw.anklewicz
 * Date: 11.05.2018
 * Time: 15:17
 */

require_once '../src/cfit.php';

$cf = new Cfit();

if (array_key_exists("call",$_REQUEST))
{  
	$call = $_REQUEST['call'];
}


function ValidateEntry($id_kraj, $new_od, $new_do, $assignments){
	$do = null;
	$od = null;

	echo "new_od >> $new_od new_do >> $new_do <br><br>";

	foreach ($assignments as $ass){
		if (intval($ass['id_kraj']) !== $id_kraj)
			continue;

		$ass['do'] === null ? $do = intval($ass['max']) : $do = intval($ass['do']);
		$od = intval($ass['od']);

		$od_ok = ($new_od >= $od && $new_od <= $do) ? 'true': 'false';
		$do_ok = ($new_do >= $od && $new_do <= $do) ? 'true' : 'false';

		echo "kraj >> $id_kraj | old_od >> $od old_do >> $do<br>";
		echo "Od conflict $od_ok, do conflict $do_ok";
		echo "<br><br>";

		if (($new_od >= $od && $new_od <= $do) || ($new_do >= $od && $new_do <= $do))
			return false;
	}

	return true;
}
if (isset($_SERVER['REQUEST_METHOD']) && $call == NULL )
{
	$data = file_get_contents('php://input');
	$data = json_decode($data,true);
	switch ($_SERVER['REQUEST_METHOD'])
	{
		case 'PUT': //output id  (3)
			echo json_encode($cf -> addAssignment($data));
			break;
		case 'DELETE': //output od (1)
			echo json_encode($cf -> removeAssignment($data));
			break;
		case 'POST': //output max (7699)
			echo json_encode($cf -> updateAssignment($data));
			break;
	}
	exit();
}
else {
	switch ($call){
		case 'users':
			$usr = $cf->fetchUsers();
			foreach ($usr as &$u) {
				$u['imie'] = iconv('UTF-8', 'UTF-8//IGNORE', $u['imie']);
				$u['nazwisko'] = iconv('UTF-8', 'UTF-8//IGNORE', $u['nazwisko']);
			}
			echo json_encode($usr);
			break;
		case 'countries':
			echo json_encode($cf->fetchCountries());
			break;
		case 'assignments':
			echo json_encode($cf->fetchAssignments());
			//var_dump(ValidateEntry(5, -50, 5000, $cf->fetchAssignments()));
			break;
		default:
			exit("No call specified");
	}
}