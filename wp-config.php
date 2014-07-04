<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

// ** MySQL settings ** //
define('DB_NAME', 'wordpress');    // The name of the database
define('DB_USER', 'wordpress');     // Your MySQL username
define('DB_PASSWORD', '6YT8RAscjr9biwKreVVJEsguS'); // ...and password
define('DB_HOST', 'localhost');    // 99% chance you won't need to change this value
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// Change each KEY to a different unique phrase.  You won't have to remember the phrases later,
// so make them long and complicated.  You can visit http://api.wordpress.org/secret-key/1.1/
// to get keys generated for you, or just make something up.  Each key should have a different phrase.

// added interesting  to the line, to stop it from being the stock info
define('AUTH_KEY',         't`DK%X:>xy|e-Z(G-^_Cs_GHs5U-&Wb?pgn^BXb/f(Ur`8#~UzUQBXb/f(UrnCa|');
define('SECURE_AUTH_KEY',  'D&ovlU#|CvJ##uNq}GlRJ7q!h}XWdbel+^MFtT&.b9{UvR]g%ixsXhEC[BOKXssj');
define('LOGGED_IN_KEY',    'MGKi8Br(&{H*~&0s;{k0<S(O:+f#WM+q|npJ-+P;RDKT:~jrmgj#/-,[hOBk!ry^');
define('NONCE_KEY',        'FIsAsXJKL5ZlQo)iD-pt??eUbdc{_Cn<4!d~yqz))&B D?AwK%)+)F2aNwI|siOe');
define('AUTH_SALT',        '7T-!^i!0,w)L#JK@pc2{8XE[Def}zBf883td6D;Vcy8,S)nYI^BVf{L:jvF,h-&G');
define('SECURE_AUTH_SALT', 'I6`V|mDZq21-J|ihb u^q0F }F_NUcy`l,=obGtq*p#Ybe4a31R,r=|n#=]@]c #');
define('LOGGED_IN_SALT',   'w<$4=X={we6;Mpvtg+V.oc$Hmd%/*]`Oom>(hdXW|0M<$|#_}qG(GaVDEsn,~*4i');
define('NONCE_SALT',       'a|#&xWs4IZ20c2&%4!c(/uG}W:mAvy<h{c5|P I44`jAbup]t=]V<`}.py(wTP%%');


// You can have multiple installations in one database if you give each a unique prefix
$table_prefix  = 'wp_';   // Only numbers, letters, and underscores please!

// Change this to localize WordPress.  A corresponding MO file for the
// chosen language must be installed to wp-content/languages.
// For example, install de.mo to wp-content/languages and set WPLANG to 'de'
// to enable German language support.
define ('WPLANG', '');
// define('WP_DEBUG', true);


/** now we set how to update ourselves */
define('FTP_PUBKEY','/home/wordpressftp/id_rsa.pub');
define('FTP_PRIKEY','/home/wordpressftp/id_rsa');
define('FTP_USER','wordpressftp');
define('FTP_PASS','');
define('FTP_HOST','localhost');
define('FTP_SSL', false);

/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

?>
