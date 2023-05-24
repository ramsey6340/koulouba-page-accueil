<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'nEsgu.;=4Iocvfj+ot#1=t>GZ>6^*J9y~*v!/D$_Bx8u4JPs9|$hFwpjn(~QY.24' );
define( 'SECURE_AUTH_KEY',  'p+C{wT}v:zZ#x*,/PWj~p`s8z%4QfSP6FP}I#:rv>D~ehp:lCoYB_yT^[vZ%xg3m' );
define( 'LOGGED_IN_KEY',    'mA%8R07T|Y<])n)zV{qav-3([@]qldK3E 2=Z88iJXYZ )sCn]r{-6J]/L0kdCFL' );
define( 'NONCE_KEY',        'oeiK37|Cunx|d-P;u#z?tn0L/m5hf(,%2f+J:%8[LF/-7S?Wm|WDW~r}J$)a^Q;M' );
define( 'AUTH_SALT',        'zEV0bG}zTe%oDM^tyxO,/tZbrG}Wp/TxEYcj<z}2aN3Nc[|m8&?k$V`5dEr(M|2f' );
define( 'SECURE_AUTH_SALT', 'Vm6C=6%FqSPjt[e8:qg/V~kj!VNRYAMuJcT]g8BkDx2]_UQ9d/?VOzhQ`V?QGK80' );
define( 'LOGGED_IN_SALT',   '(K^euf>*$[vD1GJf[R/hw?gnW;4mN>y=Aw(62=Aq#unw]t1J1yMlzJ /5T VZ$qG' );
define( 'NONCE_SALT',       ';3g:*MVt?W3j(6SM|zAaA3zH(z:WsxXS(*~7n[,bHgr[5,<7xop-S/!$<Vw+=8`9' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
