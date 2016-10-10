<?php include '../include/head1.php'; ?>
	<title>Dark Rain - Kontaktformular</title>
<?php include '../include/head2.php'; ?>


	<h1>Kontakt</h1>
	<h2>E-Mail Adressen</h2>
	<ul style="font-family: monospace;">
		<li><div style="width: 100px;float:left;">Dark Rain:</div><a href="mailto:mail@darkrain-band.de">mail@darkrain-band.de</a></li>
		<li><div style="width: 100px;float:left;">Harry:</div><a href="mailto:harry@darkrain-band.de">harry@darkrain-band.de</a></li>
		<li><div style="width: 100px;float:left;">Katja:</div><a href="mailto:katja@darkrain-band.de">katja@darkrain-band.de</a></li>
		<li><div style="width: 100px;float:left;">Sarah:</div><a href="mailto:sarah@darkrain-band.de">sarah@darkrain-band.de</a></li>
		<li><div style="width: 100px;float:left;">Markus:</div><a href="mailto:markus@darkrain-band.de">markus@darkrain-band.de</a></li>
	</ul>
	
	<h2>Kontaktformular</h2>
	<p class="inhalt1">
		Du willst mit uns Kontakt aufnehmen? - Gerne. Schick uns einfach dieses Formular (Felder mit * m&uuml;ssen
		ausgef&uuml;llt werden) und wir melden uns bei dir.
	</p>
<?php
// Formular�berpr�fung
//-----------------------------
$mail = preg_match_all("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)[a-zA-Z]{2,3}$^",$_POST["email"],$match);
if (isset($_POST["email"]) && $mail== false) {$check1 = false;}
if (isset($_POST["vorname"]) && strlen($_POST["vorname"]) < 2) {$check2 = false;}
if (isset($_POST["betreff"]) && strlen($_POST["betreff"]) == 0) {$check3 = false;}
if (isset($_POST["message"]) && strlen($_POST["message"]) < 10) {$check4 = false;}

// Versenden der E-Mail, falls allesnotwendige eingetragen wurde
// --------------------------------------------------------------------------
if (!(isset($check1)) && !(isset($check2)) && !(isset($check3)) && !(isset($check4))) {
	// Die Adresse des Empf�ngers:
	$mail_empfaenger = "mail@darkrain-band.de";
	
	// Die Formularabh�ngigen Daten werden je nach get�tigtem Formular in die dazugeh�rigen Variablen geschrieben
	// Kontaktformular:
	if (isset($_POST['mail_senden'])) {
		$mail_absender = $_POST['email'];
		$name = $_POST['vorname']." ".$_POST['name'];
		$betreff = $_POST['betreff'];
		$kategorie = $_POST['betreffradio'];
		$mail_betreff = "E-Mail von ".$name." zum Thema ".$betreff." in der Kategorie ".$kategorie;
		$mail_text = $_POST['message'];
		
		// Versenden der eigentlichen E-Mail mit allen "mail_"-Daten
		if (!(mail($mail_empfaenger,$mail_betreff,$mail_text,"from:$mail_absender\r\n"))) {
			echo "<h3>Es ist ein Fehler beim Versenden der E-Mail aufgetreten.</h3>";
		}
		else {
			echo "<h3>Ihre Anfrage wurde versendet!</h3>";
			
			// Erstellen der Verbindung zur MySQL-Datenbank (Benutzerdaten werden aus der eingebundenen Datei config.inc.php geholt
			// -------------------------------------------------------------------------------------------------------------------------------------------------
				// Einbinden der Konfigurationsdatei
				include_once '../inc/config.inc.php';
					  
				// Erstellen der Verbindung zur MySQL-Datenbank
				if( !$connection = mysql_connect( $_config['host'], $_config['user'], $_config['password'] ) ) 
				{
					die( 'Verbindung zum Datenbankserver konnte nicht hergestellt werden.' );
				}
				
				// Auswahl der spezifischen Datenbank
				if( !mysql_select_db( $_config['database'], $connection ) ) 
				{
					die ( 'Die Datenbank ' . $_config['database'] . ' kann nicht verwendet werden. <br /> MySQL-Error: <br />' . mysql_error() );
				}
				
				// Eintragen der neuen Migliederdaten f�r den Newsletter in die Datenbank
				// -------------------------------------------------------------------------------------
				$sql = 'INSERT INTO kontakt SET 
						id="",
						vorname="'.$_POST['vorname'].'",
	 					nachname="'.$_POST['name'].'",
						betreff="'.$_POST['betreff'].'",
						kategorie="'.$_POST['betreffradio'].'",
						email="'.$_POST['email'].'", 
	 					message="'.$_POST['message'].' " ';
						
				//Eigentliche Datenbankanfrage
				mysql_query($sql) or die ('<h3>Error in ' . $sql . '. MySQL-Error: ' . mysql_error().'</h3>');
		}
	}
}
?>

	<form method="post" action="kontakt.php" name="kontaktFormular">
	<br />
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="125" class="inhalt1bold">
					e-mail:*
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px">
					<?php  if (isset($check1) && $check1==false) {echo "<font class=\"fault2\">Bitte gib eine g&uuml;ltige E-Mail Adresse an:</font><br />";} ?>
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="email" size="35" maxlength="50" value="<?php echo $_POST["email"]; ?>" />
				</td>
			<tr>
				<td width="125" class="inhalt1bold">
					Vorname:*
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px">
					<?php  if (isset($check2) && $check2==false) {echo "<font class=\"fault2\">Bitte gib Deinen Vornamen vollst&auml;ndig ein.</font><br />";} ?>
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="vorname" size="35" maxlength="50" value="<?php echo $_POST["vorname"]; ?>" />
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold">
					Name:
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px">
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="name" size="35" maxlength="50" value="<?php echo $_POST["name"]; ?>" />
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold">
					Betreff:*
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px">
					<?php  if (isset($check3) && $check3==false) {echo "<font class=\"fault2\">Bitte einen Betreff eingeben.</font><br />";} ?>
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="betreff" size="35" maxlength="50" value="<?php echo $_POST["betreff"]; ?>" />
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold">&nbsp;
					
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px">
					<input type="radio" name="betreffradio" value="booking" <?php if ($_POST["betreffradio"]=="booking") {echo "checked"; $r1=true;} ?>  />Booking
					<input type="radio" name="betreffradio" value="designWebmaster" <?php if ($_POST["betreffradio"]=="designWebmaster") {echo "checked"; $r2=true;} ?>  />Design/Webmaster
					<input type="radio" name="betreffradio" value="band" <?php if ($_POST["betreffradio"]=="band") {echo "checked"; $r3=true;} ?>  />Band
					<input type="radio" name="betreffradio" value="sonstiges" <?php if ($_POST["betreffradio"]=="sonstiges") {echo "checked";} else if ($r1!=true && $r2!=true && $r3!=true) {echo "checked";}?> />Sonstiges
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold">
					Deine Message:*
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px">
					<?php  if (isset($check4) && $check4==false) {echo "<font class=\"fault2\">Bitte gib einen Text mit mindestens 10 Zeichen ein:</font><br />";} ?>
					<textarea class="inhalt5" style="background-color:rgb(204, 204, 204);" wrap="soft" name="message" cols="56" rows="10" ><?php echo $_POST["message"]; ?></textarea>
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold">&nbsp;
					
				</td>
				<td width="375" class="inhalt1">
					<table>
						<tr>
							<td width="102" style="padding-left:7px" align="left">
								<input class="inhalt" style="background-color:rgb(204, 204, 204)" type="submit" name="mail_senden" value="Senden" size="35" />
							</td>
							<td width="102" align="right">
								<input class="inhalt" style="background-color:rgb(204, 204, 204)" type="reset" name="mail_reset" value="L&ouml;schen" size="35" />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>
	<p class="inhalt1">
		<br />
		Falls du Probleme hast, das Formular abzusenden, dann ist in deinen Browsereinstellungen wahrscheinlich Javascript deaktiviert,
		das dir hier helfen soll, das Formular richtig auszuf&uuml;llen und keine Angaben zu vergessen. Du kannst es entweder aktivieren
		oder schick uns eine e-mail mit allen Daten, die du in das Formular geschrieben h&auml;ttest an&nbsp;&nbsp;<a href="mailto:mail@darkrain-band.de" target="_blank">mail@darkrain-band.de</a>.
	</p>


<?php include '../include/footer.php'; ?>