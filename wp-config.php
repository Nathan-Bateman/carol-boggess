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
define('DB_NAME', 'carol');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'Q+!Ki$_nS=a4md,4#oAvj:I_R=%+?HBN4n~-krpIvG7HtX`;pq^X#U-6,>Lav@-&');
define('SECURE_AUTH_KEY',  '$qX7/~+jD,~TAV)P#GKgIPhiO=q$OB`C#0UcE4;>I:FQ$i!p,>b/?:VDr&N!ze44');
define('LOGGED_IN_KEY',    'IC2LHfzHWA<^jgowO/`@ccI8?*IU]FO<`lfS#,vHOI|nM|/fRE-<v,TNeRsnyzx|');
define('NONCE_KEY',        '*]_cK46h0IiBQM=?^>/3M&d[,j;)z%*|U55CR&;IIw9L308?i^b^lS[~F-;&~1L(');
define('AUTH_SALT',        'N6[t$q&0b]BbeFIrCSg7N|syZ`a2QGA5L`z9;mYnuFS*h/6^N!A*cS83l*u^<bbH');
define('SECURE_AUTH_SALT', 'C ;;eJV2&=jQJG:6[RHUQ_/ /.rek/P}*,I?2Gzji^<ILZL8$VHEy{5yVJ~vO$f0');
define('LOGGED_IN_SALT',   '|.Zut6iob8BUm(ap#y~#oGQ#]ipx,A4N g%P)5(PR@CouoN[e_pv$`TZrB::ly;%');
define('NONCE_SALT',       '(XBeeHiaj.uZK`;^;k7!qwb|NcAU6EvypD1]danuu<{{+xMa(VOz_?~2m@yy2A(s');

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
