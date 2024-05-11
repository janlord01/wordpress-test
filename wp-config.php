<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'wordpress_test' );

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
define( 'AUTH_KEY',         'J`qml3` +u:$# &~};uF`4*Wf%RT%wk6QZmPyb/97pDkvqNeh 3BPynp7d=:27^R' );
define( 'SECURE_AUTH_KEY',  '2&/d$#C+U*LQDszS6;z);,!a,.9-@`r<0VVqju%?<MgF5!T>2790<eM.gbdQwLTB' );
define( 'LOGGED_IN_KEY',    'm`~9z8ixJ]*41F_ElbD3v8RAHTgK-+%-V^e|.T1[z<3klD2tmf ^V[dP3l^=Y(EW' );
define( 'NONCE_KEY',        'frodlP Ck#qxIm<T;}*b~S&9MB}i5fq#=3OID/g6vJV9~)H_@JneGp4488#!wE?5' );
define( 'AUTH_SALT',        'kOj#9MKR&qdqVA yzgrL=S4Kh3R[:$#o@SZD-H!Y>we{Bz%XWEoI=NE8MZT>=N--' );
define( 'SECURE_AUTH_SALT', 'TbTU(D|UHXEoQ$7TDj]gV~OpbHh!4aP[X&raQ5v/TbVpauwWbYgv{ez} kNW:4Q,' );
define( 'LOGGED_IN_SALT',   'M_]@R47JH*E>{-d&vd5!@H~Z[NUw0ITLiP6E:2P)=-gW7=h&v$JmS#g7,2ROU>|Y' );
define( 'NONCE_SALT',       '*,I0qhoePv37b}Qn>n,ksi_Y]]NkaG{%D|f[!Vi$nCmuXj>q}2tl-Lc1Ch}Xle[_' );

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
