<?php
	// Die Adresse des Empfängers:
	$mail_empfaenger = "dark-rain.info@web.de";
	
	// Die Formularabhängigen Daten werden je nach getätigtem Formular in die dazugehörigen Variablen geschrieben
	// Kontaktformular:
	if (isset($_POST['mail_senden'])) {
		$mail_absender = $_POST['email'];
		$name = $_POST['vorname']." ".$_POST['name'];
		$betreff = $_POST['mail_senden'];
		$kategorie = $_POST['betreffradio'];
		$mail_betreff = "E-Mail von <u>".$name."</u> zum Thema <u>".$betreff."</u> in der Kategorie <u>".$kategorie."</u>:<br />";
		$mail_text = $_POST['mail_senden'];
	}
	
	// Versenden der eigentlichen E-Mail mit allen "mail_"-Daten
	if (mail($mail_empfaenger,$mail_betreff,$mail_text,"von: $mail_absender")) {
		header('Location: http://www.dark-rain.info/kontakt/bestaetigung.de.html');
	}
	else {
		echo "Beim Versenden der E-Mail ist ein Fehler aufgetreten.";
	}
?>