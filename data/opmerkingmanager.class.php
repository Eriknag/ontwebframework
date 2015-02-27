<?php
	require_once('manager.class.php');
	
    class Opmerkingmanager extends Manager {
    	
		/*
		 * Overrriden omdat we ook reacties erbij laden
		 */
		public function query($params) {
			$sanatizedparams = $this->sanatize($params);
			$result = $this->safe_Query($sanatizedparams);
			foreach ($result as $value) {
				$reactieparams = array('parent' => $value->id);
				$value->reacties = parent::read($reactieparams);
			}
			return $result; 
		}
		
		protected function safe_Query($safeParams){
			$sqlwhere = "WHERE ";
			if (isset($safeParams['id'])) {
				$sqlwhere .= "id='".$safeParams['id']."'";
			} else {
				if (isset($safeParams['studentnummer'])) {
					$sqlwhere .= "studentnummer='".$safeParams['studentnummer']."' AND parent IS NULL";
				} else {
					if (isset($safeParams['parent'])) {
						$sqlwhere .= "parent='".$safeParams['studentnummer']."'";
					}
				}
			}
			$sql = "SELECT O.*, ".
					"CONCAT(U.voornaam, IF(U.tussenvoegsel IS NOT NULL, CONCAT(' ',U.tussenvoegsel),''), ' ', U.achternaam) AS auteurfn ".
					"FROM OPMERKING O INNER JOIN USER U ON O.auteur=U.userid $sqlwhere ORDER BY datumtijd DESC";
			return $this->readSQL($sql);	
		}
		
		protected function safe_Get($safeId) {
			$idparams = array('id' => $safeId);
			$resultArray = $this->query($idparams);
			if(sizeof($resultArray)>0)
				return $resultArray[0];	
		}
		
		protected function isValid($data){
			$msg = "";
			if(!isset($data->studentnummer) || strlen($data->studentnummer)==0) {
				$msg .= "Studentnummer is niet ingevuld\n";
			} else {
				if(is_numeric($data->studentnummer))
					$msg .= "Studentnummer moet een getal zijn, in plaats van ". $data->id;
			}
			if(!isset($data->auteur) || strlen($data->auteur)==0)
				$msg .= "Voornaam is niet ingevuld\n";
			if(!isset($data->aantekening) || strlen($data->aantekening)==0)
				$msg .= "De tekst is niet ingevuld\n";
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
			$sql = "INSERT INTO OPMERKING(parent, studentnummer, auteur, datumtijd, aantekening) VALUES (";
			if (isset($data->parent)) {
				$sql .= "'$data->parent', ";
			} else {
				$sql .= "NULL, ";				
			}
			$sql .= "$data->studentnummer, ";
			$sql .= "'$data->auteur', ";
			$sql .= "now(), ";
			$sql .= "'$data->aantekening', ";
			$sql .= ")";
			$res = self::$mysqli->query($sql);
			return $this->get(parent::$mysqli->insert_id);
		}
		
		private function doUpdate($data, $existing) {
			throw new Exception("Een opmerking mag niet worden bijgewerkt");
		}
		
		protected function safe_Delete($safeData){
			$sql = "DELETE FROM OPMERKING WHERE id= '$safeData'";
			$res = self::$mysqli->query($sql);
		}
	}
?>