<?php

class SQL {

	private $conn;
	private $date_format = "Y-m-d H:i:s";

	public function __construct() {
		$dbhost = "panel.vps100.nazwa.pl:3306";
 		$dbuser = "admin_zus";
 		$dbpass = "zg7GRgo7oS";
 		$db = "admin_zus";
		try {
			$this->conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
		} catch (Exception $e) {
			exit($e);
		}
	}


	/* PRB */

	public function fetchEmployees(){
		$ret = array();
		$sql_query_str = '
			SELECT 
				p.id,
				p.full_name,
				p.date_birth,
				em.pesel,
				em.position_name,
				em.contract_type,
				em.employment_date,
				em.gross_income,
				em.office,
				p.phone
			FROM admin_zus.employees em
			JOIN admin_zus.patients p
			ON p.pesel = em.pesel';

		try{
			$result = $this->conn->query($sql_query_str);
			

			while ( $row = $result->fetch_assoc())  {
			$ret[]=$row;
			}
			//$sql_query = pg_query($this->conn, $sql_query_str);
			//$ret =  pg_fetch_all($sql_query);
		}catch (Exception $ex){
			echo 'ERROR >> ' . $ex;
		}

		return $ret;
	}

	public function fetchLeavesForEmployeers(){
		$ret = array();
		$sql_query_str = '
			SELECT
				p.id,
				usr.imie,
				usr.nazwisko,
				usr.id id_usr,
				kl.id id_kraj,
				kl.title kraj,
				kl."IDENT" kod,
				p.od, p."do",
				(SELECT title FROM eur_bankomat b WHERE b.id_klienta = kl.id AND title NOT LIKE \'%TEMP%\' ORDER BY title DESC LIMIT 1) max
			FROM prb_podzial p
			JOIN cm_klient kl ON p.id_klient = kl.id
			JOIN sec_user usr ON p.id_user = usr.id
			ORDER BY kl."IDENT", p.od, usr.nazwisko';

		try{
			$sql_query = pg_query($this->pgconn, $sql_query_str);
			$ret =  pg_fetch_all($sql_query);
			foreach ($ret as &$r)
				$r['max'] = intval(filter_var($r['max'], FILTER_SANITIZE_NUMBER_INT));
		}catch (Exception $ex){
			echo 'ERROR >> ' . $ex;
		}

		return $ret;
	}


	public function fetchUsers(){
		$ret = array();
		$sql_query_str = '
			SELECT
				usr.imie,
				usr.nazwisko,
				usr.id id_usr,
				usr.username
			FROM sec_user usr
			ORDER BY usr.username;';

		try{
			$sql_query = pg_query($this->pgconn, $sql_query_str);
			$ret =  pg_fetch_all($sql_query);
		}catch (Exception $ex){
			echo 'ERROR >> ' . $ex;
		}

		return $ret;
	}

	public function updateEmployee($data){
		
		$sql_query_str = '
		UPDATE 
			admin_zus.employees 
		SET 
		position_name = "'.$data["position_name"]. '", 
		contract_type = "'.$data["contract_type"].'", 
		employment_date = "'.$data["employment_date"].'", 
		gross_income = '.$data["gross_income"].', 
		office = "'.$data["office"].'"  
		WHERE 
			pesel = '.$data["pesel"]. ';';
		try{
			$result = $this->conn->query($sql_query_str);
		}catch (Exception $ex){
			echo 'ERROR >> ' . $ex;
			return $result;
		}
		$sql_query_str = '
		UPDATE 
			admin_zus.patients 
		SET 
		phone = "'.$data["phone"]. '", 
		date_birth = "'.$data["date_birth"].'",
		full_name = "'.$data["full_name"].'"  
		WHERE 
			pesel = '.$data["pesel"]. ';';
			try{
				$result = $this->conn->query($sql_query_str);
			}catch (Exception $ex){
				echo 'ERROR >> ' . $ex;
			}
		return $result;
	}
	public function addEmployee($data) {
		$sql_query_str = '
		INSERT INTO 
			admin_zus.patients 
		(id, full_name, phone, date_birth, pesel, nip) 
		VALUES
			(NULL, "'.$data["full_name"] . '","' . $data["phone"]. '","' .$data["date_birth"]. '","' .$data["pesel"]. '","8215659233");';
		try{
			$result = $this->conn->query($sql_query_str);
		}catch (Exception $ex){
			echo 'ERROR >> ' . $ex;
			return $result;
		}
		$sql_query_str = '
		INSERT INTO 
			admin_zus.employees 
		(pesel, position_name, contract_type, employment_date, gross_income, office) 
		VALUES
			(' . $data["pesel"] . ',"' . $data["position_name"]. '","' .$data["contract_type"]. '","'.
			$data["employment_date"]. '",' .$data["gross_income"]. ',"'.$data["office"].'");' ;
		
		try{
			$result = $this->conn->query($sql_query_str);

		}catch (Exception $ex){
			echo 'ERROR >> ' . $ex;
		}
		return $result;
	}
	public function removeEmployee($data) {
		return false;
		$sql_query_str = '
		DELETE FROM admin_zus.employees WHERE pesel = '.$data.';';
		try{
			$result = $this->conn->query($sql_query_str);
		}catch (Exception $ex){
			echo 'ERROR >> ' . $ex;
		}
		return $result;
	}


}