<?php
/**
 *
 * Assts
 *
 * @package idw
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Load style and script
 */
function mm_mcw_enqueue_script() {
	wp_enqueue_style( 'animate-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1', 'all' );
	wp_enqueue_style( 'mcw-style', MCW_URL . 'assets/css/style.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'mcw-script', MCW_URL . 'assets/js/js.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'mm_mcw_enqueue_script' );


/**
 * Load mcw-admin.css in WordPress admin
 */
function mm_mcw_admin_enqueue_script() {
	wp_enqueue_style( 'mcw-admin', MCW_URL . 'assets/css/mcw-admin.css', array(), '1.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'mm_mcw_admin_enqueue_script' );

/**
 * Load Font Awesome if not exist
 */
function mcw_enqueue_fa() {
	if ( ! wp_style_is( 'fontawesome-handle', 'enqueued' ) ) {
		wp_enqueue_style( 'mm-fontawesome-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );
	}
}

add_action( 'wp_enqueue_scripts', 'mcw_enqueue_fa' );
