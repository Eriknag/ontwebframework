<?php
	require_once('util/formvalidationtools.php');
	
    class UsersModel {
    	
    	public $currentUser;
		
		private $site;
		
		public function __construct($site) {
			$this->site = $site;
			$this->currentUser = $this->buildUserFromArray(null);
		}
		
		public function readUsers() {
			$res = $this->site->mysqli->query("SELECT * FROM user ORDER BY lastname");
			$result = Array();
			while ($res && ($row = $res->fetch_assoc()) !== null) {
			    $result[] = $this->buildUserFromArray($row);
			}
			return $result;		
		}
		
		public function findUser($username) {
			$sql = "SELECT * FROM user WHERE username='$username'";
			$res = $this->site->mysqli->query($sql);
			if($res && ($row = $res->fetch_assoc()) !== null) {
				return $this->buildUserFromArray($row);
			}
			return null;		
		}
		
		private function buildUserFromArray($row) {
			$user = new stdClass();
			$user->username = "";
			$user->firstname = "";
			$user->lastname = "";
			$user->email = "";
			$user->telephone = "";
			$user->password = "";
			if (isset($row)) {
				$user->username = $row['username'];
				$user->firstname = $row['firstname'];
				$user->lastname = $row['lastname'];
				$user->email = $row['email'];
				$user->telephone = $row['telephone'];
				$user->password = $row['password'];
			}
			return $user;
		}
		
		public function setCurrentUser($username) {
			$this->currentUser = $this->findUser($username);
		}
    	
		/**
		 * Retourneert true als de opgegeven gebruikersnaam al bestaat
		 * @param de te controleren usernaam
		 * @return true als de opgegeven gebruikersnaam al bestaat
		 */
		public function usernameExists($username) {
			return $this->findUser($username)!=null;	 	
		}
		
    	/**
		 * Voegt een nieuwe gebruiker toe aan het gebruikersgegevensbestand.
		 * 
		 * @return bij fout, wordt een foutbericht geretourneerd
		 */
    	public function insert() {
    		// Creeer nieuw object van de POST data
    		$newuser = $this->buildUserdataFromPOST(true);
			if ($newuser==NULL) {
				$this->site->error = "Gegevens nieuwe gebruiker kloppen niet";
				return;
			}
    		/* Prepared statement, stage 1: prepare */
			$sql = "INSERT INTO USER(username, firstname, lastname, email, telephone, password) VALUES (?, ?, ?, ?, ?, ?)";
			if (!($stmt = $this->site->mysqli->prepare($sql))) {
			    $this->site->error = "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
				return;
			}
			/* Prepared statement, stage 2: bind and execute */
			$hash = crypt($newuser->password, 'fietsbel');
    		if (!$stmt->bind_param("ssssss", $newuser->username, 
    										 $newuser->firstname, 
    										 $newuser->lastname, 
    										 $newuser->email, 
    										 $newuser->telephone,
											 $hash	)) 
			{
			    $this->site->error = "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
				return;
			}
			
			if (!$stmt->execute()) {
			    $this->site->error = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
				return;
			}
			$this->site->success = "Gebruiker toegevoegd.";
    	}
		
		/**
		 * Wijzigt een bestaande gebruiker in het gebruikersgegevensbestand.
=		 * 
		 * @return bij fout, wordt een foutbericht geretourneerd
		 */
    	public function update() {
   			$updateduser = $this->buildUserdataFromPOST(false);
			$sql = "UPDATE USER SET firstname=?, lastname=?, email=?, telephone=? WHERE username=?";
    		/* Prepared statement, stage 1: prepare */
			if (!($stmt = $this->site->mysqli->prepare($sql))) {
			    $this->site->error = "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
				return;
			}
			/* Prepared statement, stage 2: bind and execute */
    		if (!$stmt->bind_param("sssss", $updateduser->firstname, 
    										$updateduser->lastname, 
    										$updateduser->email, 
    										$updateduser->telephone, 
    										$updateduser->username)) 
			{
			    $this->site->error = "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
				return;
			}
			
			if (!$stmt->execute()) {
			    $this->site->error = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
				return;
			}
			$this->site->success = "Gebruiker bijgewerkt.";
    	}
		
		/**
		 * Verwijdert een bestaande gebruiker uit het gebruikersgegevensbestand.
		 * @param $username gebruikersnaam van de toe te voegen gebruiker
		 * 
		 * @return bij fout wordt een foutbericht geretourneerd
		 */
    	public function delete() {
			// STAP 1 request controleren
		    if(!isset($_POST['username_list'])) {
		        return 'Het lijkt er op dat het formulier dat u gebruikt niet klopt.';       
		    } else {
		    	$sql = "DELETE FROM User WHERE username = ?";
				$usernames = explode(',', $_POST['username_list']);
	    		/* Prepared statement, stage 1: prepare */
				if (!($stmt = $this->site->mysqli->prepare($sql))) {
				    $this->site->error = "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
					return;
				}
				foreach($usernames as $username) {
					if ($this->usernameExists($username)) {
						/* Prepared statement, stage 2: bind and execute */
			    		if (!$stmt->bind_param("s", $username)) 
						{
						    $this->site->error = "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
							return;
						}
						
						if (!$stmt->execute()) {
						    $this->site->error = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
							return;
						}
						$this->site->success = "Gebruiker(s) succevol verwijderd";
					}
				}
			}
    	}
				
		/**
		 * Helper method om het request om te zetten naar een user object.
		 * 
		 * @return een stdClass object met userdata, null als er iets fout is gegaan  
		 */
		private function buildUserdataFromPOST($isNew) {
			// STAP 1 request controleren
		    if(!isset($_POST['username']) ||
		        !isset($_POST['firstname']) ||
		        !isset($_POST['lastname']) ||
		        !isset($_POST['email']) ||
		        !isset($_POST['telephone']) ||
		        !isset($_POST['password'])) {
		        $this->site->error = 'Het lijkt er op dat het formulier dat u gebruikt niet klopt.';
				return;       
		    } 
				
			// STAP 2 object bouwen uit requestdata
			$user = new stdClass();
			$user->username = $_POST['username'];
			$user->firstname = $_POST['firstname'];
			$user->lastname = $_POST['lastname'];
			$user->email = $_POST['email'];
			$user->telephone = $_POST['telephone'];
			$user->password = $_POST['password'];
						
			// STAP 3 valideren
		 	// Valideer input
		    $error_message = "";
			$error_message .= validateCharacters($user->username, 'De usernaam is niet valide.');
			// Extra validatie: kijk of usernaam al bestaat, alleen bij insert
			if($isNew && $this->usernameExists($user->username)) {
				$error_message .= 'De usernaam bestaat al.<br />';
			}			
			$error_message .= validateCharacters($user->firstname, 'De voornaam is niet valide.');
			$error_message .= validateCharacters($user->lastname, 'De achternaam is niet valide.');
			$error_message .= validateEmail($user->email, 'Het email adres is niet valide');
			//$error_message .= validateLength($user->telephone, 1, 'Het telefoonnummer is niet ingevuld.');
			$error_message .= validateLength($user->password, 4, 'Het wachtwoord is te kort.');
		
			// Er is iets mis als de lengte van error_message > 0
			if(strlen($error_message) == 0) {
			    return $user;
			}
			$this->site->error = $error_message;
			return null;			
						
		}
		
	}
?>