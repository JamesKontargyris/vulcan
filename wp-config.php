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
define('DB_NAME', 'fipraunits');

/** MySQL database username */
define('DB_USER', 'homestead');

/** MySQL database password */
define('DB_PASSWORD', 'secret');

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
define('AUTH_KEY',         'yc~H43(D6Z&|2+zDvd(W26{-^dtnu9al?.-f0I&V(*3T6X*R7eYLO>tRcDM8pE_w');
define('SECURE_AUTH_KEY',  'fjK|mY+!A}Z9U;m]+JP(GWX}oM3WcA5aqZDgi@=PCls-u%Kv/;{RWId[mjSH==-}');
define('LOGGED_IN_KEY',    'K57 @o#4`klylD+ng;KN!j#Ay.0(S7whe*,Qd]n^}&:n}Z,Ymh%_c0AbdW7M/Qw*');
define('NONCE_KEY',        'Qx&.fjf0EKx0-Gfn|l:!yT1aRIHjFdHHgH1I*V8O$$+iU9|pj] WmC)(Vrpm|ZC2');
define('AUTH_SALT',        'Ztn},~~vx3CF7AL$xb.u*c0%bO)r0^eEcnlC:6?3?OKPL>fhZVc,&lE^Z{ijWQz ');
define('SECURE_AUTH_SALT', ',KNJO=>)}JdqjTfOP|<-uyz>$6_jukJ<{&(.HEW;IVX6<C+CSM}Jyw+D(NJMsow2');
define('LOGGED_IN_SALT',   'A& ,7~^0G)yT/1,tI_ju6s.~u:9|$JKL(F}#86(;n;4v8=xq09O+{4/8+Zi4N5uw');
define('NONCE_SALT',       '[l^AwGR18&H`p84twYvNS^[[UnKe6fi~(R-`lD15 &W_vXLm]N+Y,DU}H7;N*w!5');

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
