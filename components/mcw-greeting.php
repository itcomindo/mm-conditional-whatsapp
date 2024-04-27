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
	$pass  = mah( array( 'svg' ) );
	$promo = carbon_get_theme_option( 'mcw_enable_promo' );
	if ( true === $promo ) {
		$promo = 'data-mcw-promo=true';
	} else {
		$promo = 'data-mcw-promo=false';
	}
	?>
	<div id="mcw-greeting" class="mcw-trigger curpointer mcw-hover-top mcw-component" <?php echo esc_html( $promo ) . ' ' . esc_html( mcw_get_staff_available() ); ?>>
		<div id="mcw-greeting-icon-wr">
			<?php
			echo wp_kses( mm_mcw_get_image()['wa'], $pass );
			?>
		</div>
	</div>
	<div id="mcw-greeting-text-wr" class="curpointer mcw-trigger">
		<span class="mcw-greeting-text"><?php echo esc_html( carbon_get_theme_option( 'mcw_greeting_text' ) ); ?></span>
	</div>
	<?php
}


/**
 * Count Staff
 */
function mcw_get_staff_available() {
	$mcw = carbon_get_theme_option( 'mcw' );
	if ( $mcw ) {
		foreach ( $mcw as $staff ) {
			$enable_schedules = $staff['mcw_enable_schedule'];
			if ( $enable_schedules ) {
				$wawa_free_day = $staff['mcw_disable_staff_schedule'];
				if ( $wawa_free_day ) {
					$libur = array();
					foreach ( $wawa_free_day as $libur_on ) {
						$libur[] = $libur_on;
					}
					$libur_str = implode( ', ', $libur );
				}
				$day_today = mm_mcw_timezone()['hari'];
				$count     = 0;
				if ( $libur_str ) {
					if ( ! in_array( $day_today, $wawa_free_day, true ) ) {
						++$count;
					}
				}
			} else {
				$count = count( $mcw );
			}
		}
	}
	if ( 0 === $count ) {
		$staff_available = 'data-staff-available=false';
	} else {
		$staff_available = 'data-staff-available=true';
	}
	$staff_available = 2;
	return $staff_available;
}