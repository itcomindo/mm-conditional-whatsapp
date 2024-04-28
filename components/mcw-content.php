<?php
/**
 *
 * MCW Content
 *
 * @package mcw
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


/**
 * MM Condition Whatsapp
 */
function mm_mcw_whatsapp() {
	$pass = mah( array( 'svg', 'img', 'src' ) );
	?>
	<div id="mcw" class="animate__animated mcw-component hide">
		<div class="mcw-close curpointer"><span>X</span></div>
		<div id="mcw-wr">
			<?php
			mm_get_staff();
			?>
		</div>
	</div>
	<?php
}
add_action( 'wp_footer', 'mm_mcw_whatsapp' );



/**
 * Staff
 */
function mm_get_staff() {
	$pass = mah( array( 'svg', 'img', 'src', 'span', 'i' ) );
	$mcw  = carbon_get_theme_option( 'mcw' );
	if ( $mcw ) {
		foreach ( $mcw as $staff ) {
			$staff_name       = $staff['mcw_name'];
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
				if ( $libur_str ) {
					if ( ! in_array( $day_today, $wawa_free_day, true ) ) {
						?>
					<div class="mcwi">
				
					<div class="mcwil">
						<div class="mcwil-photo-wr">

						<?php
						if ( true === $staff['mcw_show_photo'] ) {
							$mcw_photo = $staff['mcw_photo'];
							?>
							<img class="mcw-find-this" src="<?php echo esc_html( $mcw_photo ); ?>" alt="customer service">
							<?php
						} else {
							$mcw_default_photo = $staff['mcw_default_photo'];
							echo '<img class="mcw-find-this" src="' . esc_html( MCW_URL ) . 'assets/images/' . esc_html( $mcw_default_photo ) . '.png" alt="customer service">';
						}
						?>
						</div>
					</div>


				<div class="mcwim">
						<?php echo wp_kses( mcw_staff_name( $staff['mcw_name'] ), $pass ); ?>
						<?php echo wp_kses( mcw_staff_job( $staff['mcw_job'] ), $pass ); ?>
						<?php echo wp_kses( mcw_whatsapp_number( $staff['mcw_show_wa_number'], $staff['mcw_wa_number'] ), $pass ); ?>
				</div>


				<div class="mcwir">
					<ul class="mcw-list">

						<!-- chat -->
						<?php
						mcw_whatsapp_button( $staff['mcw_show_wa'], $staff['mcw_show_wa_icon'], $staff['mcw_wa_number'], $staff['mcw_wa_text'] );
						?>

						<!-- call -->
						<?php
						mcw_call_button( $staff['mcw_show_call'], $staff['mcw_show_call_icon'], $staff['mcw_call_number'], $staff['mcw_call_text'] );
						?>
						
						<!-- email -->

						<?php
						mcw_email_button( $staff['mcw_show_email'], $staff['mcw_show_email_icon'], $staff['mcw_email'], $staff['mcw_email_text'] );
						?>
						
						<!-- Telegram -->
						<?php
						mcw_telegram_button( $staff['mcw_show_telegram'], $staff['mcw_show_telegram_icon'], $staff['mcw_telegram'], $staff['mcw_telegram_text'] );
						?>

						<!-- Custom Buttons -->

						<?php
						$mcw_show_custom = $staff['mcw_show_custom'];
						if ( $mcw_show_custom ) {
							$btn_num            = 0;
							$mcw_custom_buttons = $staff['mcw_custom_button'];
							foreach ( $mcw_custom_buttons as $cbtn ) {
								++$btn_num;
								$cbtn_name = $cbtn['mcw_custom_button_name'];
								$cbtn_url  = $cbtn['mcw_custom_button_url'];
								$cbtn_text = $cbtn['mcw_custom_button_text'];
								$cbtn_icon = $cbtn['mcw_custom_button_icon'];
								if ( ! empty( $cbtn_icon ) ) {
									$cbtn_icon = '<i class="' . esc_attr( $cbtn_icon ) . '"></i>';
								} else {
									$cbtn_icon = '';
								}

								$cbtn_bg    = $cbtn['mcw_custom_button_bg'];
								$cbtn_color = $cbtn['mcw_custom_button_color'];

								$style = '';
								if ( $cbtn_color ) {
									$style .= 'color: ' . esc_attr( $cbtn_color ) . ';';
								}

								if ( $cbtn_bg ) {
									$style .= 'background-color: ' . esc_attr( $cbtn_bg ) . ';';
								}
								// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped.
								$cbtn_bg = $style ? 'style="' . $style . '"' : '';

								?>
								
								<li>
									<a <?php echo $cbtn_bg; ?> class="mcw-cta mcw-custom-btn btn-num-<?php echo esc_attr( $btn_num ); ?>" href="<?php echo esc_url( $cbtn_url ); ?>" title="<?php echo esc_attr( $cbtn_name ); ?>" rel="noopener nofollow" target="_blank">
										<?php echo wp_kses( $cbtn_icon, $pass ); ?><?php echo esc_html( $cbtn_text ); ?>
									</a>
								</li>
								<?php
							}
						}
						?>
						


					</ul>
				</div>
			</div>
						<?php
					}
				}
			} else {
				?>
				<div class="mcwi">
				
				<div class="mcwil">
					<div class="mcwil-photo-wr">

					<?php
					if ( true === $staff['mcw_show_photo'] ) {
						$mcw_photo = $staff['mcw_photo'];
						?>
						<img class="mcw-find-this" src="<?php echo esc_html( $mcw_photo ); ?>" alt="customer service">
						<?php
					} else {
						$mcw_default_photo = $staff['mcw_default_photo'];
						echo '<img class="mcw-find-this" src="' . esc_html( MCW_URL ) . 'assets/images/' . esc_html( $mcw_default_photo ) . '.png" alt="customer service">';
					}
					?>
					</div>
				</div>


			<div class="mcwim">
					<?php echo wp_kses( mcw_staff_name( $staff['mcw_name'] ), $pass ); ?>
					<?php echo wp_kses( mcw_staff_job( $staff['mcw_job'] ), $pass ); ?>
					<?php echo wp_kses( mcw_whatsapp_number( $staff['mcw_show_wa_number'], $staff['mcw_wa_number'] ), $pass ); ?>
			</div>


			<div class="mcwir">
				<ul class="mcw-list">

					<!-- chat -->
					<?php
					mcw_whatsapp_button( $staff['mcw_show_wa'], $staff['mcw_show_wa_icon'], $staff['mcw_wa_number'], $staff['mcw_wa_text'] );
					?>

					<!-- call -->
					<?php
					mcw_call_button( $staff['mcw_show_call'], $staff['mcw_show_call_icon'], $staff['mcw_call_number'], $staff['mcw_call_text'] );
					?>
					
					<!-- email -->

					<?php
					mcw_email_button( $staff['mcw_show_email'], $staff['mcw_show_email_icon'], $staff['mcw_email'], $staff['mcw_email_text'] );
					?>
					
					<!-- Telegram -->
					<?php
					mcw_telegram_button( $staff['mcw_show_telegram'], $staff['mcw_show_telegram_icon'], $staff['mcw_telegram'], $staff['mcw_telegram_text'] );
					?>


					<!-- Custom Buttons -->
					<?php
						$mcw_show_custom = $staff['mcw_show_custom'];
					if ( $mcw_show_custom ) {
						$btn_num            = 0;
						$mcw_custom_buttons = $staff['mcw_custom_button'];
						foreach ( $mcw_custom_buttons as $cbtn ) {
							++$btn_num;
							$cbtn_name = $cbtn['mcw_custom_button_name'];
							$cbtn_url  = $cbtn['mcw_custom_button_url'];
							$cbtn_text = $cbtn['mcw_custom_button_text'];
							$cbtn_icon = $cbtn['mcw_custom_button_icon'];
							if ( ! empty( $cbtn_icon ) ) {
								$cbtn_icon = '<i class="' . esc_attr( $cbtn_icon ) . '"></i>';
							} else {
								$cbtn_icon = '';
							}

							$cbtn_bg    = $cbtn['mcw_custom_button_bg'];
							$cbtn_color = $cbtn['mcw_custom_button_color'];

							$style = '';
							if ( $cbtn_color ) {
								$style .= 'color: ' . esc_attr( $cbtn_color ) . ';';
							}

							if ( $cbtn_bg ) {
								$style .= 'background-color: ' . esc_attr( $cbtn_bg ) . ';';
							}

							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped.
							$cbtn_bg = $style ? 'style="' . $style . '"' : '';

							?>
								
								<li>
									<a <?php echo $cbtn_bg; ?> class="mcw-cta mcw-custom-btn btn-num-<?php echo esc_attr( $btn_num ); ?>" href="<?php echo esc_url( $cbtn_url ); ?>" title="<?php echo esc_attr( $cbtn_name ); ?>" rel="noopener nofollow" target="_blank">
									<?php echo wp_kses( $cbtn_icon, $pass ); ?><?php echo esc_html( $cbtn_text ); ?>
									</a>
								</li>
								<?php
						}
					}
					?>



				</ul>
			</div>
		</div>
				<?php
			}
		}
	} else {
		mm_get_dummy_staff();
	}
}

/**
 * Whatsapp Button
 *
 * @param boolean $show_whatsapp Show Whatsapp.
 * @param boolean $icon Show Icon.
 * @param string  $whatsapp_number Whatsapp Number.
 * @param string  $whatsapp_text Whatsapp Text.
 */
function mcw_whatsapp_button( $show_whatsapp = true, $icon = true, $whatsapp_number, $whatsapp_text ) {
	$pass = mah( array( 'svg', 'img', 'src', 'span' ) );
	if ( true === $show_whatsapp ) {
		$whatsapp_number = $whatsapp_number;
		$whatsapp_number = substr_replace( $whatsapp_number, '62', 0, 1 );
		$whatsapp_number = str_replace( '-', '', $whatsapp_number );
		$whatsapp_number = str_replace( ' ', '', $whatsapp_number );

		$mcw_include_title = carbon_get_theme_option( 'mcw_include_title' );

		if ( true === $mcw_include_title ) {
			// replace space with %20.
			$prefix = str_replace( '', '%20', carbon_get_theme_option( 'mcw_title_prefix' ) );
			if ( is_single() || is_singular() || is_page() ) {
				$page_title = str_replace( '', '%20', get_the_title() );
				$page_title = '?text=' . $prefix . '%20*' . $page_title . '*%20yang%20ada%20di%20' . get_the_permalink();
			} else {
				$page_title = '';
			}
		} else {
			$page_title = '';
		}

		if ( true === $icon ) {
			?>
			<li><a class="mcw-cta mcw-wa-btn" href="//wa.me/<?php echo esc_html( $whatsapp_number ) . '' . esc_html( $page_title ); ?>" title="whatsapp" rel="noopener nofollow" target="_blank"><span class="mcwii"><?php echo wp_kses( mm_mcw_get_image()['wa'], $pass ); ?></span> <?php echo esc_html( $whatsapp_text ); ?></a></li>
			<?php
		} else {
			?>
			<li><a class="mcw-cta mcw-wa-btn" href="//wa.me/<?php echo esc_html( $whatsapp_number ); ?>" title="whatsapp" rel="noopener nofollow" target="_blank"><?php echo esc_html( $whatsapp_text ); ?></a></li>
			<?php
		}
	}
}

/**
 * Call Button
 *
 * @param boolean $show_call Show Call.
 * @param boolean $icon Show Icon.
 * @param string  $call_number Call Number.
 * @param string  $call_text Call Text.
 */
function mcw_call_button( $show_call = true, $icon = true, $call_number, $call_text ) {
	$pass = mah( array( 'svg', 'img', 'src', 'span' ) );
	if ( true === $show_call ) {
		$call_number = $call_number;
		$call_number = str_replace( '-', '', $call_number );
		$call_number = str_replace( ' ', '', $call_number );
		if ( true === $icon ) {
			?>
			<li><a class="mcw-cta mcw-call-btn" href="tel:<?php echo esc_html( $call_number ); ?>" title="call" rel="noopener nofollow" target="_blank"><span class="mcwii"><?php echo wp_kses( mm_mcw_get_image()['call'], $pass ); ?></span> <?php echo esc_html( $call_text ); ?></a></li>
			<?php
		} else {
			?>
			<li><a class="mcw-cta mcw-call-btn" href="tel:<?php echo esc_html( $call_number ); ?>" title="call" rel="noopener nofollow" target="_blank"><?php echo esc_html( $call_text ); ?></a></li>
			<?php
		}
	}
}

/**
 * Email Button
 *
 * @param boolean $show_email Show Email.
 * @param boolean $icon Show Icon.
 * @param string  $email Email.
 * @param string  $email_text Email Text.
 */
function mcw_email_button( $show_email = true, $icon = true, $email, $email_text ) {
	$pass = mah( array( 'svg', 'img', 'src', 'span' ) );
	if ( true === $show_email ) {
		if ( true === $icon ) {
			?>
			<li><a class="mcw-cta mcw-email-btn" href="mailto:<?php echo esc_html( $email ); ?>" title="email" rel="noopener nofollow" target="_blank"><span class="mcwii"><?php echo wp_kses( mm_mcw_get_image()['email'], $pass ); ?></span> <?php echo esc_html( $email_text ); ?></a></li>
			<?php
		} else {
			?>
			<li><a class="mcw-cta mcw-email-btn" href="mailto:<?php echo esc_html( $email ); ?>" title="email" rel="noopener nofollow" target="_blank"><?php echo esc_html( $email_text ); ?></a></li>
			<?php
		}
	}
}

/**
 * Telegram Button
 *
 * @param boolean $show_telegram Show Telegram.
 * @param boolean $icon Show Icon.
 * @param string  $telegram_number Telegram Number.
 * @param string  $telegram_text Telegram Text.
 */
function mcw_telegram_button( $show_telegram = true, $icon = true, $telegram_number, $telegram_text ) {
	$pass = mah( array( 'svg', 'img', 'src', 'span' ) );
	if ( true === $show_telegram ) {
		$telegram_number = $telegram_number;
		$telegram_number = str_replace( '-', '', $telegram_number );
		$telegram_number = str_replace( ' ', '', $telegram_number );
		if ( true === $icon ) {
			?>
			<li><a class="mcw-cta mcw-telegram-btn" href="//t.me/<?php echo esc_html( $telegram_number ); ?>" title="telegram" rel="noopener nofollow" target="_blank"><span class="mcwii"><?php echo wp_kses( mm_mcw_get_image()['telegram'], $pass ); ?></span> <?php echo esc_html( $telegram_text ); ?></a></li>
			<?php
		} else {
			?>
			<li><a class="mcw-cta mcw-telegram-btn" href="tel:<?php echo esc_html( $telegram_number ); ?>" title="telegram" rel="noopener nofollow" target="_blank"><?php echo esc_html( $telegram_text ); ?></a></li>
			<?php
		}
	}
}


/**
 * Whatsapp Number
 *
 * @param boolean $show_whatsapp_number Show Whatsapp Number.
 * @param string  $whatsapp_number Whatsapp Number.
 */
function mcw_whatsapp_number( $show_whatsapp_number, $whatsapp_number ) {
	if ( true === $show_whatsapp_number ) {
		$whatsapp_number = '<span class="mcw-phone-number">' . $whatsapp_number . '</span>';
	} else {
		$whatsapp_number = '';
	}
	return $whatsapp_number;
}




/**
 * Staff Name
 *
 * @param string $staff_name Staff Name.
 */
function mcw_staff_name( $staff_name ) {
	if ( ! empty( $staff_name ) ) {
		$staff_name = $staff_name;
		$staff_name = '<span class="mcw-name">' . $staff_name . '</span>';
	} else {
		$staff_name = '<span class="mcw-name">Staff Name</span>';
	}
	return $staff_name;
}

/**
 * Staff job
 *
 * @param string $staff_job Staff Job.
 */
function mcw_staff_job( $staff_job ) {
	if ( ! empty( $staff_job ) ) {
		$staff_job = $staff_job;
		$staff_job = '<span class="mcw-job">' . $staff_job . '</span>';
	} else {
		$staff_job = '';
	}
	return $staff_job;
}


/**
 * Get Dummy Staff
 */
function mm_get_dummy_staff() {
	?>
	<div class="mcwi">
				<div class="mcwil">
				<div class="mcwil-photo-wr">
					<img class="mcw-find-this" src="<?php echo wp_kses( mm_mcw_get_image()['bhy'], $pass ); ?>" alt="customer service">
				</div>
				</div>
				<div class="mcwim">
					<span class="mcw-name">Kevin Rava</span>
					<span class="mcw-job">Support</span>
					<span class="mcw-phone-number">0813-9891-2341</span>
				</div>
				<div class="mcwir">
					<ul class="mcw-list">

						<!-- chat -->
						<li><a class="mcw-cta mcw-wa-btn" href="#" title="whatsapp" rel="noopener nofollow" target="_blank"><span class="mcwii"><?php echo wp_kses( mm_mcw_get_image()['wa'], $pass ); ?></span> Whatsapp</a></li>

						<!-- call -->
						<li><a class="mcw-cta mcw-call-btn" href="#" title="call" rel="noopener nofollow" target="_blank"><span class="mcwii"><?php echo wp_kses( mm_mcw_get_image()['wa'], $pass ); ?></span> Call</a></li>
						
						<!-- email -->
						<li><a class="mcw-cta mcw-email-btn" href="#" title="email" rel="noopener nofollow" target="_blank"><span class="mcwii"><?php echo wp_kses( mm_mcw_get_image()['wa'], $pass ); ?></span> Email</a></li>
						
						<!-- Telegram -->
						<li><a class="mcw-cta mcw-telegram-btn" href="#" title="email" rel="noopener nofollow" target="_blank"><span class="mcwii"><?php echo wp_kses( mm_mcw_get_image()['wa'], $pass ); ?></span> Telegram</a></li>
					</ul>
				</div>
			</div>
	<?php
}

