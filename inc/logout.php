<?php

     session_start();
     $_SESSION['loggedIn'] = false;

     header( 'Location: http://www.seitenbacher.info/adressbuch/login/loginformular.html' );
   	 
	 session_unset();
	 $_SESSION=array();
	 //session_destroy();
  	 exit();
	 
?> 