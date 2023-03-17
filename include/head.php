<?php
	echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>\n";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php 
	//former domain:
	//$domain="www.darkrain-band.de";
	$domain="darkrain.markusbrunner.de";
	if($_SERVER['HTTP_HOST'] == 'markusbrunner-design.loc') {
		//dev: 
		$domain="markusbrunner-design.loc/fileadmin/darkrain/darkrain_band";
	} else {
		//live: 
		$domain="darkrain.markusbrunner.de";
	}
?>

<head>
	<meta http-equiv="Content-Language" content="de" />
	<meta name="description" content="Offizielle Homepage der registrierten Band Dark Rain - Melodic Metal - Goth Rock - Hard Rock" />
	<meta name="author" content="Dark Rain - Markus Brunner und Katja Deutschmann" />
	<meta name="keywords" content="Band, Dark Rain, Melodic Metal, Melodic-Metal, Goth Rock, Goth-Rock, Hard Rock, Hard-Rock, Odenwald, Baden-W&uuml;rttemberg, " />
	<meta name="DC.Title" content="Dark Rain - Homepage Finder Buchen Pfannenschwarz Brunner Deutschmann Band Baden-W&uuml;rttemberg Odenwald P-Promotion" />
	<meta name="DC.Description" content="Offizielle Homepage der registrierten Band Dark Rain - Melodic Metal - Goth Rock - Hard Rock" />
	<meta name="DC.Creator" content="Dark Rain - Markus Brunner und Katja Deutschmann" />
	<meta name="DC.Subject" content="Musik-Band: Offizielle Homepage der registrierten Band Dark Rain - Melodic Metal - Goth Rock - Hard Rock" />
	<meta name="DC.Type" content="Text" />
	<meta name="DC.Rights" content="Dark Rain" />
	<meta name="DC.Format" content="text/html" />
	<link rel="shortcut icon" href="http://<?php echo $domain; ?>/images/sonstiges/favicon.ico" />
	<link rel="stylesheet" type="text/css" media="screen" href="http://<?php echo $domain; ?>/css/styles.css" />
	<link rel="stylesheet" type="text/css" media="print, embossed"	href="http://<?php echo $domain; ?>/css/druck.css" />
  <script language="JavaScript" type="text/javascript" src="http://<?php echo $domain; ?>/javascript/zoom.js" /></script>
  <title>Dark Rain - Band</title>
</head>

<body>

  <h1 class="displaynone">Dark Rain - die offizielle Homepage</h1>
<div id="container">
  <div id="menue">
    <div class="displaynone">
      <hr /><br />
      <h3 class="keindruck">
        <a id="hauptnav">Hauptnavigation</a>
      </h3>
    </div>
    <div class="keindruck">
      <ul id="navigation">
        <li><a href="http://<?php echo $domain; ?>/auftritte/auftritte.php?menue=auftritte">Auftritte</a></li>
          <ul>
            <li><a href="http://<?php echo $domain; ?>/auftritte/bilder_mp3s_videos/bilder_mp3s_videos.php?menue=auftritte">B. MP3 V.</a></li>
          </ul>
        <li><a href="http://<?php echo $domain; ?>/discographie/discographie.php">Discographie</a></li>
        <li><a href="http://<?php echo $domain; ?>/biographie/biographie.php?menue=biographie">Biographie</a></li>
          <ul>
            <li><a href="http://<?php echo $domain; ?>/biographie/dark_rain/entstehung.php?menue=biographie">DR-Entstehung</a></li>
            <li><a href="http://<?php echo $domain; ?>/biographie/sarah/sarah.php?menue=biographie">Sarah/Faith</a></li>
            <li><a href="http://<?php echo $domain; ?>/biographie/harry/harry.php?menue=biographie">Harry/Marry</a></li>
            <li><a href="http://<?php echo $domain; ?>/biographie/markus/markus.php?menue=biographie">Markus/Mac</a></li>
            <li><a href="http://<?php echo $domain; ?>/biographie/katja/katja.php?menue=biographie">Katja/Whizz Kid</a></li>
          </ul>
      </ul>
    </div>
    <div class="displaynone">
      <br />
      <a class="keindruck" href="#hauptnav">zur Hauptnavigation</a><br />
      <a class="keindruck" href="#metanav">zur Metanavigation</a>
      <hr /><br /><br />
    </div>
  </div>
  <div id="right">
  <div id="header">
    <a class="imagelink" href="http://<?php echo $domain; ?>" style="padding-left: 25px" ><img class="keindruck" alt="Logo von Dark Rain" src="http://<?php echo $domain; ?>/images/logos/darkrain_logo_transp_500.gif" width="500" border="none" style="padding-bottom: 5px"/></a>
    <br />
    <img class="keindruck" alt="" src="http://<?php echo $domain; ?>/images/sonstiges/linie.gif" width="550" />
    <div class="displaynone">
      <hr />
      <br />
      <h3 class="keindruck">
        <a id="metanav">Metanavigation</a>
      </h3>
    </div>
    <div class="nav1" style="text-align: right;">
	    <span id="metanavigation" style="padding-right: 25px">
		<?php
    /*
        ?>
          <a class="keindruck" href="http://<?php echo $domain; ?>/kontakt/kontakt.php">Kontakt</a>&nbsp;&nbsp;&nbsp;
        <?php
    */
    ?>
		  <a class="keindruck" href="http://<?php echo $domain; ?>/impressum/impressum.php">Impressum</a>&nbsp;&nbsp;&nbsp;
		  <a class="keindruck" href="http://<?php echo $domain; ?>/agb/agb.php">AGB</a>
		</span>
    </div>
    <div class="displaynone">
      <br />
      <a class="keindruck" href="#hauptnav">zur Hauptnavigation</a><br />
      <a class="keindruck" href="#metanav">zur Metanavigation</a>
      <hr />
      <br />
      <br />
    </div>
  </div>
  <div id="content">