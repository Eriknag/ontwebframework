<?php
//Zorgt ervoor dat mysqli exceptions gaat genereren bij fouten
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


    abstract class Manager {
    	
		protected static $mysqli;
		
		public function __construct() {
			if (self::$mysqli == null) {
				// De p: voor localhost zorgt voor een "persisten connection". Dit houdt de verbinding met de MySQL database 
				// in stand tussen verschillende requests door, en scheelt veel in responsetijden van de server.
			    self::$mysqli = new mysqli("p:localhost", "studs", "i3u4y276rweiry3i4", "studs");
				if (self::$mysqli->connect_errno) {
			    	throw new Exception("Failed to connect to MySQL: (" . self::$mysqli->connect_errno . ") " . self::$mysqli->connect_error);
				}
			}
			/* change character set to utf8 */
			if (!self::$mysqli->set_charset("utf8")) {
			    throw new Exception("Error loading character set utf8: %s\n", self::$mysqli->error);
			}
			
		}
		
		/**
		 * Voorkomt SQL-injection aanvallen 
		 */
		private function sanatize($input) {
			if (is_array($input)) {
				$result = Array();
				foreach($input as $key => $value) {
					$result[$key] = $this->sanatize($value);
				}
				return $result; 
			}
			if (is_object($input)) {
				$result = new stdClass();
			    $properties = get_object_vars($input);
			    foreach ($properties as $name => $value) {
			        $result->$name =  $this->sanatize($value);
			    }
				return $result;
			}
			return self::$mysqli->real_escape_string($input);
		}
		
		/**
		 * @param $params Array met parameters voor de query (doorgaans $_GET)
		 * @return Array met objecten van de resultset. (kan leeg zijn)
		 */
		public function query($params) {
			$sanatizedparams = $this->sanatize($params);
			return $this->safe_Query($sanatizedparams);
		}
		
		/**
		 * @param $snatizedparams Array met beveiligde parameters voor de query
		 * @return Array met objecten van de resultset. (kan leeg zijn)
		 */
		protected abstract function safe_Query($safeParams);
		
		
		/**
		 * @param $id PK waarde voor de te zoeken entiteit.
		 * @return een object, of NULL
		 */
		public function get($id) {
			$sanatizedId = $this->sanatize($id);
			return $this->safe_Get($sanatizedId);
		}
		
		protected function readSQL($sql) {
			//echo $sql;
			$res = self::$mysqli->query($sql);		
			$result = Array();
			while ($row = $res->fetch_assoc()) {
			    $result[] = (object) $row;
			}
			return $result;		
		}
		
		/**
		 * @param $sanatizedId beveiligde PK waarde voor de te zoeken entiteit.
		 * @return een object, of NULL
		 */
		protected abstract function safe_Get($safeId);
		
		
		/**
		 * Controleren, valideren en opslaan van een bestaand of nieuw object
		 *
		 * @param $data 
		 * @return Het opgeslagen object, of een @TODO Error
		 */
		public function save($data) {
			$sanatizedData = $this->sanatize($data);
			if($this->isValid($sanatizedData))
				return $this->safe_Save($sanatizedData);  
		}
		
		protected abstract function safe_Save($data);
		
		/**
		 * @return true als valide, anders een Exception
		 */
		protected abstract function isValid($data);
		
		
		public function delete($data) {
			$sanatizedData = $this->sanatize($data);
			return $this->safe_Delete($sanatizedData);
		}
		
		protected abstract function safe_Delete($safeData);
		
	 	/**
		 * Valideert een tekst op lengte.
		 * @param $text de te valideren tekst
		 * @param $minSize de minimaal vereiste lengte van de tekst
		 * @param $errorMsg het foutbericht dat geretourneerd wordt
		 * 
		 * @return het foutbericht als de lengte van de tekst kleiner is dan het minimum. 
		 * 			Anders een lege string.
		 */
	    protected function validateLength($text, $minSize, $errorMsg) {
	    	$result = "";
	    	if(strlen($text) < $minSize) {
	    		$result = $errorMsg . "<br/>";
	    	}
			return $result;
	    }
	
		/**
		 * Valideert een tekst op aanwezigheid van letters (a-z).
		 * @param $text de te valideren tekst
		 * @param $errorMsg het foutbericht dat geretourneerd wordt
		 * 
		 * @return het foutbericht als de tekst geen letters bevat. 
		 * 			Anders een lege string.
		 */
	    protected function validateCharacters($text, $errorMsg) {
			$regex_pattern = "/^[A-Za-z .'-]+$/";
			return validateRegex($regex_pattern, $text, $errorMsg);
	    }
	
		/**
		 * Valideert een tekst op aanwezigheid van letters (a-z).
		 * @param $text de te valideren tekst
		 * @param $errorMsg het foutbericht dat geretourneerd wordt
		 * 
		 * @return het foutbericht als de tekst geen letters bevat. 
		 * 			Anders een lege string.
		 */
	    protected function validateEmail($text, $errorMsg) {
			$regex_pattern = "/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/";
			return validateRegex($regex_pattern, $text, $errorMsg);
	    }
	
		/**
		 * Valideert een tekst met behulp van een reguliere expressie (regex)
		 * @param $regex_pattern het regex patroon waaraan de tekst moet voldoen
		 * @param $text de te valideren tekst
		 * @param $errorMsg het foutbericht dat geretourneerd wordt
		 * 
		 * @return het foutbericht als de tekst niet voldoet aan het regex patroon. 
		 * 			Anders een lege string.
		 */
	    protected function validateRegex($regex_pattern, $text, $errorMsg) {
	    	$result = "";
			$string_exp = "/^[A-Za-z .'-]+$/";
	    	if(!preg_match($regex_pattern, $text)) {
	    		$result = $errorMsg . "<br/>";
	    	}
			return $result;
	    }
	
	
    }
?>