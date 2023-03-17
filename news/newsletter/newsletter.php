<?php include '../../include/head.php'; ?>


	<h1>Newsletter</h1>
	<p class="inhalt1">
		Du willst immer sofort &uuml;ber alle Auftritt-Termine und Neuigkeiten rund um Dark Rain informiert werden?
		&ndash; Dann trag dich hier in unseren Newsletter ein (alle Felder mit * m&uuml;ssen ausgef&uuml;llt werden).<br />
		Du kannst dich hier auch wieder austragen, wenn du keinen Newsletter mehr bekommen m&ouml;chtest.
	</p>
	<br />
<?php
// Formularueberpruefung
//-----------------------------
$mail = preg_match_all("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)[a-zA-Z]{2,3}$^",$_POST["email"],$match);
if (isset($_POST["email"]) && $mail== false) {$check1 = false;}
if (isset($_POST["vorname"]) && strlen($_POST["vorname"]) < 2) {$check2 = false;}

// Versenden der E-Mail, falls allesnotwendige eingetragen wurde
// --------------------------------------------------------------------------
if (!(isset($check1)) && !(isset($check2))) {
	// Die Adresse des Empfaengers:
	$mail_empfaenger = "admin@darkrain-band.de";
	
	// Die Formularabhaengigen Daten werden je nach gettigtem Formular in die dazugehrigen Variablen geschrieben
	// Kontaktformular:
	if (isset($_POST['mail_senden'])) {
		$mail_absender = $_POST['email'];
		$name = $_POST['vorname']." ".$_POST['name'];
		$mail_betreff = $_POST['einaustragen']." im Newsletter von Dark Rain";
		$mail_text = $mail_betreff." der Person ".$name." mit der E-Mail: ".$mail_absender;
			
		// Versenden der eigentlichen E-Mail mit allen "mail_"-Daten
		if (!(mail($mail_empfaenger,$mail_betreff,$mail_text,"from:$mail_absender\r\n"))) {
			echo "<h2>Es ist ein Fehler beim Versenden der E-Mail aufgetreten.</h2>";
		}
		else {
			
			// Erstellen der Verbindung zur MySQL-Datenbank (Benutzerdaten werden aus der eingebundenen Datei config.inc.php geholt
			// -------------------------------------------------------------------------------------------------------------------------------------------------
				// Einbinden der Konfigurationsdatei
				include_once 'newsletter_config.inc.php';
					  
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
				
				// Ein- bzw. Austragung mit vorheriger Ueberpruefung, ob die E-Mail schon existiert:
				// -------------------------------------------------------------------------------
				$res="SELECT email FROM newsletter WHERE email='".$_POST['email']."'";
				$resquery=mysql_query($res);
				if( empty($resquery) && $_POST['einaustragen']=="eintragen") {
					$sql = 'INSERT INTO Newsletter_Fan SET 
							Liste="Fans",
							EMailAddy="'.$_POST['email'].'", 
	 						Name="'.$_POST['name'].'",
	 						Vorname="'.$_POST['vorname'].' " ';
					mysql_query($sql) or die ('Error in ' . $sql . '. MySQL-Error: ' . mysql_error());
					echo "<p class)\"inhalt1\">Ihre Anmeldung zum Newsletter wurde versendet!</p>";
				}				
				else if($_POST['einaustragen']=="austragen") {
              		$sql = 'DELETE FROM Newsletter_Fan WHERE 
							EMailAddy="'.$_POST['email'].' " ';
					mysql_query($sql) or die ('Error in ' . $sql . '. MySQL-Error: ' . mysql_error());
					echo "<p class)\"inhalt1\">Ihre Abmeldung zum Newsletter wurde versendet!</p>";
          		}
				else {
					echo "<h3>Die E-Mail existiert bereits. Sie haben sich schon f&uuml;r den Newsletter eingetragen.</h3>";
				}			
		}
	}
}
?>
	<form method="POST" name="newsletterFormular" action="newsletter.php">
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>	
				<td width="125" class="inhalt1bold">
					e-mail:*
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px">
					<?php  if (isset($check1) && $check1==false) {echo "<font class=\"fault2\">Bitte gib eine g&uuml;ltige E-Mail Adresse an:</font><br />";} ?>
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="email" size="35" maxlength="50" value="<?php echo $_POST["email"]; ?>" type="text" name="email" size="35" maxlength="50" />
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold">
					Vorname:*
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px">
					<?php  if (isset($check2) && $check2==false) {echo "<font class=\"fault2\">Bitte gib Deinen Vornamen vollst&auml;ndig ein.</font><br />";} ?>
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="vorname" size="35" maxlength="50"  value="<?php echo $_POST["vorname"]; ?>"/>
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold">
					Name:
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px">
					<input class="inhalt5" style="background-color:rgb(204, 204, 204)" type="text" name="name" size="35" maxlength="50"  value="<?php echo $_POST["name"]; ?>"/>
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold">&nbsp;
					
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px">
					<input class="inhalt1" type="radio" name="einaustragen" value="eintragen" checked />eintragen
					<input class="inhalt1" type="radio" name="einaustragen" value="austragen" />austragen
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
								<input class="inhalt" style="background-color:rgb(204, 204, 204)" type="reset" name="reset" value="L&ouml;schen" size="35" />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>


<?php include '../../include/footer.php'; ?>