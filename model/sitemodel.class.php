<?php
require_once('accountmodel.class.php');
include_once('model/db.php'); //wordt niet correct geladen met relative path

/**
 * Deze klasse is verantwoordelijk voor de data die voor de hele site nodig is.
 */
    class SiteModel {
		
    	public $mysqli; // Het object dat de database verbinding bijhoudt
    	
		public $page = "";
		
		public $module = "";
		
		public $template = "index";
		
		public $request = "GET";
		
		public $action = "READ";

		public $error = "";
		
		public $success = "";
		
		public $account;
		
		protected $activeModules;
		
		protected $activePages;
		
		public function __construct() {
			$this->mysqli = connectDB();
			$this->account = new AccountModel($this);
			//$this->page = basename($_SERVER["PHP_SELF"]);
			$this->request = $_SERVER['REQUEST_METHOD'];
			if (isset($_REQUEST['page'])) {
				$this->page = strtoupper($_REQUEST['page']);
			}
			if (isset($_REQUEST['module'])) {
				$this->module = "modules/".strtoupper($_REQUEST['module'])."/";
			}
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
		
		public function isDefaultPage() {
			return strcmp($this->page, "") === 0;
		}
		
		public function getPage() {
			return $this->module."pages/".$this->page.".php";
		}
		
		public function getTemplate() {
			return $this->module."templates/".$this->template.".tpl";
		}
		
		public function getActivePages(){
				
		}
    }
?>