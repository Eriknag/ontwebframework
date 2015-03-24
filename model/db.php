<?php
	function connectDB() {
		// De p: voor localhost zorgt voor een "persisten connection". Dit houdt de verbinding met de MySQL database 
		// in stand tussen verschillende requests door, en scheelt veel in responsetijden van de server.
		$mysqli = new mysqli("p:localhost", "dbtest", "dbtest", "dbtest");
		$mysqli->set_charset("utf8");
		if ($mysqli->connect_errno) {
			return "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		return $mysqli;
	}
?>