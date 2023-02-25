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
define('DB_NAME', '2kfilmes');

/** MySQL database username */
define('DB_USER', '2kfilmes');

/** MySQL database password */
define('DB_PASSWORD', '2k208my64');

/** MySQL hostname */
define('DB_HOST', 'mysql03-farm56.kinghost.net');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         ' tuh[/-7?$ #Nt/kVShth|RGlD_K7z#(^5F9$9<=mN#GTS3$o,)<A|pfFER(uV]@');
define('SECURE_AUTH_KEY',  'Osx-hk]|S#F )#H>sM{P,+g*Y-GOEwART:ul0ibr{BjnVp$^*+S;^3wnL6[v+Rg$');
define('LOGGED_IN_KEY',    '(]vGA4($koIrInoE-m(qlH<Ne`Hc^ZbF,=1LBW<hCwTO]%(!03<uc,SM(98w`]}a');
define('NONCE_KEY',        'otWmz)O![CtAnHsvE4$f/xO4,` )+=6.i4xon{K+nvY mw<21j}fS1xfK|W24/g*');
define('AUTH_SALT',        '[.m}9,U[P6Y*g9yW,Qfqw$ly])y;coJt(XTB{I}!Vt_Oi <,;t:PgZ2 /T$V3)Ac');
define('SECURE_AUTH_SALT', 'Lym*:CmYxdD$qaul)nzR}[UCa^oRBn,iCSQUmN14mf0)lyl?>;d;GA 06Tb&#y`[');
define('LOGGED_IN_SALT',   'eO.|`},XJk/[]vsVCj8r7URWTW?_BRCxD`4;1@+eaQ!OY8=qdtwn6&2vxry6XZYc');
define('NONCE_SALT',       '>sMS[g2;GC6g_<XAQd$sUyp1l%Xvg~{zZ9j]Cot)y(]LUE/3&[NclU6HSMY,`HlK');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '2k_';

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
