<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'testwordpress_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '*cD={Bwpb)aNcECr3~~CN&A>qU+o8b[-|]U}.Tn|cWOb2[PqMm}(gXCI~(Fi+O8!');
define('SECURE_AUTH_KEY',  '~FB7vUg:$c(^MWBsG[.qc#z]B1n%ABW>;lCBk; T7bC oRq(L/BRG|t-h)&VPQs+');
define('LOGGED_IN_KEY',    'P@lh_T(l?Z{N%hT#h}2c2@n%g$LwdI:;)R&^^D v Ap#H$Mfj}#4qmmMOmruvbm`');
define('NONCE_KEY',        'XK1_.~{N@`nEVBPG64vDZsO_#;P$N`9rE[pBop/|,s~u7/tC]?:LNNfrEN 3Q^DM');
define('AUTH_SALT',        'iD}~{ex6`_h%Jq+aXuxx87,@)a^OlgoXxt&l_.cWL4#.aEwze7)mz!!!#DY&x&%L');
define('SECURE_AUTH_SALT', 'nr`M<YNv|V/O])6R54pkp}fQ$E(eB!bgrDUT;R_GL|$f)4F(5msf#{m|pmxIkyeb');
define('LOGGED_IN_SALT',   'zZ5I4HPh2>@MOKG*%Q|4H8Xkqv%0Lyph5ahb<.10&gENu5MX-.=/xvvWvC$wV]mO');
define('NONCE_SALT',       'VcLY&zf+=Nm{@? o,WMUfY/{[e>9|4V#cFa3CU;:w(xiinx6InU-;`c#]JKzm}Yq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
