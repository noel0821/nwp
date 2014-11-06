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
$db_data = false;
if ( file_exists('/opt/aws/cloud_formation.json') ) {
	$db_data = json_decode(file_get_contents('/opt/aws/cloud_formation.json'), true);
	if ( isset($db_data['rds']) ) {
		$db_data = $db_data['rds'];
		$db_data['host'] = $db_data['endpoint'] . ':' . $db_data['port'];
	}
}
if ( !$db_data ) {
	$db_data = array(
		'database' => 'i_b9336ba0',
		'username' => 'wp_2hna1b6eilj10',
		'password' => 'T)FHmOUnhGGrX(TU7kvSp^fTPCFPXuCg',
		'host'     => 'localhost',
	);
}

/** The name of the database for WordPress */
define('DB_NAME', $db_data['database']);

/** MySQL database username */
define('DB_USER', $db_data['username']);

/** MySQL database password */
define('DB_PASSWORD', $db_data['password']);

/** MySQL hostname */
define('DB_HOST', $db_data['host']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

unset($db_data);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '#.m.D$V<O[<}[lFE2x@r.%Y@Nm<JH|j<*LAm!h z;|s_xyKL|lT[ge;&N)z|V$j$');
define('SECURE_AUTH_KEY',  '/NbM&E<Zj|H;TbLUi;9/Q8hS,lkIMfjJUnb!@]bq{M>(-#3p1N/!wwWn(ejGLPIY');
define('LOGGED_IN_KEY',    'WW]ey{vr+SSJ[Qh(2F~|{/S#aY{|j)E*OYwHS6iMXfc uFt)t#v-WyTZw4;u5lP<');
define('NONCE_KEY',        ';BS+5D3 4?kU[GhUX1mR+Un+<c5C~>S^L<hpX@k2_^-;^ioG0]Ph8Q>v+.D2,M~)');
define('AUTH_SALT',        '9&UPhIO3@u{o%|~J9:WM|F_x622t52=GGr+;rsb:vvfziG+DXhZ|A@Hn+_#(hq0=');
define('SECURE_AUTH_SALT', ',)`&en3k^;VrpXLE)E~8$F8@grJj^{b|Q2S.CmkFd[V]t-v-Q290?lWMK1{.$x6+');
define('LOGGED_IN_SALT',   '}?;erAXhcS8%0W[IyGpEwbQa/4Q=#QOL;yAtH++]_4qX=K{n;WZgb>(e{T$rPYft');
define('NONCE_SALT',       '=)+3;Dov^Lk]>3,Dt;udOKO#}Jdfo2:Y~x*)5n|0,-j+-SO4c}UkMIX 4r>-DW~e');

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
define('WPLANG', 'ja');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
//define('WP_DEBUG', true);
//define('SAVEQUERIES', true);
//define('WP_DEBUG_DISPLAY', false);

/**
 * Multisite Settings
 */
// define ('WP_ALLOW_MULTISITE', true);
//
// define('MULTISITE', true);
// define('SUBDOMAIN_INSTALL', false);
// define('DOMAIN_CURRENT_SITE', 'example.com');
// define('PATH_CURRENT_SITE', '/');
// define('SITE_ID_CURRENT_SITE', 1);
// define('BLOG_ID_CURRENT_SITE', 1);

/**
 * For VaultPress
 */
define( 'VAULTPRESS_DISABLE_FIREWALL', true );
if ( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
   $forwarded_ips = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );
   $_SERVER['REMOTE_ADDR'] = $forwarded_ips[0];
   unset( $forwarded_ips );
}

/**
 * For Nginx Cache Controller
 */
define('IS_AMIMOTO', true);
define('NCC_CACHE_DIR', '/var/cache/nginx/proxy_cache');

/**
 * set post revisions
 */
//define('WP_POST_REVISIONS', 5);

/**
 * disallow file edit and modifie
 */
//define('DISALLOW_FILE_MODS',true);
//define('DISALLOW_FILE_EDIT',true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');