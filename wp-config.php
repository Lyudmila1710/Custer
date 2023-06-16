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
define( 'DB_NAME', '570-21_mer' );

/** Database username */
define( 'DB_USER', '570-21_Kosterina' );

/** Database password */
define( 'DB_PASSWORD', 'a13e876302dfe26f8a7f' );

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
define( 'AUTH_KEY',         'I~fG@K3&~xI6[3O={xI|DgHb~o#bGnVhy=0+a!Hp=0ewLn4#7jo.u#~+X;j t=o1' );
define( 'SECURE_AUTH_KEY',  '%(#A6Uh>e3K0u#%(X=B]~a@/=yKCO&L (ALhRmZ/17N18wa#fMn}QNwMW=IOi.D#' );
define( 'LOGGED_IN_KEY',    '[17NsP%=t[(5yqF4R(-K?EcTgJ-@+es.HC9~m33jq}DB*k(k#*9S=t@ih,2;G*Ue' );
define( 'NONCE_KEY',        'xpIMUAi},NfrI%NdB`#T1,<IUCoGur=0`*a?=PKaMzk>|HR.7K|,<b;w<PFPU~3L' );
define( 'AUTH_SALT',        'EBtu+N!I%m%)h.KJ?T{E<fm{mBv@rW-+K^k:laH.oU;.x4#UG^N-m<bp]K={8OO9' );
define( 'SECURE_AUTH_SALT', '(WjIv%p1k.C{WE@R?terxeN+N%tRUE4amE>9r3%} .2ImD5O-ilZ-@_4vfKJ.pz*' );
define( 'LOGGED_IN_SALT',   '?e~I8wXzWp2$[l_F[SLrW/=~Dm%Ft<,AB=w1Gwo{l+g#{!SWLs%yKs,;Ak|H]fU@' );
define( 'NONCE_SALT',       'e]UR4RV9eqZ@NSZ^:K3977(.^?:z#c[EtaB$2DCE0?SR^L}}9Gc=-1X9OV#9w53]' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'UFNOo_';


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