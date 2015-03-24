<?php
require_once('usersmodel.class.php');

    class AccountModel {
    	
		private $site;
		
		private $usersmodel;
		
		public function __construct($site) {
			$this->site = $site;
			$this->usersmodel = new UsersModel($site);
		}
		
		
		/**
		 * Authenticeert de gebruiker door meegestuurde logingegevens te vergelijken met
		 * het gebruikersgegevensbestand. Als gegevens overeenstemmen, dan worden enkele
		 * sessievariabelen geset (en eventueel een sessie gestart).
		 * @param $username te controleren gebruikersnaam
		 * @param $password te controleren wachtwoord
		 * @return TRUE als gebruiker is geauthentiseerd, FALSE als niet
		 */
		public function authenticateUser($username, $password) {
			$user = $this->usersmodel->findUser($username);
			$hash = crypt($password, 'fietsbel');
			if($user!=null) {
				if($user->password===$hash) {
					if (!isset($_SESSION)) {
						session_start();
					}
					$_SESSION['loggedin'] = true;
					$_SESSION['username'] = $username;
					return true;
				}return $user;
			}
			return false;
		}
		 
		/**
		 * Zorgt ervoor dat de gebruiker niet meer geaunthenticeerd is in deze sessie.
		 */
		public function unauthenticateUser() {
			unset($_SESSION['loggedin']);
			unset($_SESSION['username']);
			//session_destroy();
		}
		 
		/**
		 * Controleert of het request is gedaan door een geauthentiseerde gebruiker
		 * @return TRUE als gebruiker een geauthentiseerde gebruiker is, anders FALSE 
		 */
		public function isAuthenticated() {
			if (!isset($_SESSION)) {
				return false;
			}
		 	return isset($_SESSION['loggedin']);
		}
		 
		/**
		 * Retourneert de gebruikersnaam van de geauthentiseerde gebruiker, anders een 
		 * waarschuwingsbericht.
		 * @return e gebruikersnaam van de geauthentiseerde gebruiker, anders een 
		 * waarschuwingsbericht.
		 */
		public function getAuthenticatedUsername() {
		 	if(!$this->isAuthenticated()) {
		 		return "<USER NOT AUTHENTICATED>";
		 	}
			return $_SESSION['username'];
		}
		 
		
		
    }
?>