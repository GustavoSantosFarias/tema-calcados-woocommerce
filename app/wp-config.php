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

require "vendor/autoload.php";

define('WP_HOME','http://localhost:8000');
define('WP_SITEURL','http://localhost:8000');
define('FS_METHOD', 'direct' );

// ** Redis settings - Setup attributes to Redis Object Cache can connect on server ** //

/** The address of the Redis host */
define( 'WP_REDIS_HOST', 'redis' );

/** The password to connect on Redis server */
define( 'WP_REDIS_PASSWORD', 'redistest' );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'divalesi_inverno2019');

/** MySQL database username */
define( 'DB_USER', 'root');

/** MySQL database password */
define( 'DB_PASSWORD', 'test');

/** MySQL hostname */
define( 'DB_HOST', 'mysql');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '6022852d8bce4e69b0d9ddaedeba43fe1d38b19a');
define( 'SECURE_AUTH_KEY',  'f15c26c62e2b2f8b52c21d9205495c77e09d4a83');
define( 'LOGGED_IN_KEY',    '6c7d9271b8765f4eeb342d9b830e79440423de8b');
define( 'NONCE_KEY',        '6e9c040d6cad0368efc3d8f593986c373c7700c6');
define( 'AUTH_SALT',        '1a1e0e41cba6a549717ee7cdcf1f776d669d133c');
define( 'SECURE_AUTH_SALT', 'ab5542824b2211f1dfb9fd2e242c32b632dafef7');
define( 'LOGGED_IN_SALT',   '0d4e71cc0e02d7995431b311a7251854546a1438');
define( 'NONCE_SALT',       '2a807167a4480f13893a3dd9b04abaa277e9813d');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'div';

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
define( 'WP_DEBUG', true );

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
