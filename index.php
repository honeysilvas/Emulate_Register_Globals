<?php
/**
 * Emulates what register_globals = On would do if register_globals is set to Off inside php.ini 
 * without using ini_set or .htaccess to override the setting. 
 *
 */
 
if ( !ini_get( "register_globals" ) ) {
    $superglobals = array( $_SERVER, $_ENV, $_FILES, $_COOKIE, $_POST, $_GET );
	
    if ( isset( $_SESSION ) ) {
        array_unshift( $superglobals, $_SESSION );
    }
	
    foreach ( $superglobals as $superglobal ) {
        extract( $superglobal, EXTR_SKIP );
    }
}
?>