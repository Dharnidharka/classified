<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'classifiDBdd8qb');

/** MySQL database username */
define('DB_USER', 'classifiDBdd8qb');

/** MySQL database password */
define('DB_PASSWORD', 'dyEThv9NYn');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'p*#b7{3uf*8>kRg@3UFRn@7:~GdwoK4CZN[et;6Tia+]HSD*Uu.nI7TueA.6TR}@|');
define('SECURE_AUTH_KEY',  '>KRZ-l@8NowgC+2H]paw:CZhWtm.2^bMi*tP2Licznr}BYufE>7UR:~|CSs[zV8Zo');
define('LOGGED_IN_KEY',    '<6ET^}BQ3jzUkv|kz,4,3jMbr$Ynz>r$M-|4K:8Nd8OZpRh1!0CR4JYkGVgwZo8l+');
define('NONCE_KEY',        '#tD#1GWCRhwZk-[|1G[8OZLbm+e;E*{AP2ETiSet_#5L#2HX9Laq7IYnr^r$}B,');
define('AUTH_SALT',        '7>YjFUkvYnz>Vl5~[8O]5KaCOdtd:C|0GV:CRhGVk-ix#m+#6x.2H]aqWl+]p~:9+');
define('SECURE_AUTH_SALT', 'uqAP;ETiAPfuTiygv,4z>7N|4JV7Ncn$>7^EQ}BQcFU,Rhw!k-[4w|1G[ZpZkz[o');
define('LOGGED_IN_SALT',   '3TTjyQfu^jy<3|4kNdo@Zo-[s~:8NcsRgr!cs@:0FV_1DS5KWlHWmxap9[9OZCShs');
define('NONCE_SALT',       '[gMcr@fvF!0FR4JYk1GWhKZ[l-#5~[9K4KZos!:o~[8!1CR*PeHWixTiu.ix<1HWl');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
