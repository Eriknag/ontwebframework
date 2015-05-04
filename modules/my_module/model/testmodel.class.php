<?php
	
	class testModel {
		
		public $teststring;
		
		public function __construct() {
				$this->teststring = "Dit is wat tekst op een pagina";
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