<?php
	require_once('util/formvalidationtools.php');
	 
	// Een constante voor de naam van het JSON bestand
	define('DATASTORE', 'data/users.json');
	 
    class UsersModel {
    	//TODO currentUser
    	//TODO insert
    	//TODO update
    	//TODO delete
    	
    	public $currentUser;
		
		public $error = "";
		
		public $success = "";
		
		public $userdata;
		
		public function __construct() {
			// gebruikersdata inlezen uit json in een array
		    $str = file_get_contents(DATASTORE);
			$this->userdata = json_decode($str);
			
			$user = new stdClass();
			$user->username = "";
			$user->firstname = "";
			$user->lastname = "";
			$user->email = "";
			$user->telephone = "";
			$user->password = "";
			$this->currentUser = $user;
		}
		
		public function hasErrors() {
			return strlen($this->error)>0;
		}
		
		public function hasSuccess() {
			return strlen($this->success)>0;
		}
		
		public function setCurrentUser($username) {
			$this->currentUser = $this->findUser($username);
		}
    	
		public function findUser($username) {
			foreach ($this->userdata as $value) {
				if ($value->username==$username)
				return $value;
			}
			return null;			
		}
		
		/**
		 * Voegt een nieuwe gebruiker toe aan het gebruikersgegevensbestand.
		 * @param $username gebruikersnaam van de toe te voegen gebruiker
		 * @param $password wachtwoord van de toe te voegen gebruiker
		 * 
		 * @return bij fout, wordt een foutbericht geretourneerd
		 */
    	public function insert() {
    		$this->_update(true);
    	}
		
		/**
		 * Wijzigt een bestaande gebruiker in het gebruikersgegevensbestand.
		 * @param $username gebruikersnaam van de toe te voegen gebruiker
		 * @param $password wachtwoord van de toe te voegen gebruiker
		 * 
		 * @return bij fout, wordt een foutbericht geretourneerd
		 */
    	public function update() {
    		$this->_update(false);
    	}
		
    	private function _update($isNew) {
    		$newuser = $this->buildUserdataFromPOST($isNew);
			if ($newuser!=null) {
				$this->userdata->{$newuser->username} = $newuser;
				$this->writeUsers();
				if ($isNew) {
					$this->success = "Gebruiker succevol toegevoegd";
				} else {
					$this->success = "Gebruiker succevol aangepast";
				}
			}
    	}
		
		/**
		 * Verwijdert een bestaande gebruiker uit het gebruikersgegevensbestand.
		 * @param $username gebruikersnaam van de toe te voegen gebruiker
		 * 
		 * @return bij fout wordt een foutbericht geretourneerd
		 */
    	public function delete() {
			// STAP 1 request controleren
		    if(!isset($_POST['user_name'])) {
		        $this->error = 'Het lijkt er op dat het formulier dat u gebruikt niet klopt.';       
		    } else {
				$usernames = explode(',', $_POST['user_name']);
				foreach($usernames as $username) {
					if ($this->usernameExists($username)) {
						unset($this->userdata->{$username});
						$this->writeUsers();
						$this->success = "Gebruiker(s) succevol verwijderd";
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
		    if(!isset($_POST['user_name']) ||
		        !isset($_POST['first_name']) ||
		        !isset($_POST['last_name']) ||
		        !isset($_POST['email']) ||
		        !isset($_POST['telephone']) ||
		        !isset($_POST['password'])) {
		        $this->error = 'Het lijkt er op dat het formulier dat u gebruikt niet klopt.';       
		    } 
				
			// STAP 2 object bouwen uit requestdata
			$user = new stdClass();
			$user->username = $_POST['user_name'];
			$user->firstname = $_POST['first_name'];
			$user->lastname = $_POST['last_name'];
			$user->email = $_POST['email'];
			$user->telephone = $_POST['telephone'];
			$user->password = $_POST['password'];
						
			// STAP 3 valideren
		 	// Valideer input
		    $error_message = "";
			$error_message .= validateCharacters($user->username, 'De usernaam is niet valide.');
			// Extra validatie: kijk of usernaam al bestaat, alleen bij insert
			if($isNew && $this->usernameExists($user)) {
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
			$this->error = $error_message;
			return null;			
						
		}
		
		/**
		 * Retourneert true als de opgegeven gebruikersnaam al bestaat
		 * @param de te controleren usernaam
		 * @return true als de opgegeven gebruikersnaam al bestaat
		 */
		public function usernameExists($username) {
			return $this->findUser($username)!=null;	 	
		}
		
		/*
		 * Helper functie om het gebruikersgegevensbestand weg te schrijven
		 */
		private function writeUsers() {
			$str = json_encode($this->userdata, JSON_PRETTY_PRINT);
			// Write the encoded string to a file
			file_put_contents(DATASTORE, $str);
		}
		
	}
?>