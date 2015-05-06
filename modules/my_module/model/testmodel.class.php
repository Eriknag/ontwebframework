<?php
	
	class testModel {
		
		private $site;
		
		public $teststring;
		
		public function __construct($site) {
				$this->site = $site;
				$res = $this->site->mysqli->query("SELECT * FROM user WHERE username='".$site->account->getCurrentUser()->username."'");
				$usertel = $res->fetch_assoc()['telephone'];
				$this->teststring = "Dit je jouw telefoornnummer: ".$usertel;
		}
		
		public function getTestLink(){
			$links = [	"http://www.banaangezond.nl/waarom-zijn-bananen-krom/",
							"http://www.google.com",
							"http://9gag.com/",
							"http://en.wikipedia.org/wiki/Special:Random",
							"http://www.smarty.net/" ];
			$num = rand(0,4);
			return $links[$num];
		}
	}

?>