<?php
	echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>\n";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php 
	//former domain:
	//$domain="www.darkrain-band.de";
	$domain="darkrain.kreativmix.de";
	if($_SERVER['HTTP_HOST'] == 'markusbrunner-design.loc') {
		//dev: 
		$domain="markusbrunner-design.loc/fileadmin/darkrain/darkrain_band";
	} else {
		//live: 
		$domain="darkrain.kreativmix.de";
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