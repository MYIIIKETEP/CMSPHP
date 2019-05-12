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
define( 'DB_NAME', 'wordpressTest' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'CM-C.$r7@=6lwqOc7P=PJdjo|X3HRt#(K`pv+|fy6K%BBL{%v w= e*G5qh-]:=Z' );
define( 'SECURE_AUTH_KEY',  '{cqQln!H]^v`SJ@n,k}y$0XiT|Q+r,!pC|@lm!x0*g6D^)cYGyGy_kxHKL2#WWgF' );
define( 'LOGGED_IN_KEY',    'GIg`W<NWEb<0U2&zLF)BL4m~n^1N|2*be@-8p`g=?]$yiEGZ`mRWN8G}Tv.`TUI.' );
define( 'NONCE_KEY',        'm#/Hr?RC?N~jMcptZ%bFD~#79|&i5J}bI]6_riuSUU+)J;m>#yQR`ev0KdlIAYX(' );
define( 'AUTH_SALT',        ';n{~@>-98fj1reuJOqmRy@|B2m_7Q<|0]q~aWnR`>t.QUdGy1UM6K-tOJ,ENrAc+' );
define( 'SECURE_AUTH_SALT', 'sw#}-t/x5JIJoM:7#-4wm|iT; LQZ6U?]Q5S)-R]lB{G*L`!jMv%*(I#x{fCiG%p' );
define( 'LOGGED_IN_SALT',   '4$lt}Q,>#&>oT (V=,|JR&AXZKbw@5S+2=4m xK3UXK!3xEX]De6{[XTwM5$/RO?' );
define( 'NONCE_SALT',       ':!yW_6QxT:F}D`gi,!Sy<&Hau5`>PG175^3dsNfhHWsPzdY^VEI-PM4*%uVMjCnS' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
