<?php

    session_start();

    if( !$_SESSION['loggedIn'] ) {
        header( 'Location: http://www.seitenbacher.info/adressbuch/login/loginformular.html' );
        exit();
    }

?> 