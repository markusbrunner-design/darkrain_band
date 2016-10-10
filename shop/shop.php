<?php include '../include/head1.php'; ?>
	<title>Dark Rain - Shop</title>
<?php include '../include/head2.php'; ?>


<h1>Online-Shop</h1>
	
<?php
// Formularueberpruefung
//-----------------------------

if (isset($_POST["vorname"]) && strlen($_POST["vorname"]) < 2) {$check[1] = false;} else {$check[1] = true;}
if (isset($_POST["name"]) && strlen($_POST["name"]) < 2) {$check[2] = false;} else {$check[2] = true;}
if (isset($_POST["strasse"]) && strlen($_POST["strasse"]) < 2) {$check[3] = false;} else {$check[3] = true;}
if (isset($_POST["hausnr"]) && strlen($_POST["hausnr"]) == 0) {$check[4] = false;} else {$check[4] = true;}
if (isset($_POST["land"]) && strlen($_POST["land"]) == 0) {$check[5] = false;} else {$check[5] = true;}
if (isset($_POST["plz"]) && strlen($_POST["plz"]) != 5) {$check[6] = false;} else {$check[6] = true;}
if (isset($_POST["ort"]) && strlen($_POST["ort"]) < 2) {$check[7] = false;} else {$check[7] = true;}
$mail = preg_match_all("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)[a-zA-Z]{2,3}$^",$_POST["email"],$match);
if (isset($_POST["email"]) && $mail== false) {$check[8] = false;} else {$check[8] = true;}
if (isset($_POST["agb"])) {$check[9] = true;} else {$check[9] = false;}


// Fehlermeldungen
//---------------------
$anzahlfehler="Bitte nur positive Ganzzahlen zwischen 0 und 99 eingeben.";


// Beschaffung der Artikel aus der Datenbank
// --------------------------------------------------
		// Herstellen der Verbindung zur Datenbank
		// -------------------------------------------------
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
		// Beschaffung der Artikel
		// ----------------------------
		$sql = "SELECT * FROM merch";
		$query = mysql_query($sql);
		$i = 0;
		while ($row = mysql_fetch_array($query)) {
			$artikel[$i][0] = $row['artikelnr'];
			$artikel[$i][1] = $row['artikelnrextern'];
			$artikel[$i][2] = $row['bezeichnung'];
			$artikel[$i][3] = $row['preis'];
			$artikel[$i][4] = $row['bild'];
			$artikel[$i][5] = $row['bildlink'];
			$artikel[$i][6] = $row['beschreibung'];
			$i++;
		}
?>
	<form method="POST" name="shopFormular" action="shop.php#preis">
		<!-- FAQ -->
		<table>
			<tr>
				<td width="500" style="background-color: rgb(51, 51, 51)" colspan="2"><h2>FAQ</h2></td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold" style="background-color: rgb(51, 51, 51)">
					Wie bestelle ich?
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px; background-color: rgb(51, 51, 51)">
					Wenn du unsere CDs und/oder Fanartikel kaufen willst, gib einfach die Anzahl in die daf&uuml;r vorgesehenen Felder ein und f&uuml;lle das Bestellformular
					aus (alle mit * markierten Felder m&uuml;ssen ausgef&uuml;llt werden).
					Mit einem Klick auf den Button &quot;Bestellen&quot; best&auml;tigst du deine Bestellung. Du erh&auml;ltst dann eine e-mail mit unserer Bankverbindung.
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold" style="background-color: rgb(51, 51, 51)">
					Versandkosten?
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px; background-color: rgb(51, 51, 51)">
					Die Versandkosten betragen 3,60 &euro;. Ab einem Bestellwert von 40,00 &euro; &uuml;bernehmen wir die Versandkosten f&uuml;r dich.
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold" style="background-color: rgb(51, 51, 51)">
					Bezahlung?
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px; background-color: rgb(51, 51, 51)">
					Die Zahlung erfolgt per Vorkasse.
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold" style="background-color: rgb(51, 51, 51)">
					Fragen?
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px; background-color: rgb(51, 51, 51)">
					Bitte benutze bei Fragen unser&nbsp;&nbsp;<a href="../kontakt/kontakt.php" target="_self">Kontaktformular</a>.
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold" style="background-color: rgb(51, 51, 51)">
					Tip:
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px; background-color: rgb(51, 51, 51)">
					Klick auf das Bild des Artikels um eine gr&ouml;&szlig;ere Darstellung zu sehen.<br /><br />
					<b>Viel Spa&szlig; beim Shoppen!</b>
				</td>
			</tr>
		<!-- Artikel -->
			<tr>
				<td width="500" colspan="2"><br /><br /><h2 class="anchor"><a id="artikel">Artikel</a></h2><br /><br /></td>
			</tr>
			
		<?php 
				// Die einzelnen Artikel werden aus der Datenbank ausgelesen und in HTML eingebettet, die einzelnen Artikelpreise werden berechnet (Anzahl*Einzelpreis)
				// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
				$i = 0;
				while ($i<count($artikel)) {
					$artikeldesc = "artikel".$artikel[$i][0];
					if (!isset($_POST[$artikeldesc])) {$artikelpreis[$i]=0;} else {$artikelpreis[$i]=$artikel[$i][3]*round($_POST[$artikeldesc]);}
					echo "\n\t\t\t<tr  class=\"artikelcontainer\">";
					echo "\n\t\t\t\t<td width=\"125\" class=\"inhalt1\">";
					echo "\n\t\t\t\t\t<a href=\"bilder_gross.php?bild=".$artikel[$i][5]."\" target=\"_blank\">";
					echo "\n\t\t\t\t\t<img alt=\"".$artikel[$i][2]."\" src=\"bilder/".$artikel[$i][4]."\" border=\"1\" style=\"border-color:rgb(153, 153, 153);\" width=\"125\" /></a>";
					echo "\n\t\t\t\t</td>";
					echo "\n\t\t\t\t<td width=\"375\" style=\"padding-left:10px\">";
					echo "\n\t\t\t\t\t<p class=\"inhalt1\" valign=\"middle\">";
					echo "\n\t\t\t\t\t\t<a href=\"../discographie/discographie.php\" target=\"_self\">".$artikel[$i][2]."</a>&nbsp;&nbsp;".$artikel[$i][6]."<br />";
					echo  $artikel[$i][3]." &euro;</p>";
					echo "\n\t\t\t\t\t<p class=\"inhalt1\" valign=\"middle\">";
					if (isset($_POST[$artikeldesc]) && (($_POST[$artikeldesc]>99 || $_POST[$artikeldesc]<0))) {echo "\n\t\t\t\t\t<font class=\"fault2\">$anzahlfehler</font><br />";}
					echo "\n\t\t\t\t\t\tBestellen? Anzahl:&nbsp;&nbsp;<input class=\"inhalt5\" style=\"background-color:rgb(204, 204, 204);\"  type=\"text\" name=\"".$artikeldesc."\" size=\"1\" value=\"".round($_POST[$artikeldesc])."\" />";
					echo "\n\t\t\t\t\t</p>";
					echo "\n\t\t\t\t</td>";
					echo "\n\t\t\t</tr>";
					$i++;
				}
				// Der Gesamtpreis wird aus den jeweiligen Preisen der Artikel (Anzahl*Einzelpreis) zusammengezaehlt: Preis1+Preis2...
				// ------------------------------------------------------------------------------------------------------------------------------------------
				$j = 0;
				while ($j<count($artikel)) {
					$gesamtpreis = $gesamtpreis+$artikelpreis[$j];
					$j++;
				}
				
				// Der Preis wird ausgegeben
				// -------------------------------
				echo "\n\t\t\t<tr class=\"artikelcontainer\">";
				echo "\n\t\t\t\t<td width=\"125\" class=\"inhalt1\">&nbsp;";
				echo "\n\t\t\t\t</td>";
				echo "\n\t\t\t\t<td width=\"375\" style=\"padding-left:10px\" align=\"right\" class=\"inhalt1\"><div style=\"margin-right:60px;\">Zwischensumme:</div>&nbsp;"; echo number_format($gesamtpreis,2,",",""); echo "&nbsp;&euro;";
				echo "\n\t\t\t\t</td>";
				echo "\n\t\t\t</tr>";
				// Die Portokosten werden bei einem Betrag unter 40 Euro zum Gesamtpreis hinzugerechnet
				// ----------------------------------------------------------------------------------------------------------
				$portokosten=3.60;
				if ($gesamtpreis<40) {
					$portokosten=3.60;
					$gesamtpreis=  $gesamtpreis+$portokosten;			
				}
				else {
					$portokosten=0;
				}
				echo "\n\t\t\t<tr class=\"artikelcontainer\">";
				echo "\n\t\t\t\t<td width=\"125\" class=\"inhalt1\">&nbsp;";
				echo "\n\t\t\t\t</td>";
				echo "\n\t\t\t\t<td width=\"375\" style=\"padding-left:10px\" align=\"right\" class=\"inhalt1\"><div style=\"margin-right:60px;\">Porto &amp; Verpackung:</div>&nbsp;"; echo number_format($portokosten,2,",",""); echo "&nbsp;&euro;";
				echo "\n\t\t\t\t</td>";
				echo "\n\t\t\t</tr>";
				echo "\n\t\t\t<tr class=\"artikelcontainer\">";
				echo "\n\t\t\t\t<td width=\"125\" class=\"inhalt1\">&nbsp;";
				echo "\n\t\t\t\t</td>";
				echo "\n\t\t\t\t<td width=\"375\" style=\"padding-left:10px\" align=\"right\" class=\"inhalt1\"><div style=\"margin-right:60px;\"><span class=\"anchor\"><a id=\"preis\">Gesamtpreis:</a></span></div>&nbsp;"; echo number_format($gesamtpreis,2,",",""); echo "&nbsp;&euro;";
				echo "\n\t\t\t\t</td>";
				echo "\n\t\t\t</tr>";
				echo "\n\t\t\t<tr class=\"artikelcontainer\">";
				echo "\n\t\t\t\t<td width=\"125\" class=\"inhalt1\">&nbsp;";
				echo "\n\t\t\t\t</td>";
				echo "\n\t\t\t\t<td width=\"375\" style=\"padding-left:10px\" align=\"right\" class=\"inhalt1\"><input class=\"inhalt\" style=\"background-color:rgb(204, 204, 204)\" type=\"submit\" name=\"berechnen\" value=\"Preis neu berechnen\" size=\"35\" />";
				echo "\n\t\t\t\t</td>";
				echo "\n\t\t\t</tr>";
		?>
		
		<!-- Bestellformular -->
			<tr>
				<td width="500" colspan="2">
<?php
// Versenden der E-Mail, falls allesnotwendige eingetragen wurde
// --------------------------------------------------------------------------
if ($check[1]==true && $check[2]==true && $check[3]==true && $check[4]==true && $check[5]==true && $check[6]==true && $check[7]==true && $check[8]==true && $check[9]==true) {
	// Die Adresse des Empfaengers:
	$mail_empfaenger = "shop@darkrain-band.de";
	
	// Die Formularabhaengigen Daten werden je nach getaetigtem Formular in die dazugehoerigen Variablen geschrieben
	// Kontaktformular:
	if (isset($_POST['bestellen'])) {
		$mail_absender = $_POST['email'];
		$name = $_POST['vorname']." ".$_POST['name'];
		$mail_betreff = "Bestellung von ".$name." im Dark Rain Online-Shop\r\n\n";
		$adresse = "Adresse:\r\n".$_POST['strasse']."\t".$_POST['hausnr']."\r\n".$_POST['land']."-".$_POST['plz']."\t".$_POST['ort']."\r\n".$_POST['telefon']."\r\n\n";		
			$a = 0;
			$bestellteartikel = "Bestellte Artikel:\r\n";
			$gesamtpreis = 0;
			while ($a<count($artikel)) {
				$artikeldesc = "artikel".$artikel[$a][0];
				if ($_POST[$artikeldesc] != 0) {
					$preisAktuellerArtikel = $_POST[$artikeldesc]*$artikel[$a][3];
					$bestellteartikel .= $_POST[$artikeldesc]."x ".$artikel[$a][2]."\t\tEinzelpreis: ".$artikel[$a][3]."\tPreis: ".$preisAktuellerArtikel."\r\n";
					$gesamtpreis += $preisAktuellerArtikel;			
				}
				$a++;
	
				$portokosten=3.60;
				if ($gesamtpreis<40) {
					$portokosten=3.60;
					$gesamtpreis=  $gesamtpreis+$portokosten;			
				}
				else {
					$portokosten=0;
				}
			}
		$mail_text = $mail_betreff.$adresse.$bestellteartikel."\r\n\r\nPortokosten: ".$portokosten."\r\nGesamtpreis: ".$gesamtpreis."\r\n\r\n";
		
		// Versenden der eigentlichen E-Mail mit allen "mail_"-Daten
		if (!(mail($mail_empfaenger,$mail_betreff,$mail_text,"from:$mail_absender\r\n"))) {
			echo "<h5 style=\"color:#A00;background-color:#BBB;padding:10px;\">Es ist ein Fehler beim Versenden des Bestellungsauftrages aufgetreten.</h2>";
		}
		else {
			echo "<h5 style=\"color:#0A0;background-color:#BBB;padding:10px;\">Deine Bestellung im Online-Shop von Dark Rain wurde versendet!</h2>";
			$mail_text = $mail_text."\r\n\nDies ist lediglich eine Best&auml;tigungsmail Deiner Online-Bestellung im Online-Shop von Dark Rain.\r\nEine ausf&uuml;hrliche Rechnung wird bearbeitet und Dir schnellstm&ouml;glich zugesandt.\r\n\r\nDu kannst Deine Bestellung innerhalb von 7 Tagen per E-Mail an shop@darkrain-band.de widerrufen, falls Du doch nichts in unserem Shop kaufen wolltest\r\n\r\nFreundliche Gr&uuml;&szlig;e, Dein Dark Rain";
			mail($mail_absender,$mail_betreff,$mail_text,"Bcc:shop@darkrain-band.de\r\nfrom:$mail_empfaenger\r\n");
		}
	}
}
?>
					<br /><br />
				</td>
			</tr>
			<tr>
				<td width="500" style="background-color: rgb(51, 51, 51)" colspan="2">
					<h2><span class="anchor"><a id="bestellformular">Bestellformular</a></span></h2>
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold" style="background-color: rgb(51, 51, 51)">
					Vorname:*
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px; background-color: rgb(51, 51, 51)">
					<?php  if (isset($check[1]) && $check[1]==false) {echo "<font class=\"fault2\">Bitte gib Deinen Vornamen vollst&auml;ndig ein.</font><br />";} ?>
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="vorname" size="35" maxlength="50" value="<?php echo $_POST["vorname"]; ?>" />
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold" style="background-color: rgb(51, 51, 51)">
					Name:*
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px; background-color: rgb(51, 51, 51)">
					<?php  if (isset($check[2]) && $check[2]==false) {echo "<font class=\"fault2\">Bitte gib Deinen Nachnamen vollst&auml;ndig ein.</font><br />";} ?>
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="name" size="35" maxlength="50" value="<?php echo $_POST["name"]; ?>" />
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold" style="background-color: rgb(51, 51, 51)">
					Stra&szlig;e, Hausnr.:*
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px; background-color: rgb(51, 51, 51)">
					<?php  if (isset($check[3]) && $check[3]==false) {echo "<font class=\"fault2\">Bitte gib Deine Strasse vollst&auml;ndig ein.</font><br />";} ?>
					<?php  if (isset($check[4]) && $check[4]==false) {echo "<font class=\"fault2\">Bitte gib Deine Hausnummer vollst&auml;ndig ein.</font><br />";} ?>
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="strasse" size="27" maxlength="50" value="<?php echo $_POST["strasse"]; ?>" />
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="hausnr" size="1" maxlength="5" value="<?php echo $_POST["hausnr"]; ?>" />
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold" style="background-color: rgb(51, 51, 51)">
					Land, PLZ, Ort:*
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px; background-color: rgb(51, 51, 51)">
					<?php  if (isset($check[5]) && $check[5]==false) {echo "<font class=\"fault2\">Bitte gib Dein Land an (D f&uuml;r Deutschland).</font><br />";} ?>
					<?php  if (isset($check[6]) && $check[6]==false) {echo "<font class=\"fault2\">Bitte gib Deine PLZ an.</font><br />";} ?>
					<?php  if (isset($check[7]) && $check[7]==false) {echo "<font class=\"fault2\">Bitte gib Deinen Ort an.</font><br />";} ?>
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="land" size="1" maxlength="3" value="D" disabled="1" /> <!-- <?php echo $_POST["land"]; ?> -->
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="plz" size="3" maxlength="5" value="<?php echo $_POST["plz"]; ?>" />
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="ort" size="17" maxlength="50" value="<?php echo $_POST["ort"]; ?>" />
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold" style="background-color: rgb(51, 51, 51)">
					e-mail:*
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px; background-color: rgb(51, 51, 51)">
					<?php  if (isset($check[8]) && $check[8]==false) {echo "<font class=\"fault2\">Bitte gib Deine E-Mail f&uuml;r R&uuml;ckfragen und Versandbest&auml;tigung an.</font><br />";} ?>
					<input class="inhalt5" style="background-color:rgb(204, 204, 204);" type="text" name="email" size="35" maxlength="50" value="<?php echo $_POST["email"]; ?>" />
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold" style="background-color: rgb(51, 51, 51)">
					Telefonnummer:
				</td>
				<td width="375" class="inhalt1" style="padding-left:10px; background-color: rgb(51, 51, 51)">
					<input class="inhalt5" style="background-color:rgb(204, 204, 204)" type="text" name="telefon" size="35" maxlength="30" value="<?php echo $_POST["telefon"]; ?>" />
				</td>
			</tr>
			<tr>
				<td width="125" class="inhalt1bold" style="background-color: rgb(51, 51, 51)">&nbsp;
					
				</td>
				<td width="375" class="inhalt1" style="background-color: rgb(51, 51, 51)">
					<table>
						<tr>
							<td width="102" style="padding-left:7px" align="left">
								<input class="inhalt" style="background-color:rgb(204, 204, 204)" type="submit" name="bestellen" value="Bestellen" size="35" />
							</td>
							<td width="102" align="right">
								<input class="inhalt" style="background-color:rgb(204, 204, 204)" type="reset" name="reset" value="L&ouml;schen" size="35" />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<p class="inhalt1"><input type="checkbox" name="agb" <?php if (isset($_POST['agb'])) {echo "checked";} ?> /> Ja, ich habe die <a href="../agb/agb_shop.php?shop=agb" target="_blank">AGB</a> zur Bestellung im Online-Shop gelesen und stimme ihr zu. <?php if($check[9]==false && isset($_POST['bestellen'])) {echo "\n<p class=\"fault2\"> Du musst unseren ABG zustimmen um bestellen zu k&ouml;nnen!</p>";} ?></p>
	</form>

<?php include '../include/footer.php'; ?>