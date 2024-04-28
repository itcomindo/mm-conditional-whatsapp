<?php
/**
 *
 * Silence is golden
 *
 * @package what
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );



/**
 * MM Condition Whatsapp Greeting
 */
function mm_mcw_greeting() {
	$debuging = false;
	if ( $debuging ) {
		$debug_mode = 'hide';
	} else {
		$debug_mode = '';
	}
	$pass  = mah( array( 'svg' ) );
	$promo = carbon_get_theme_option( 'mcw_enable_promo' );
	if ( true === $promo ) {
		$promo = 'data-mcw-promo=true';
	} else {
		$promo = 'data-mcw-promo=false';
	}
	?>
	<div id="mcw-greeting" class="mcw-trigger curpointer mcw-hover-top mcw-component <?php echo esc_html( $debug_mode ); ?>" <?php echo esc_html( $promo ); ?>>
		<div id="mcw-greeting-icon-wr">
			<?php
			echo wp_kses( mm_mcw_get_image()['wa'], $pass );
			?>
		</div>
	</div>
	<div id="mcw-greeting-text-wr" class="curpointer mcw-trigger <?php echo esc_html( $debug_mode ); ?>">
		<span class="mcw-greeting-text"><?php echo esc_html( carbon_get_theme_option( 'mcw_greeting_text' ) ); ?></span>
	</div>
	<?php
}

