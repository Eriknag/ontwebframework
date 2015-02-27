<?php
   	require_once('util/formvalidationtools.php');

    class ContactModel {
    	
		public $sitemodel;
		
		public $success = "";
		
		public function __construct($sitemodel) {
			$this->sitemodel = $sitemodel;
		}
		
		public function sendMail() {
		    // Als eerste stap controleren en valideren we alle data uit het form
		    if(!isset($_POST['first_name']) ||
		        !isset($_POST['last_name']) ||
		        !isset($_POST['email']) ||
		        !isset($_POST['telephone']) ||
		        !isset($_POST['comments']) ||
		        !isset($_POST['captcha_code'])) {
		        $this->sitemodel->error = 'Het lijkt er op dat het formulier dat u gebruikt niet klopt.';       
		    }
				 
		    $first_name = $_POST['first_name']; // required
		    $last_name = $_POST['last_name']; // required
		    $email_from = $_POST['email']; // required
		    $telephone = $_POST['telephone']; // not required
		    $tekst = $_POST['comments']; // required
		    $captchacode = $_POST['captcha_code']; // required
			
		    // error_message wordt gevuld als er foutberichten zijn 
		    $error_message = "";
			$error_message .= validateCharacters($first_name, 'De voornaam bevat ongeldige karakters');
			$error_message .= validateCharacters($last_name, 'De achternaam bevat ongeldige karakters');
			$error_message .= validateEmail($email_from, 'Het email adres is niet valide');
			$error_message .= validateLength($tekst, 10, 'De inhoud van het bericht is te kort (minimaal 10 tekens).');
			$error_message .= validateCaptcha($captchacode, 'De beveiligingscode (captcha) komt niet overeen');

			// Er is iets mis als de lengte van error_message > 0
			if(strlen($error_message) > 0) {
			    $this->sitemodel->error = $error_message;
			} else {
			     
			    $email_to = "daan.de.waard@hz.nl";
			    $email_subject = "website html form submissions";
								
				$email_message = "Form details below.\n\n";
				     
				$email_message .= "First Name: ".$this->clean_string($first_name)."\n";
				$email_message .= "Last Name: ".$this->clean_string($last_name)."\n";
				$email_message .= "Email: ".$this->clean_string($email_from)."\n";
				$email_message .= "Telephone: ".$this->clean_string($telephone)."\n";
				$email_message .= "Comments: ".$this->clean_string($tekst)."\n";
				          
				// create email headers
				$headers = 'From: '.$email_from."\r\n".
				'Reply-To: '.$email_from."\r\n" .
				'X-Mailer: PHP/' . phpversion();
				@mail($email_to, $email_subject, $email_message, $headers); 
				
				$this->sitemodel->success = 'Dank u voor het bericht. Wij nemen binnenkort contact met u op.';
			}
		}

		private function clean_string($string) {
			// Beveilig content tegen SMTP injection
			$bad = array("content-type","bcc:","to:","cc:","href");
			return str_replace($bad,"",$string);
		}
	
    }
?>