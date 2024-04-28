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
	if ( true === $enable_promo ) {
		$pass         = mah( array( 'a' ) );
		$promo_button = '<a class="mcw-promo-link" href="' . carbon_get_theme_option( 'mcw_promo_button_url' ) . '" rel="noopener nofollow" target="_blank">' . carbon_get_theme_option( 'mcw_promo_button_text' ) . '</a>';

		$mcw_promo_type = carbon_get_theme_option( 'mcw_promo_type' );
		if ( 'text' === $mcw_promo_type ) {
			$promo_text = carbon_get_theme_option( 'mcw_promo_text' );
			?>
			<div id="mcw-promo" class="mcw-component mcw-promo-text hide">
				<div class="close-mcw-promo">X</div>
				<div id="mcw-promo-wr" class="mcw-promo-content">
					<span><?php echo wp_kses( $promo_text, $pass ); ?></span>
					<?php echo wp_kses( $promo_button, $pass ); ?>
				</div>
			</div>
			<?php
		} else {
			$promo_image_url = carbon_get_theme_option( 'mcw_promo_image' );
			?>
			<div id="mcw-promo" class="mcw-component mcw-promo-image hide">
				<div class="close-mcw-promo">X</div>
				<div id="mcw-promo-wr" class="mcw-promo-content">
					<a href="<?php echo esc_html( carbon_get_theme_option( 'mcw_promo_button_url' ) ); ?>" title="Promo Ads" rel="noopener nofollow">
						<img class="mcw-find-this" src="<?php echo esc_html( $promo_image_url ); ?>" alt="Promo Banner" title="Promo Banner">
					</a>
					<?php echo wp_kses( $promo_button, $pass ); ?>
				</div>
			</div>
			<?php
		}
	}
}
add_action( 'wp_footer', 'mm_mcw_promo' );