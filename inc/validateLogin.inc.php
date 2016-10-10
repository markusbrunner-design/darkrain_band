<?php

    session_start();
    
    // Überprüfen, ob das Formular abgeschickt wurde und ob beide Angaben gemacht wurden.
    if( isset($_POST['username'], $_POST['passwort'])		
        AND
        strcmp(trim($_POST['username']),'') != 0
		AND
        strcmp(trim($_POST['passwort']),'') != 0 ) {


          // Einbinden der Konfigurationsdatei
          include_once 'config.inc.php';
          
          // Erstellen der Verbindung zur MySQL-Datenbank
          if( !$connection = mysql_connect( $_config['host'], $_config['user'], $_config['password'] ) ) {
               die( 'Verbindung zum Datenbankserver konnte nicht hergestellt werden.' );
          }

          if( !mysql_select_db( $_config['database'], $connection ) ) {
              die ( 'Die Datenbank ' . $_config['database'] . ' kann nicht verwendet werden. <br />
                       MySQL-Error: <br />' . mysql_error() );
          }
          
          
          // SQL-Anweisung an die Datenbank senden, um erstens herauszufinden, ob
          // diese Kombination von Usernamen und Passwort überhaupt existiert und
          // zweitens bei Existenz Userinformationen auszulesen
          $sql = "SELECT
                           Email
                      FROM         
                           users
                      WHERE
                           Name = '" . trim($_POST['username']) . "'
                      AND
                           Password = '" . md5(trim($_POST['passwort'])) . "'";
                           
          $res = mysql_query($sql) or die( 'Error[SELECT|User]: <br />
                                                           <pre>' . $sql . '</pre>
                                                           <br />
                                                           MySQL-Error: ' . mysql_error() );

														   
		  
		  // Nur wenn genau ein Datensatz selektiert wurde wird der User eingeloggt.
          // In allen anderen Fällen wird er zurück zum Loginformular geleitet.
          if( mysql_num_rows($res) != 1) {
              header( 'Location: http://www.seitenbacher.info/adressbuch/login/loginfehler.html' );            
              exit();
          }
          else {
		  
             // Der Schlüssel 'loggedIn' erhält den Wert 'true'. So kann überprüft später werden,
             // ob der User eingeloggt ist oder nicht.
             $_SESSION['loggedIn'] = true; 
                
			 unset(header);                                          
             // Der Login war erfolgreich und der User wird zur Startseite des
             // passwortgeschützen Bereichs weitergeleitet
             if 		($_POST['username']=="adminphp" || $_POST['username']=="Adminphp") {header( 'Location: http://www.seitenbacher.info/adressbuch/admin.php?<?=SID?>' );}
			 else if	($_POST['username']=="admin"    || $_POST['username']=="Admin")    {header( 'Location: http://www.seitenbacher.info/adressbuch/index.php?user=admin&<?=SID?>' );}
			 else 	{header( 'Location: http://www.seitenbacher.info/adressbuch/index.php?<?=SID?>' );}		 
             exit();                                            
          }
          
    }
    else {
          header( 'Location: http://www.seitenbacher.info/adressbuch/login/loginformular.html' );		  
          exit();
    }

?>
