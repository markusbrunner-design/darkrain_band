<?php ?>
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
      <li><a href="http://<?php echo $domain; ?>/news/news.php?menue=news">News</a></li>
	    <?php
		if($_GET['menue']==news) {
		echo "<ul>";
			echo "<li><a href=\"http://$domain/news/aktuelles/aktuelles.php?menue=news\">Aktuelles</a></li>";
			#echo "<li><a href=\"http://$domain/news/newsletter/newsletter.php?menue=news\">Newsletter</a></li>";
		echo "</ul>";
		}
		?>
      <li><a href="http://<?php echo $domain; ?>/auftritte/auftritte.php?menue=auftritte">Auftritte</a></li>
        <?php
		if($_GET['menue']==auftritte) {
		echo "<ul>";
			#echo "<li><a href=\"http://$domain/auftritte/termine/termine.php?menue=auftritte\">Termine</a></li>";
			echo "<li><a href=\"http://$domain/auftritte/bilder_mp3s_videos/bilder_mp3s_videos.php?menue=auftritte\">B. MP3 V.</a></li>";
		echo "</ul>";
		}
		?>
      <li><a href="http://<?php echo $domain; ?>/discographie/discographie.php">Discographie</a></li>
      <li><a href="http://<?php echo $domain; ?>/biographie/biographie.php?menue=biographie">Biographie</a></li>
        <?php
		if($_GET['menue']==biographie) {
		echo "<ul>";
			echo "<li><a href=\"http://$domain/biographie/dark_rain/entstehung.php?menue=biographie\">DR-Entstehung</a></li>";
			echo "<li><a href=\"http://$domain/biographie/sarah/sarah.php?menue=biographie\">Sarah/Faith</a></li>";
			echo "<li><a href=\"http://$domain/biographie/harry/harry.php?menue=biographie\">Harry/Marry</a></li>";
			echo "<li><a href=\"http://$domain/biographie/markus/markus.php?menue=biographie\">Markus/Mac</a></li>";
			echo "<li><a href=\"http://$domain/biographie/katja/katja.php?menue=biographie\">Katja/Whizz Kid</a></li>";
		echo "</ul>";
		}
/*
		?>
      <!--<li><a href="http://<?php echo $domain; ?>/multimedia/multimedia.php">Multimedia</a></li>-->
      <li><a href="http://<?php echo $domain; ?>/ga3st3buch/index.php">G&auml;stebuch</a></li>
      <!--<li><a href="http://<?php echo $domain; ?>/shop/shop.php">Shop</a></li>-->
	    <!-- SSL-Schutz -->
	    <li><a href="https://ssl-account.com/darkrain-band.de/shop/shop.php">Shop</a></li>
      <li><a href="http://<?php echo $domain; ?>/links/links.php">Links</a></li>
	 <?php
*/
	 ?>
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
<?php ?>