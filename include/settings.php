<?php

class SocialMediaFloatingButtons {
	private $social_media_floating_buttons_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'social_media_floating_buttons_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'social_media_floating_buttons_page_init' ) );
	}

	public function social_media_floating_buttons_add_plugin_page() {
		add_menu_page(
			'Social Media Floating Buttons', // page_title
			'Social Media Floating Buttons', // menu_title
			'manage_options', // capability
			'social-media-floating-buttons', // menu_slug
			array( $this, 'social_media_floating_buttons_create_admin_page' ), // function
			'dashicons-format-chat', // icon_url
			60 // position
		);
	}

	public function social_media_floating_buttons_create_admin_page() {
		$this->social_media_floating_buttons_options = get_option( 'social_media_floating_buttons_option_name' ); ?>

		<div class="wrap">
			<h2>Vegnux Social Networks Floating Buttons</h2>
			<p>Simple Plugin with someone commons social networks float buttons for your wordpress site. Leave the field empty for none.</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'social_media_floating_buttons_option_group' );
					do_settings_sections( 'social-media-floating-buttons-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function social_media_floating_buttons_page_init() {
		register_setting(
			'social_media_floating_buttons_option_group', // option_group
			'social_media_floating_buttons_option_name', // option_name
			array( $this, 'social_media_floating_buttons_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'social_media_floating_buttons_setting_section', // id
			'Settings', // title
			array( $this, 'social_media_floating_buttons_section_info' ), // callback
			'social-media-floating-buttons-admin' // page
		);

		add_settings_field(
			'enable_disable_0', // id
			'Enable/disable', // title
			array( $this, 'enable_disable_0_callback' ), // callback
			'social-media-floating-buttons-admin', // page
			'social_media_floating_buttons_setting_section' // section
		);

		add_settings_field(
			'facebook_url_1', // id
			'Facebook URL', // title
			array( $this, 'facebook_url_1_callback' ), // callback
			'social-media-floating-buttons-admin', // page
			'social_media_floating_buttons_setting_section' // section
		);

		add_settings_field(
			'instagram_url_2', // id
			'Instagram URL', // title
			array( $this, 'instagram_url_2_callback' ), // callback
			'social-media-floating-buttons-admin', // page
			'social_media_floating_buttons_setting_section' // section
		);

		add_settings_field(
			'twitter_url_3', // id
			'Twitter URL', // title
			array( $this, 'twitter_url_3_callback' ), // callback
			'social-media-floating-buttons-admin', // page
			'social_media_floating_buttons_setting_section' // section
		);

		add_settings_field(
			'linkedin_url_4', // id
			'Linkedin URL', // title
			array( $this, 'linkedin_url_4_callback' ), // callback
			'social-media-floating-buttons-admin', // page
			'social_media_floating_buttons_setting_section' // section
		);

		add_settings_field(
			'youtube_url_5', // id
			'Youtube URL', // title
			array( $this, 'youtube_url_5_callback' ), // callback
			'social-media-floating-buttons-admin', // page
			'social_media_floating_buttons_setting_section' // section
		);

		add_settings_field(
			'whatsapp_number_6', // id
			'Whatsapp URL', // title
			array( $this, 'whatsapp_number_6_callback' ), // callback
			'social-media-floating-buttons-admin', // page
			'social_media_floating_buttons_setting_section' // section
		);

		add_settings_field(
			'whatsapp_message_optional_7', // id
			'Whatsapp Message (optional)', // title
			array( $this, 'whatsapp_message_optional_7_callback' ), // callback
			'social-media-floating-buttons-admin', // page
			'social_media_floating_buttons_setting_section' // section
		);
	}

	public function social_media_floating_buttons_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['enable_disable_0'] ) ) {
			$sanitary_values['enable_disable_0'] = $input['enable_disable_0'];
		}

		if ( isset( $input['facebook_url_1'] ) ) {
			$sanitary_values['facebook_url_1'] = sanitize_text_field( $input['facebook_url_1'] );
		}

		if ( isset( $input['instagram_url_2'] ) ) {
			$sanitary_values['instagram_url_2'] = sanitize_text_field( $input['instagram_url_2'] );
		}

		if ( isset( $input['twitter_url_3'] ) ) {
			$sanitary_values['twitter_url_3'] = sanitize_text_field( $input['twitter_url_3'] );
		}

		if ( isset( $input['linkedin_url_4'] ) ) {
			$sanitary_values['linkedin_url_4'] = sanitize_text_field( $input['linkedin_url_4'] );
		}

		if ( isset( $input['youtube_url_5'] ) ) {
			$sanitary_values['youtube_url_5'] = sanitize_text_field( $input['youtube_url_5'] );
		}

		if ( isset( $input['whatsapp_number_6'] ) ) {
			$sanitary_values['whatsapp_number_6'] = sanitize_text_field( $input['whatsapp_number_6'] );
		}

		if ( isset( $input['whatsapp_message_optional_7'] ) ) {
			$sanitary_values['whatsapp_message_optional_7'] = sanitize_text_field( $input['whatsapp_message_optional_7'] );
		}

		return $sanitary_values;
	}

	public function social_media_floating_buttons_section_info() {
		
	}

	public function enable_disable_0_callback() {
		?> <select name="social_media_floating_buttons_option_name[enable_disable_0]" id="enable_disable_0">
			<?php $selected = (isset( $this->social_media_floating_buttons_options['enable_disable_0'] ) && $this->social_media_floating_buttons_options['enable_disable_0'] === 'yes') ? 'selected' : '' ; ?>
			<option value="yes" <?php echo $selected; ?>>Enable</option>
			<?php $selected = (isset( $this->social_media_floating_buttons_options['enable_disable_0'] ) && $this->social_media_floating_buttons_options['enable_disable_0'] === 'no') ? 'selected' : '' ; ?>
			<option value="no" <?php echo $selected; ?>>Disable</option>
		</select> <?php
	}

	public function facebook_url_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="social_media_floating_buttons_option_name[facebook_url_1]" id="facebook_url_1" placeholder="https://facebook.com/username" value="%s">',
			isset( $this->social_media_floating_buttons_options['facebook_url_1'] ) ? esc_attr( $this->social_media_floating_buttons_options['facebook_url_1']) : ''
		);
	}

	public function instagram_url_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="social_media_floating_buttons_option_name[instagram_url_2]" id="instagram_url_2" placeholder="https://instagram.com/username" value="%s">',
			isset( $this->social_media_floating_buttons_options['instagram_url_2'] ) ? esc_attr( $this->social_media_floating_buttons_options['instagram_url_2']) : ''
		);
	}

	public function twitter_url_3_callback() {
		printf(
			'<input class="regular-text" type="text" name="social_media_floating_buttons_option_name[twitter_url_3]" id="twitter_url_3"  placeholder="https://twitter.com/username" value="%s">',
			isset( $this->social_media_floating_buttons_options['twitter_url_3'] ) ? esc_attr( $this->social_media_floating_buttons_options['twitter_url_3']) : ''
		);
	}

	public function linkedin_url_4_callback() {
		printf(
			'<input class="regular-text" type="text" name="social_media_floating_buttons_option_name[linkedin_url_4]" id="linkedin_url_4"  placeholder="https://linkedin.com/username" value="%s">',
			isset( $this->social_media_floating_buttons_options['linkedin_url_4'] ) ? esc_attr( $this->social_media_floating_buttons_options['linkedin_url_4']) : ''
		);
	}

	public function youtube_url_5_callback() {
		printf(
			'<input class="regular-text" type="text" name="social_media_floating_buttons_option_name[youtube_url_5]" id="youtube_url_5"  placeholder="https://youtube.com/username" value="%s">',
			isset( $this->social_media_floating_buttons_options['youtube_url_5'] ) ? esc_attr( $this->social_media_floating_buttons_options['youtube_url_5']) : ''
		);
	}

	public function whatsapp_number_6_callback() {
		printf(
			'<input class="regular-text" type="text" name="social_media_floating_buttons_option_name[whatsapp_number_6]" id="whatsapp_number_6" placeholder="https://wa.me/10000000000" value="%s">',
			isset( $this->social_media_floating_buttons_options['whatsapp_number_6'] ) ? esc_attr( $this->social_media_floating_buttons_options['whatsapp_number_6']) : ''
		);
	}

	public function whatsapp_message_optional_7_callback() {
		printf(
			'<input class="regular-text" type="text" name="social_media_floating_buttons_option_name[whatsapp_message_optional_7]" id="whatsapp_message_optional_7"  placeholder="?text=Your message" value="%s">',
			isset( $this->social_media_floating_buttons_options['whatsapp_message_optional_7'] ) ? esc_attr( $this->social_media_floating_buttons_options['whatsapp_message_optional_7']) : ''
		);
	}

}
if ( is_admin() )
	$social_media_floating_buttons = new SocialMediaFloatingButtons();

/* 
 * Retrieve this value with:
 * $social_media_floating_buttons_options = get_option( 'social_media_floating_buttons_option_name' ); // Array of All Options
 * $enable_disable_0 = $social_media_floating_buttons_options['enable_disable_0']; // Enable/disable
 * $facebook_url_1 = $social_media_floating_buttons_options['facebook_url_1']; // Facebook URL
 * $instagram_url_2 = $social_media_floating_buttons_options['instagram_url_2']; // Instagram URL
 * $twitter_url_3 = $social_media_floating_buttons_options['twitter_url_3']; // Twitter URL
 * $linkedin_url_4 = $social_media_floating_buttons_options['linkedin_url_4']; // Linkedin URL
 * $youtube_url_5 = $social_media_floating_buttons_options['youtube_url_5']; // Youtube URL
 * $whatsapp_number_6 = $social_media_floating_buttons_options['whatsapp_number_6']; // Whatsapp Number
 * $whatsapp_message_optional_7 = $social_media_floating_buttons_options['whatsapp_message_optional_7']; // Whatsapp Message (optional)
 */
