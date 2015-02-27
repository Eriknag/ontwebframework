<?php
	require_once('manager.class.php');
	
    class Studentmanager extends Manager {
    	
		protected function safe_Query($safeParams){
			$sql = "SELECT *, ".
				   "CONCAT(voornaam, IF(tussenvoegsel IS NOT NULL, ".
				     "CONCAT(' ',tussenvoegsel),''), ' ', achternaam) AS volledigenaam FROM STUDENT";
			if (isset($safeParams['slc'])) {
				$sql .= "WHERE slc='".$safeParams['slc']."'";
			}
			return $this->readSQL($sql);	
		}
		
		protected function safe_Get($safeId) {
			$sql = "SELECT *, ".
				   "CONCAT(voornaam, IF(tussenvoegsel IS NOT NULL, ".
				     "CONCAT(' ',tussenvoegsel),''), ' ', achternaam) AS volledigenaam FROM STUDENT ".
					 "WHERE id = '$safeId'";
			$resultArray = $this->readSQL($sql);
			if(sizeof($resultArray)>0)
				return $resultArray[0];	
		}
		
		protected function isValid($data){
			$msg = "";
			if(!isset($data->id) || strlen($data->id)==0) {
				$msg .= "Studentnummer is niet ingevuld\n";
			} else {
				if(is_numeric($data->id))
					$msg .= "Studentnummer moet een getal zijn, in plaats van ". $this->id;
			}
			if(!isset($data->voornaam) || strlen($data->voornaam)==0)
				$msg .= "Voornaam is niet ingevuld\n";
			if(!isset($data->achternaam) || strlen($data->achternaam)==0)
				$msg .= "Achternaam is niet ingevuld\n";
			if(!isset($data->cohort) || strlen($data->cohort)==0) {
				$msg .= "Cohort is niet ingevuld\n";
			} else {
				if(is_numeric($data->cohort))
					$msg .= "Cohort moet een getal zijn, in plaats van ". $this->cohort;
			}
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
			$sql = "INSERT INTO STUDENT(id, voornaam, tussenvoegsel, achternaam, cohort, telefoon, slc, hzemail, groep) VALUES (";
			$sql .= "$data->id, ";
			$sql .= "'$data->voornaam', ";
			if (isset($data->tussenvoegsel)) {
				$sql .= "'$data->tussenvoegsel', ";
			} else {
				$sql .= "NULL, ";				
			}
			$sql .= "'$data->achternaam', ";
			$sql .= "$data->cohort";
			if (isset($data->telefoon)) {
				$sql .= "'$data->telefoon', ";
			} else {
				$sql .= "NULL, ";				
			}						
			if (isset($data->slc)) {
				$sql .= "'$data->slc', ";
			} else {
				$sql .= "NULL, ";				
			}						
			if (isset($data->hzemail)) {
				$sql .= "'$data->hzemail', ";
			} else {
				$sql .= "NULL, ";				
			}						
			if (isset($data->groep)) {
				$sql .= "'$data->groep', ";
			} else {
				$sql .= "NULL, ";				
			}						
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
			if (isset($data->cohort)) {
				$sql .= $addcomma . "cohort=$data->cohort ";
				$addcomma = ', ';
			}
			if (isset($data->telefoon)) {
				$sql .= $addcomma . "telefoon='$data->telefoon' ";
				$addcomma = ', ';
			}
			if (isset($data->slc)) {
				$sql .= $addcomma . "slc='$data->slc' ";
				$addcomma = ', ';
			}
			if (isset($data->hzemail)) {
				$sql .= $addcomma . "hzemail='$data->hzemail' ";
				$addcomma = ', ';
			}
			if (isset($data->groep)) {
				$sql .= $addcomma . "groep='$data->groep' ";
				$addcomma = ', ';
			}
			$sql .= "WHERE userid= '$existing->userid'";
			$res = self::$mysqli->query($sql);
			return $this->get($data->userid);
		}
		
		protected function safe_Delete($safeData){
			$sql = "DELETE FROM STUDENT WHERE id= '$safeData'";
			$res = self::$mysqli->query($sql);
		}
	}
?>