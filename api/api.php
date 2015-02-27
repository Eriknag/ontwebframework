<?php

require_once '../data/usermanager.class.php';

 /*
 * Configuratie Slim.
 *
 * De volgende regels configureren de site, zodat Slim framework wordt gebruikt. Naast deze code moeten we ook de webserver (Apache)
 * laten weten dat ALLE http requests naar dit script worden gestuurd. Dit doe je door, in de root van de site een bestandje te 
 * maken met de naam .htaccess (vergeet de punt niet). De inhoud daarvan is:
 * 
 * RewriteEngine On
 * RewriteCond %{REQUEST_FILENAME} !-f
 * RewriteRule ^ index.php [QSA,L]
 * 
 */
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$request = \Slim\Slim::getInstance() -> request();

/*
 * Configureren van de routing. Dit zorgt ervoor dat specifieke URL's naar een bepaalde functie wijzen.
 */
/**
 * Retourneert een lijst met accounts (SLC's)
 * @param 'current' vraagt de huidige gebruiker op.
 */
$app->get('/users', function() {
	try {
		$mgr = new Usermanager();
		echo encode($mgr->query($_GET));
	} catch (Exception $e) {
		echo handleException($e);
	}
});

$app->get('/users/:id', function($id) {
	try {
		$mgr = new Usermanager();
		echo encode($mgr->get($id));
	} catch(Exception $e) {
		echo handleException($e);
	}
});

$app->post('/users', function() {
	try {
		$data = getData();
		$mgr = new Usermanager();
		echo encode($mgr->save($data));
	} catch(Exception $e) {
		echo handleException($e);
	}
});

$app->delete('/users/:id', function($id){
	try {
		$mgr = new Usermanager();
		echo encode($mgr->delete($id));
	} catch(Exception $e) {
		echo handleException($e);
	}
});

$app->get('/studenten', function() {
	try {
		$mgr = new Usermanager();
		echo encode($mgr->query($_GET));
	} catch (Exception $e) {
		echo handleException($e);
	}
});


/*
 * Dit laat het Slim framework zijn werk doen. Eigenlijk niet meer dan het analyseren van de URL en het 
 * aanroepen van de juiste functie.
 */
$app -> run();

/**
 * Utility functie voor het parsen van de json data
 */
function getData() {
	$request = \Slim\Slim::getInstance() -> request();
	$body = $request->getBody();
	$data = json_decode($body, false);
	return $data;
}

/**
 * Utility functie voor het omzetten van een php object naar json formaat
 */
function encode($data) {
	return json_encode($data, JSON_PRETTY_PRINT);
}

function handleException($e) {
	return encode($e->getMessage());
}
