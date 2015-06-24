<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'aiden_dev');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'password');

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
define('AUTH_KEY',         ';Vd{9@S@L[:$xp;1cY8EsgSLufMg!<TKVVa7^^kS+dAoJx!lR5bK$YC-e~PXv]m[');
define('SECURE_AUTH_KEY',  'S$p`}|)X>D$l}q}z9n>$BP!rECA0GndAPh&T7!srFgsZ7%NUZ2qZwA5Gw4dN*W^8');
define('LOGGED_IN_KEY',    'L)jnKZofPn|pAIV)L7=8E}W;UPw~Yb>oo3c-pE>]j$U-!M5i/ORes#Wow8lLe~Wr');
define('NONCE_KEY',        ')!;SO$?u!&cRq9E<B#0,;gB1FA@]Ib=GocCG79.Hpq4Sq-5C[e$/@-Z~okwu>+.V');
define('AUTH_SALT',        '_coNL,Qm5q4x56~sI#gQph4*jl&WC7aaOm-)%5/|f~g^WE=(YA/9[dD:!F[$`G7@');
define('SECURE_AUTH_SALT', 'oWG.*A=Nh3/v#Kkdg?iGj>,?6#o1Y#k[G2(cidnBs[6UG{Rh/h4UM *gc8-~z6b]');
define('LOGGED_IN_SALT',   'A^TEJj/Qqohc3(}aPUehzqnh.PoX V$z`hxFjNEPd]rsmO0nJJ5:qx,*P[GD~h$#');
define('NONCE_SALT',       'e9iq$Pd[g_30cEL<!?9B4>mx34=1z~CZ@@O(~J*Ln4;j[8j$ob+Y4$oq{wD~hfum');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

