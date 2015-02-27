<?php
require_once('accountmodel.class.php');
include_once('db.php'); 

/**
 * Deze klasse is verantwoordelijk voor de data die voor de hele site nodig is.
 */
    class SiteModel {
		
    	public $mysqli; // Het object dat de database verbinding bijhoudt
    	
		public $page;
		
		public $request = "GET";
		
		public $action = "READ";

		public $error = "";
		
		public $success = "";
		
		public $account;
		
		public function __construct() {
			$this->mysqli = connectDB();
			$this->account = new AccountModel($this);
			$this->page = basename($_SERVER["PHP_SELF"]);
			$this->request = $_SERVER['REQUEST_METHOD'];
			if (isset($_REQUEST['action'])) {
				$this->action = strtoupper($_REQUEST['action']);
			}
		}
	
		public function hasErrors() {
			return strlen($this->error)>0;
		}
		
		public function hasSuccess() {
			return strlen($this->success)>0;
		}
		
		public function isLoggedin() {
			return $this->account->isAuthenticated();
		}
		
    }
?>