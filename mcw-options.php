<?php
/**
 *
 * MCW Options
 *
 * @package mcw
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Register Fields
 */
function mcw_register_fields() {
	Container::make( 'theme_options', 'MCW Options' )
	->add_fields(
		array(
			// select timezone.
			Field::make( 'select', 'mcw_timezone', 'Timezone' )
			->add_options(
				array(
					'Asia/Jakarta'  => 'Asia/Jakarta',
					'Asia/Makassar' => 'Asia/Makassar',
					'Asia/Jayapura' => 'Asia/Jayapura',
				)
			)
			->set_help_text( 'Please select your timezone this will make plugin related to your location' ),

			// greeting text.
			Field::make( 'textarea', 'mcw_greeting_text', 'Greeting Text' )
			->set_required( true )
			->set_attribute( 'maxLength', 100 )
			->set_default_value( 'Customer servivce kami siap membantu Anda, Lets get in touch' )
			->set_help_text( 'Please fill in the greeting text, please dont write to long max characters is 100' ),

			// checkbox to enable promo.
			Field::make( 'checkbox', 'mcw_enable_promo', 'Enable Promo' )
			->set_option_value( 'yes' )
			->set_default_value( false )
			->set_help_text( 'Check this box to enable promo.' ),

			// textarea to promo text.
			Field::make( 'textarea', 'mcw_promo_text', 'Promo Text' )
			->set_required( true )
			->set_attribute( 'maxLength', 100 )
			->set_default_value( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid dolor maiores, voluptates aperiam expedita architecto facilis doloribus distinctio sapiente ipsum?' )
			->set_help_text( 'Please fill in the promo text, please dont write to long max characters is 100' )
			->set_conditional_logic(
				array(
					array(
						'field' => 'mcw_enable_promo',
						'value' => true,
					),
				)
			),

			// checkbox to include post or product title.
			Field::make( 'checkbox', 'mcw_include_title', 'Include Post or Product Title' )
			->set_option_value( 'yes' )
			->set_default_value( false )
			->set_help_text( 'Check this box to include post or product title. It will include your post or product title in whatsapp or telegram chat' ),

			// text before post or product title if mcw_include_title is checked.
			Field::make( 'text', 'mcw_title_prefix', 'Title Text' )
			->set_required( true )
			->set_attribute( 'maxLength', 100 )
			->set_default_value( 'Hallo Saya ingin bertanya tentang' )
			->set_help_text( 'Please fill in the title text, please dont write to long max characters is 100, e.g hallo saya ingin bertanya tentang' )
			->set_conditional_logic(
				array(
					array(
						'field' => 'mcw_include_title',
						'value' => true,
					),
				)
			),

			// complex for staff start.
			Field::make( 'complex', 'mcw', 'Whatsapp Staff' )
			->set_layout( 'tabbed-horizontal' )
			->add_fields(
				array(

					// checkbox to enable schedule.
					Field::make( 'checkbox', 'mcw_enable_schedule', 'Enable Schedule' )
					->set_option_value( 'yes' )
					->set_default_value( false )
					->set_help_text( 'Check this box to disable this staff. If uncheck it will show your staff all days' ),

					// multiselect to disable button on day Sunday - Saturday.
					Field::make( 'multiselect', 'mcw_disable_staff_schedule', 'Disable staff on Day' )
					->add_options(
						array(
							'Sunday'    => 'Sunday',
							'Monday'    => 'Monday',
							'Tuesday'   => 'Tuesday',
							'Wednesday' => 'Wednesday',
							'Thursday'  => 'Thursday',
							'Friday'    => 'Friday',
							'Saturday'  => 'Saturday',
						)
					)
					->set_help_text( 'Please select the day you want to disable this staff.' )
					->set_conditional_logic(
						array(
							array(
								'field' => 'mcw_enable_schedule',
								'value' => true,
							),
						)
					),

					// name.
					Field::make( 'text', 'mcw_name', 'Staff Name' )
					->set_required( true )
					->set_default_value( 'Budi Haryono' )
					->set_help_text( 'Please fill in the staff name. e,g Budi Haryono' ),

					// checkbox to show whatsapp button.
					Field::make( 'checkbox', 'mcw_show_photo', 'Upload and Show Photo' )
					->set_option_value( 'yes' )
					->set_default_value( true )
					->set_help_text( 'Check this box to show Photo.' ),

					// photo.
					Field::make( 'image', 'mcw_photo', 'Staff Photo' )
					->set_required( true )
					->set_value_type( 'url' )
					->set_help_text( 'Please fill in the staff photo or leave it blank if you dont want to show photo it will show icon' )
					->set_conditional_logic(
						array(
							array(
								'field' => 'mcw_show_photo',
								'value' => true,
							),
						)
					),

					// cb select to show photo default.
					Field::make( 'select', 'mcw_default_photo', 'Choose Default Photo' )
					->add_options(
						array(
							'photo-1'  => 'Photo 1',
							'photo-2'  => 'Photo 2',
							'photo-3'  => 'Photo 3',
							'photo-4'  => 'Photo 4',
							'photo-5'  => 'Photo 5',
							'photo-6'  => 'Photo 6',
							'photo-7'  => 'Photo 7',
							'photo-8'  => 'Photo 8',
							'photo-9'  => 'Photo 9',
							'photo-10' => 'Photo 10',
							'photo-11' => 'Photo 11',
						)
					)
					->set_conditional_logic(
						array(
							array(
								'field' => 'mcw_show_photo',
								'value' => false,
							),
						)
					),

					// job.
					Field::make( 'text', 'mcw_job', 'Staff Job' )
					->set_default_value( 'Support' )
					->set_help_text( 'Please fill in the staff job. e,g Support leave it blank if you dont want to show' ),

					Field::make( 'separator', 'wasep', 'Whatsapp' )
					->set_classes( 'mcwsep' ),

					// checkbox to show whatsapp button.
					Field::make( 'checkbox', 'mcw_show_wa', 'Show Whatsapp Button' )
					->set_option_value( 'yes' )
					->set_default_value( true )
					->set_help_text( 'Check this box to show whatsapp button.' ),

					// checkbox to show wa icon.
					Field::make( 'checkbox', 'mcw_show_wa_icon', 'Show Whatsapp Icon' )
					->set_option_value( 'yes' )
					->set_default_value( true )
					->set_help_text( 'Check this box to show whatsapp icon.' ),

					// checkbox to show wa number.
					Field::make( 'checkbox', 'mcw_show_wa_number', 'Show Whatsapp Number' )
					->set_option_value( 'yes' )
					->set_default_value( true )
					->set_help_text( 'Check this box to show your whatsapp number.' ),

					// whatsapp number.
					Field::make( 'text', 'mcw_wa_number', 'Staff Whatsapp Number' )
					->set_required( true )
					->set_default_value( '0813-9891-2341' )
					->set_help_text( 'Please fill in the staff whatsapp number. e,g 0813-9891-2341' ),

					// whatsapp button text.
					Field::make( 'text', 'mcw_wa_text', 'Whatsapp Button Text' )
					->set_default_value( 'Chat' )
					->set_help_text( 'Please fill in the whatsapp button text. e,g Chat' ),

					Field::make( 'separator', 'callsep', 'Call' )
					->set_classes( 'mcwsep' ),

					// checkbox to show call button.
					Field::make( 'checkbox', 'mcw_show_call', 'Show Call Button' )
					->set_option_value( 'yes' )
					->set_default_value( true )
					->set_help_text( 'Check this box to show call button.' ),

					// call number.
					Field::make( 'text', 'mcw_call_number', 'Staff Call Number' )
					->set_required( true )
					->set_default_value( '0813-9891-2341' )
					->set_help_text( 'Please fill in the staff whatsapp number. e,g 0813-9891-2341' ),

					// call button text.
					Field::make( 'text', 'mcw_call_text', 'Call Button Text' )
					->set_default_value( 'Call' )
					->set_help_text( 'Please fill in the call button text. e,g Call' ),

					// checkbox to show call icon.
					Field::make( 'checkbox', 'mcw_show_call_icon', 'Show Call Icon' )
					->set_option_value( 'yes' )
					->set_default_value( true )
					->set_help_text( 'Check this box to show call icon.' ),

					Field::make( 'separator', 'emailsep', 'Email' )
					->set_classes( 'mcwsep' ),

					// checkbox to show email button.
					Field::make( 'checkbox', 'mcw_show_email', 'Show Email Button' )
					->set_option_value( 'yes' )
					->set_default_value( true )
					->set_help_text( 'Check this box to show email button.' ),

					// email.
					Field::make( 'text', 'mcw_email', 'Staff Email' )
					->set_default_value( 'someone@domain.com' )
					->set_help_text( 'Please fill in the staff email. e,g someone@domain.com' ),

					// email button text.
					Field::make( 'text', 'mcw_email_text', 'Email Button Text' )
					->set_default_value( 'Email' )
					->set_help_text( 'Please fill in the email button text. e,g Email' ),

					// checkbox to show email icon.
					Field::make( 'checkbox', 'mcw_show_email_icon', 'Show Email Icon' )
					->set_option_value( 'yes' )
					->set_default_value( true )
					->set_help_text( 'Check this box to show email icon.' ),

					Field::make( 'separator', 'telegramsep', 'Telegram' )
					->set_classes( 'mcwsep' ),

					// checkbox to show telegram button.
					Field::make( 'checkbox', 'mcw_show_telegram', 'Show Telegram Button' )
					->set_option_value( 'yes' )
					->set_default_value( false )
					->set_help_text( 'Check this box to show telegram button.' ),

					// telegram.
					Field::make( 'text', 'mcw_telegram', 'Staff Telegram' )
					->set_default_value( '@budi_haryono' )
					->set_help_text( 'Please fill in the staff telegram. e,g @budi' ),

					// telegram button text.
					Field::make( 'text', 'mcw_telegram_text', 'Telegram Button Text' )
					->set_default_value( 'Telegram' )
					->set_help_text( 'Please fill in the telegram button text. e,g Telegram' ),

					// checkbox to show telegram icon.
					Field::make( 'checkbox', 'mcw_show_telegram_icon', 'Show Telegram Icon' )
					->set_option_value( 'yes' )
					->set_default_value( true )
					->set_help_text( 'Check this box to show telegram icon.' ),

					Field::make( 'separator', 'custombtn', 'Custom Button' )
					->set_classes( 'mcwsep' ),

					// checkbox to show custom button.
					Field::make( 'checkbox', 'mcw_show_custom', 'Show Custom Button' )
					->set_option_value( 'yes' )
					->set_default_value( false )
					->set_help_text( 'If you dont want show whatsapp, call, email, telegram you can add your button. Then check this box to show custom button.' ),

					Field::make( 'complex', 'mcw_custom_button', 'Custom Button' )
					->add_fields(
						array(
							// button name.
							Field::make( 'text', 'mcw_custom_button_name', 'Button Name' )
							->set_required( true )
							->set_default_value( 'WeChat' )
							->set_help_text( 'Please fill in the button name. e,g WeChat' ),

							// button url.
							Field::make( 'text', 'mcw_custom_button_url', 'Button URL' )
							->set_required( true )
							->set_help_text( 'Please fill in the button URL. e,g https://domain.com' ),

							// button text.
							Field::make( 'text', 'mcw_custom_button_text', 'Button Text' )
							->set_required( true )
							->set_default_value( 'Chat' )
							->set_help_text( 'Please fill in the button text. e,g Chat' ),

							// button icon.
							Field::make( 'text', 'mcw_custom_button_icon', 'Icon' )
							->set_default_value( 'fa fa-whatsapp' )
							->set_help_text( 'Please fill in the button icon. e,g fa fa-whatsapp or leave it blank if you dont want to show icon' ),

						)
					)
					->set_header_template(
						'
                        <% if (mcw_custom_button_name) { %>
                            <%- mcw_custom_button_name %>
                        <% } else { %>
                            Name
                        <% } %>
                    '
					),

				)
			)
			->set_header_template(
				'
                <% if (mcw_name) { %>
                    <%- mcw_name %>
                <% } else { %>
                    Name
                <% } %>
            '
			),
		)
	);
}
add_action( 'carbon_fields_register_fields', 'mcw_register_fields' );
