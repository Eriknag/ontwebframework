<?php
require_once('accountmodel.class.php');
//include_once('model/db.php'); //wordt niet correct geladen met relative path

/**
 * Deze klasse is verantwoordelijk voor de data die voor de hele site nodig is.
 */
    class SiteModel {
		
    	public $mysqli; // Het object dat de database verbinding bijhoudt
    	
		public $currentPage = "";
		
		public $currentModule = "";
		
		public $currentTemplate = "index";
		
		public $request = "GET";
		
		public $action = "READ";

		public $error = "";
		
		public $success = "";
		
		public $account;
		
		public function __construct() {
			$this->mysqli = $this->connectDB();
			$this->account = new AccountModel($this);
			$this->request = $_SERVER['REQUEST_METHOD'];
			if (isset($_REQUEST['page'])) {
				$this->currentPage = $_REQUEST['page'];
			}
			if (isset($_REQUEST['module'])) {
				$this->currentModule = "modules/".$_REQUEST['module']."/";
			}
			if (isset($_REQUEST['action'])) {
				$this->action = $_REQUEST['action'];
			}
		}
		
		private function connectDB() {
			// De p: voor localhost zorgt voor een "persisten connection". Dit houdt de verbinding met de MySQL database 
			// in stand tussen verschillende requests door, en scheelt veel in responsetijden van de server.
			$mysqli = new mysqli("p:localhost", "dbtest", "dbtest", "dbtest");
			$mysqli->set_charset("utf8");
			if ($mysqli->connect_errno) {
				return "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			return $mysqli;
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
			return strcmp($this->currentPage, "") === 0;
		}
		
		public function getPage() {
			return $this->currentModule."pages/".$this->currentPage.".php";
		}
		
		public function getTemplate() {
			return $this->currentModule."templates/".$this->currentTemplate.".tpl";
		}
		
		public function getActivePages(){
			$menu = Array();
			if($this->isLoggedin()){
				$result = $this->mysqli->query("SELECT COUNT(DISTINCT module) FROM page");
				if ($result->fetch_assoc() > 0) {
				    // output data of each row
				    $res_module = $this->mysqli->query("SELECT DISTINCT module AS 'mod' FROM page");
				    while($row = $res_module->fetch_assoc()) {
				        $res = $this->mysqli->query("SELECT name, uri FROM page WHERE module = '".$row['mod']."' ORDER BY name");
						$result_pages = $this->mysqli->query("SELECT COUNT(id) FROM page WHERE module = '".$row['mod']."'");
						$pages = Array();
						while($pageRow = $res->fetch_assoc()){
							$pagename = $pageRow['name'];
							$pageUri = $pageRow['uri'];
							array_push($pages, Array('pagename'=>$pagename, 'uri'=>$pageUri));
						}
						$module = array(
							'name' => $row['mod'],
							'pages' => $pages,
							'page_amount' => $result_pages->fetch_assoc()						
						);	
						array_push($menu, $module);
					}
				}
			}
			return $menu;
		}
    }
?>