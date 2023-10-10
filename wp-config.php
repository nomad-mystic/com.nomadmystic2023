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
define( 'DB_NAME', 'nomad_wp142' );

/** Database username */
define( 'DB_USER', 'nomad_wp142' );

/** Database password */
define( 'DB_PASSWORD', '2-Shpj2)16' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'trcoxqdrj3de9gymrsde3zdlo7eyfdqfvcmo8xojqueku4jykhbsif30x0vf6hjq' );
define( 'SECURE_AUTH_KEY',  'cxtl6yraa42fsrvctgiooljychbyiqpopqcrcaenozxslr8jkqwibthrb5ubyrdm' );
define( 'LOGGED_IN_KEY',    'pngpjec94bfkofao8vnvvyeuqu417t6ripnsbnwfikx1yuhdosb3garvikrptgot' );
define( 'NONCE_KEY',        'pewxapbqirglqjisysu3xicysxxakbeso4khpoybawisvcees64hk0fgvvf9h5by' );
define( 'AUTH_SALT',        'vhuaxpofmcfqetpjitw8t0u2l3bymqotxxz9ag3oagx1zvkgb1itbkz6sz2a2i57' );
define( 'SECURE_AUTH_SALT', 'tthgs7cv7jnqe7wcd5k4fiy5hl1sfvokulyilgxoeq6fimjbhilqt4snz4c9tjtk' );
define( 'LOGGED_IN_SALT',   'jagojgntd0mwhbdn8rjpmlz166zglplmuigdaejunea3pbxwilgsp1ypjoy8nklw' );
define( 'NONCE_SALT',       '97evhmh0nubrr07zlf0jbilelefunoyxyojizrjvohbutmjgwgj6eyiiqow51gj3' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpyhvf_';

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
