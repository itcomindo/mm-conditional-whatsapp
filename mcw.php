<?php
/**
 *
 * Plugin Name: MM Condition Whatsapp
 * Plugin URI: https://budiharyono.id/
 * Description: This plugin is used to show the whatsapp button on the website.
 * Version: 1.1
 * Author: Budi Haryono
 * Author URI: https://budiharyono.id/
 *
 * @package mcw
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Define path
 */
define( 'MCW_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Define URL
 */
define( 'MCW_URL', plugin_dir_url( __FILE__ ) );


/**
 * Check CF Loaded
 */
function mm_mcw_call_carbon_fields() {
	if ( ! class_exists( '\Carbon_Fields\Carbon_Fields' ) ) {
		require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
		\Carbon_Fields\Carbon_Fields::boot();
	}
}

/**
 * MCS CF Loaded
 */
function mcw_cf_loaded() {
	if ( ! function_exists( 'carbon_fields_boot_plugin' ) ) {
		mm_mcw_call_carbon_fields();
	}
}
add_action( 'plugins_loaded', 'mcw_cf_loaded' );








/**
 * MasmonsThemeFunction
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 * @param array $html_tags_allowed Array of allowed HTML tags.
 */
function mah( $html_tags_allowed = array() ) {
	if ( ! is_array( $html_tags_allowed ) ) {
		return array(); // Kembalikan array kosong jika input tidak valid.
	}
	$pass = array();

	// Definisikan atribut untuk SVG.
	$svg_args = array(
		'class'             => true,
		'aria-hidden'       => true,
		'aria-labelledby'   => true,
		'role'              => true,
		'xmlns'             => true,
		'width'             => true,
		'height'            => true,
		'viewBox'           => true,
		'version'           => true,
		'xmlns:xlink'       => true,
		'x'                 => true,
		'y'                 => true,
		'enable-background' => true,
		'xml:space'         => true,
		'metadata'          => true,
		'style'             => true,
		'viewbox'           => true,
		'path'              => true,
		'fill'              => true,
		'fill-rule'         => true,
		'clip-rule'         => true,
		'd'                 => true,
	);

	foreach ( $html_tags_allowed as $tag ) {
		$attributes = array(
			'class' => array(),
			'id'    => array(), // Tambahkan atribut id.
		);

		// Tambahkan atribut tambahan untuk tag spesifik.
		if ( 'img' === $tag ) {
			$attributes['src']    = array();
			$attributes['alt']    = array();
			$attributes['title']  = array();
			$attributes['width']  = array();
			$attributes['height'] = array();
		}

		if ( 'a' === $tag ) {
			$attributes['href']   = array();
			$attributes['target'] = array();
			$attributes['rel']    = array();
			$attributes['style']  = array();
			$attributes['class']  = array();
		}

		// Jika tag adalah SVG, gunakan atribut yang telah didefinisikan dalam $svg_args.
		if ( 'svg' === $tag ) {
			$attributes = $svg_args;
		}

		// iframe.
		if ( 'iframe' === $tag ) {
			$attributes['src']             = true;
			$attributes['width']           = true;
			$attributes['height']          = true;
			$attributes['frameborder']     = true;
			$attributes['allowfullscreen'] = true;
		}

		// Jika tag adalah div, tambahkan atribut data-xxxx dengan validasi nilai hex.
		if ( 'div' === $tag ) {
			$attributes = array_merge(
				$attributes,
				array(
					'/^data-[a-zA-Z0-9\-]*$/' => array(
						'pattern' => '/^#[a-fA-F0-9]{6}$/',
					),
				)
			);
		}

		$pass[ $tag ] = $attributes;
	}

	// Tambahkan elemen lain yang diperlukan untuk SVG.
	$pass['g']     = array( 'fill' => true );
	$pass['title'] = array( 'title' => true );
	$pass['path']  = array(
		'd'    => true,
		'fill' => true,
	);

	return $pass;
}






// Get required files.
require_once MCW_PATH . 'assets/images/images.php';
require_once MCW_PATH . 'assets/assets.php';
require_once MCW_PATH . 'components/components.php';
require_once MCW_PATH . 'mcw-options.php';
require_once MCW_PATH . 'mcw-timezone.php';








/**
 * Load MCW Whatsapp
 */
function mm_load_mcw_whatsapp() {
	$greeting_status = true;
	if ( true === $greeting_status ) {
		add_action( 'wp_footer', 'mm_mcw_greeting' );
	}
}

add_action( 'init', 'mm_load_mcw_whatsapp' );
