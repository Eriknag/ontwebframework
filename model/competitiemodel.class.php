<?php
	require_once('util/formvalidationtools.php');
	
    class CompetitieModel {
    	
		private $site;
		
		public $current;
		
		public function __construct($site) {
			$this->site = $site;
			$this->currentItem = $this->buildItemObjectFromArray(null);
		}
		
		/**
		 * Helper methode om van een array een object te maken met de juiste properties.
		 * Deze methode creeert een nieuw object en probeert zoveel mogelijk eigenschappen 
		 * te vullen met data uit de array.
		 * 
		 * @param $row Array met data.
		 * 
		 * @return een stdClass Object met alle eigenschappen van dit data item, met daarin zoveel
		 * 			mogelijk data gevuld uit $row
		 */		
		private function buildItemObjectFromArray($row) {
			// DEZE METHODE KENT ALLE PROPERTIES VAN DIT DATA ITEM
			$item = new stdClass();
			$item->id = "";
			$item->klasse = "";
			$item->teamnaam = "";
			if (isset($row)) {
				// Gebruik de propertynamen van $item om waarden op te halen uit $row
			    $has = get_object_vars($item);
			    foreach ($has as $name => $oldValue) {
			        $item->$name = isset($row[$name]) ? $row[$name] : "";
			    }
			}
			return $item;
		}
		
		/**
		 * Helper method om POST data uit het request om te zetten naar een data object. Daarbij wordt alle input
		 * zoveel mogelijk 'opgeschoont' en gevalideerd.
		 * 
		 * @return een stdClass object met userdata, null als er iets fout is gegaan  
		 */
		private function buildItemObjectFromPOST($isNew) {
			// STAP 1 object bouwen uit requestdata
			$item = $this->buildItemObjectFromArray($_POST);
			
			// STAP 2 valideren van de data
		    $error_message = "";
			$error_message .= validateLength($item->klasse, 1, 'De klasse is niet valide.');
			$error_message .= validateLength($item->teamnaam, 1, 'De teamnaam is niet valide.');
		
			// Er is iets mis als de lengte van error_message > 0
			if(strlen($error_message) > 0) {
				$this->site->error = $error_message;
				return null;			
			}
						
		    return $item;
		}
		
		public function readItems() {
			$res = $this->site->mysqli->query("SELECT * FROM COMPETITIE ORDER BY Klasse, Teamnaam");
			$result = Array();
			while ($row = $res->fetch_assoc()) {
			    $result[] = $this->buildItemObjectFromArray($row);
			}
			return $result;		
		}
		
		public function findItem($itemid) {
			$sql = "SELECT * FROM COMPETITIE WHERE ID=$itemid";
			$res = $this->site->mysqli->query($sql);
			if($row = $res->fetch_assoc()) {
				return $this->buildItemObjectFromArray($row);
			}
			return null;		
		}
		
		public function setCurrent($itemid) {
			$this->current = $this->findItem($itemid);
		}
    	
		/**
		 * Retourneert true als de opgegeven gebruikersnaam al bestaat
		 * @param de te controleren usernaam
		 * @return true als de opgegeven gebruikersnaam al bestaat
		 */
		public function itemIDExists($itemid) {
			return $this->findItem($itemid)!=null;	 	
		}
		
    	/**
		 * Voegt een nieuwe gebruiker toe aan het gebruikersgegevensbestand.
		 * 
		 * @return bij fout, wordt een foutbericht geretourneerd
		 */
    	public function insert() {
    		// Creeer nieuw object van de POST data
    		$newitem = $this->buildItemObjectFromPOST(true);
			if ($newitem==NULL) {
				return;
			}
    		// Maak een Prepared statement
			$sql = "INSERT INTO COMPETITIE(Klasse, Teamnaam) VALUES (?, ?)";
			if (!($stmt = $this->site->mysqli->prepare($sql))) {
			    $this->site->error = "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
				return;
			}
			// Bind data aan het Prepared statement
    		if (!$stmt->bind_param("ss", $newitem->klasse, $newitem->teamnaam)) 
			{
			    $this->site->error = "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
				return;
			}
			// Uitvoeren prepared statement
			if (!$stmt->execute()) {
			    $this->site->error = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
				return;
			}
			$this->site->success = "Item toegevoegd.";
    	}
		
		/**
		 * Wijzigt een bestaande gebruiker in het gebruikersgegevensbestand.
=		 * 
		 * @return bij fout, wordt een foutbericht geretourneerd
		 */
    	public function update() {
   			$updateditem = $this->buildItemObjectFromPOST(false);
			$sql = "UPDATE COMPETITIE SET Klasse=?, Teamnaam=? WHERE ID=?";
    		/* Prepared statement, stage 1: prepare */
			if (!($stmt = $this->site->mysqli->prepare($sql))) {
			    $this->site->error = "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
				return;
			}
			/* Prepared statement, stage 2: bind and execute */
    		if (!$stmt->bind_param("sss", $updateditem->klasse, 
    										$updateditem->teamnaam, 
    										$updateditem->id)) 
			{
			    $this->site->error = "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
				return;
			}
			
			if (!$stmt->execute()) {
			    $this->site->error = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
				return;
			}
			$this->site->success = "Item bijgewerkt.";
    	}
		
		/**
		 * Verwijdert een bestaande gebruiker uit het gebruikersgegevensbestand.
		 * @param $username gebruikersnaam van de toe te voegen gebruiker
		 * 
		 * @return bij fout wordt een foutbericht geretourneerd
		 */
    	public function delete() {
			// STAP 1 request controleren
		    if(!isset($_POST['itemid_list'])) {
		        return 'Het lijkt er op dat het formulier dat u gebruikt niet klopt.';       
		    } else {
		    	$sql = "DELETE FROM COMPETITIE WHERE ID = ?";
				$itemids = explode(',', $_POST['itemid_list']);
	    		/* Prepared statement, stage 1: prepare */
				if (!($stmt = $this->site->mysqli->prepare($sql))) {
				    $this->site->error = "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
					return;
				}
				foreach($itemids as $itemid) {
					if ($this->itemIDExists($itemid)) {
						/* Prepared statement, stage 2: bind and execute */
			    		if (!$stmt->bind_param("i", $itemid)) 
						{
						    $this->site->error = "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
							return;
						}
						
						if (!$stmt->execute()) {
						    $this->site->error = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
							return;
						}
						$this->site->success = "Item(s) succevol verwijderd";
					}
				}
			}
    	}
		
	}
?>