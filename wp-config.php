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
define( 'DB_NAME', 'amschool' );

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
define( 'AUTH_KEY',         'jc)yrjuT~`*`_Z,bsicOe_9@,LWh=%cC4,S6LDE/SkLKRa3 }.B1{d9eL2!`y1u4' );
define( 'SECURE_AUTH_KEY',  '(CkE20#9gJ0)1;Rx0c?N1=+.!> ^Iv;n_xiA6wVP.TUy/wr568n~SQV`2^f9$E0o' );
define( 'LOGGED_IN_KEY',    '~a%{H<?|.eU8:9V]p!W9l[Zgi,Hcrhn0Q%^[cRT,{EdB,Mh/?Jz}r.8G^i7:8$(2' );
define( 'NONCE_KEY',        '>iI83m9:3YGe_@Pc|}fpu/L?r^AG1>sIU$A[$D%qQkw0)wC5:%Ft=bYS%0YzWMe*' );
define( 'AUTH_SALT',        'mC;QWz&AzI2J%zwKZ#B_~IQ`lF6P{W]nOb_w!$M *{K&{jU*SKn:iEi9Nr:txdao' );
define( 'SECURE_AUTH_SALT', '%QCnP-b+OtzIb1v89oC5[<l|dOBBl71&-*3bN&B!(``KAK:9fUpKi5AebU986h-[' );
define( 'LOGGED_IN_SALT',   '1HI~Y5R!22%rl~^U <F%s@#)utW #@DNPk.5nm{A,N4mAIGk;G1iIsWy@[:JZe^B' );
define( 'NONCE_SALT',       '5!LP8kto%o$pR@iRLILayb7N.ah>t&~6|j:Gz0.}ZVD~ry!C`j|TTPGU;jQMF7hx' );

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
