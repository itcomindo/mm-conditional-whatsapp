<?php
/**
 *
 * TimeZone
 *
 * @package mcw
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );



/**
 * TimeZone
 *
 * @return array
 */
function mm_mcw_timezone() {
	$mcw_timezone = carbon_get_theme_option( 'mcw_timezone' );
	$date         = new DateTime( 'now', new DateTimeZone( $mcw_timezone ) );
	$tanggal      = $date->format( 'd' );
	$bulan        = $date->format( 'F' );
	$tahun        = $date->format( 'Y' );
	$jam          = $date->format( 'H' );
	$menit        = $date->format( 'i' );
	$detik        = $date->format( 's' );
	$hari         = $date->format( 'l' );

	$tz = array(
		'hari'    => $hari,
		'tanggal' => $tanggal,
		'bulan'   => $bulan,
		'tahun'   => $tahun,
		'jam'     => $jam,
		'menit'   => $menit,
		'detik'   => $detik,
	);

	return $tz;
}


/**
 * TimeZone.
 */
function tz() {
	$mcw = carbon_get_theme_option( 'mcw_timezone' );
	return $mcw;
}
add_shortcode( 'timezone', 'tz' );


/**
 * Hari.
 */
function hari() {
	return mm_mcw_timezone()['hari'];
}

/**
 * Tanggal.
 */
function tanggal() {
	return mm_mcw_timezone()['tanggal'];
}
add_shortcode( 'tanggal', 'tanggal' );

/**
 * Bulan.
 */
function bulan() {
	return mm_mcw_timezone()['bulan'];
}
add_shortcode( 'bulan', 'bulan' );

/**
 * Tahun.
 */
function tahun() {
	return mm_mcw_timezone()['tahun'];
}
add_shortcode( 'tahun', 'tahun' );

/**
 * Jam.
 */
function jam() {
	return mm_mcw_timezone()['jam'];
}
add_shortcode( 'jam', 'jam' );

/**
 * Menit.
 */
function menit() {
	return mm_mcw_timezone()['menit'];
}
add_shortcode( 'menit', 'menit' );

/**
 * Detik.
 */
function detik() {
	return mm_mcw_timezone()['detik'];
}
add_shortcode( 'detik', 'detik' );
