<?php
	require_once('manager.class.php');
	
    class Usermanager extends Manager {
    	
		private static $passwordsalt = 'jhr2iury13248yr23qurhqup4uhfqfhqp94fh387498534';
		
		protected function safe_Query($safeParams){
			$sql = "SELECT userid, email, slccode, ".
				   "CONCAT(voornaam, IF(tussenvoegsel IS NOT NULL, ".
				     "CONCAT(' ',tussenvoegsel),''), ' ', achternaam) AS volledigenaam FROM USER";
			return $this->readSQL($sql);	
		}
		
		protected function safe_Get($safeId) {
			$sql = "SELECT userid, voornaam, tussenvoegsel, achternaam, email, slccode, ".
				   "CONCAT(voornaam, IF(tussenvoegsel IS NOT NULL, ".
				     "CONCAT(' ',tussenvoegsel),''), ' ', achternaam) AS volledigenaam FROM USER ".
					 "WHERE userid = '$safeId'";
			$resultArray = $this->readSQL($sql);
			if(sizeof($resultArray)>0)
				return $resultArray[0];	
		}
		
		protected function isValid($data){
			$msg = "";
			if(!isset($data->userid) || strlen($data->userid)==0)
				$msg .= "Userid is niet ingevuld\n";
			if(!isset($data->voornaam) || strlen($data->voornaam)==0)
				$msg .= "Voornaam is niet ingevuld\n";
			if(!isset($data->achternaam) || strlen($data->achternaam)==0)
				$msg .= "Achternaam is niet ingevuld\n";
			if(strlen($msg)>0)
				throw new Exception($msg);
			//Altijd TRUE retourneren (als niet valide, dan was er een exception gegooid);
			return true;
		}

		protected function safe_Save($data){
			$existing = $this->get($data->userid);
			if ($existing!=null) {
				return $this->doUpdate($data, $existing);
			} else {
				return $this->doInsert($data);
			}
		}
		
		private function doInsert($data) {
			// Extra validatie: password
			if(!isset($data->password) || strlen($data->password)==0)
				throw new Exception("Passwoord is niet ingevuld");
			$hash = crypt($data->password, self::$passwordsalt);
			$sql = "INSERT INTO USER(userid, voornaam, tussenvoegsel, achternaam, email, password) VALUES (";
			$sql .= "'$data->userid', ";
			$sql .= "'$data->voornaam', ";
			if (isset($data->tussenvoegsel)) {
				$sql .= "'$data->tussenvoegsel', ";
			} else {
				$sql .= "NULL, ";				
			}
			$sql .= "'$data->achternaam', ";
			if (isset($data->email)) {
				$sql .= "'$data->email', ";
			} else {
				$sql .= "NULL, ";				
			}						
			$sql .= "'$hash'";
			$sql .= ")";
			$res = self::$mysqli->query($sql);
			return $this->get($data->userid);
		}
		
		private function doUpdate($data, $existing) {
			$sql = "UPDATE USER ";
			$addcomma = 'SET ';
			if (isset($data->voornaam)) {
				$sql .= $addcomma . "voornaam='$data->voornaam'";
				$addcomma = ', ';
			}
			if (isset($data->tussenvoegsel)) {
				$sql .= $addcomma . "tussenvoegsel='$data->tussenvoegsel' ";
				$addcomma = ', ';
			} else {
				if (isset($existing->tussenvoegsel)) {
					$sql .= $addcomma . "tussenvoegsel = NULL ";
					$addcomma = ', ';
				}
			}
			if (isset($data->achternaam)) {
				$sql .= $addcomma . "achternaam='$data->achternaam' ";
				$addcomma = ', ';
			}
			if (isset($data->email)) {
				$sql .= $addcomma . "email='$data->email' ";
				$addcomma = ', ';
			}
			$sql .= "WHERE userid= '$existing->userid'";
			$res = self::$mysqli->query($sql);
			return $this->get($data->userid);
		}
		
		protected function safe_Delete($safeData){
			$sql = "DELETE FROM USER WHERE userid= '$safeData'";
			$res = self::$mysqli->query($sql);
		}
	}
?>