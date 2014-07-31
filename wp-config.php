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
define('DB_NAME', 'cambiumt_nadlan_city_qa');

/** MySQL database username */
define('DB_USER', 'cambiumt_wor3779');

/** MySQL database password */
define('DB_PASSWORD', 'cTfGm4y7WygD');

/** MySQL hostname */
define('DB_HOST', 'cambium.co.il');

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
define('AUTH_KEY',         '5zK!Q-(%?<y0]2*Zr$k2$e/)H8 s}0Od`S|YJdBCCT?7}V#Q)E.1PILiVU7q.c;v');
define('SECURE_AUTH_KEY',  '2~H_8~-7o!=LHFz9gsOBo]Oe4x(32KOvA3AN6-$LiR0WWnC5+sPT~^EV`O@F-~85');
define('LOGGED_IN_KEY',    '3BR3GNeL+,z52RoeTE3$/S%9*.{4GN9nw2i^* kvmtop$6=|@NQafc(S!>C7d.Fw');
define('NONCE_KEY',        ']wHcEuUI$s@rX`5k B4`xZqw]|s|:fc55H2Xo=C$P|shzo~~oX2$I(3|-*-Dd~w0');
define('AUTH_SALT',        '!V6885,WibQVVjLl#vD{(J&w3Hte`V*{Q F~|nU67D@$,lY+L2/?.sb=V(97vM_H');
define('SECURE_AUTH_SALT', 'J~+,_vZ6Yp1U1>Tlb0~1zTQa.G-f#/l_bQb}Dg-|c-3=glpMZ2rk0-_UoERy1]m!');
define('LOGGED_IN_SALT',   'A8!=_[!xKuFn>+hF;0(@+g59@0~R(n|IX81rY/~s!^8%#-Cb<+r&R<6P^U)/4r*o');
define('NONCE_SALT',       '2hKf`{+tp[6+?D$cMo1+{FDlIYrIAZ$51^is%)-zH%=g6Ye<+J;V sNN$4#ZmUE-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'he_IL');

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
