// ========================= Hieronder de (standaard) validatie functies =========================

function validateUsername(field) {
	var lengthResult = validateLength(field, 3);
	
	if(lengthResult==false) {
		return false;
	}
	
	// Alle opmaak weghalen
	field.removeAttr('class');
	fieldInfo.removeAttr('class');
	
	// strUrl is whatever URL you need to call
	var url = "checkusername.php?username=" + field.val();

	/*
	 * Let op! dit is niet asynchroon, maar synchroon.
	 * Dus niet AJAX, maar SJAX.
	 * Dit moet omdat we hier op het resultaat moeten wachten
	 * van het php script.
	 */
	var result = $.ajax({
		type: "GET",
		url: url,
		cache: false,
		async: false
    }).responseText;
	
	if (result==='true') {
		field.addClass("error");
		fieldInfo.text("Gebruikersnaam bestaat al");
		fieldInfo.addClass("error");
		return false;
	} else {
		field.addClass("success");
		fieldInfo.text("Correct");
		fieldInfo.addClass("success");
		return true;
	}
}


/**
 * Functie 'validateLength, controleert of de opgegeven waarde voldoet aan de opgegeven lengte.
 * @param field De naam van het input veld
 * @param fieldInfo De naam van de info <span>
 * @param length De minimale lengte waar de waarde aan moet voldoen
 */
function validateLength(field, length) {
	/*
	 * Haal het element op waarin het resultaat van de evaluatie komt te staan. Dit gaat ervan uit dat 
	 * het ID van dat element gelijk is aan het ID van het formulierveld (input, textarea, etc.) waarachter
	 * de tekst 'ValResult' is gezet. 
	 * 
	 * Een input met ID #test gebruikt dus een element met ID #testValResult om het resultaat weer te geven.
	 */
	var fieldID = field.attr('id');
	var fieldInfo = $("#" + fieldID + 'ValResult');
	
	// Alle opmaak weghalen
	field.removeAttr('class');
	fieldInfo.removeAttr('class');
	
	// Check of lengte kleiner is dan opgegeven lengte
	var tooSmall = field.val().length < length;
	if(tooSmall) {
		field.addClass("error");
		fieldInfo.text("Geen/te korte invoer (minimaal " + length + " tekens)");
		fieldInfo.addClass("error");
		return false;
    } else {
		field.addClass("success");
		fieldInfo.text("Correct");
		fieldInfo.addClass("success");
		return true;
    }
}

/**
 * Functie 'validateEmail, controleert of de opgegeven waarde voldoet aan de reguliere expressie
 * voor email.
 * @param field De naam van het input veld
 */
function validateEmail(field) {
	/*
	 * Haal het element op waarin het resultaat van de evaluatie komt te staan. Dit gaat ervan uit dat 
	 * het ID van dat element gelijk is aan het ID van het formulierveld (input, textarea, etc.) waarachter
	 * de tekst 'ValResult' is gezet. 
	 * 
	 * Een input met ID #test gebruikt dus een element met ID #testValResult om het resultaat weer te geven.
	 */
	var fieldID = field.attr('id');
	var fieldInfo = $("#" + fieldID + 'ValResult');
	
	field.removeAttr('class');
	fieldInfo.removeAttr('class');
	
	// Check de positie van @ en de laatste .
	var x = field.val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    // Check of @ en . voorkomen en dat de @ voor de . staat
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		field.addClass("error");
		fieldInfo.text("Geen/ongeldig e-mailadres ingevoerd");
		fieldInfo.addClass("error");
		return false;
    } else {
		field.addClass("success");
		fieldInfo.text("Gevalideerd e-mailadres");
		fieldInfo.addClass("success");
		return true;
    }
}

