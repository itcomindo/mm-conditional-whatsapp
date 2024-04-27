<?php
/**
 *
 * Promo
 *
 * @package mcw
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Promo
 */
function mm_mcw_promo() {
	$enable_promo = carbon_get_theme_option( 'mcw_enable_promo' );
	$pass         = mah( array( 'a' ) );
	if ( true === $enable_promo ) {
		$promo_text = carbon_get_theme_option( 'mcw_promo_text' );
		?>
		<div id="mcw-promo" class="mcw-component hide">
			<div class="close-mcw-promo">X</div>
			<div id="mcw-promo-wr">
				<span><?php echo wp_kses( $promo_text, $pass ); ?></span>
			</div>
		</div>
		<?php
	}
}
add_action( 'wp_footer', 'mm_mcw_promo' );