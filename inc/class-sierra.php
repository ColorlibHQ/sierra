<?php
/**
 * Sierra Theme Framework
 *
 * @package Sierra
 * @since   1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class Sierra
 */
class Sierra {
	/**
	 * @var bool
	 */
	public $top_bar = false;

	/**
	 * Sierra constructor.
	 *
	 * Theme specific actions and filters
	 *
	 * @param array $theme
	 */
	public function __construct( $theme = array() ) {
		$this->theme = $theme;

		$theme = wp_get_theme();
		$arr   = array(
			'theme-name'    => $theme->get( 'Name' ),
			'theme-slug'    => $theme->get( 'TextDomain' ),
			'theme-version' => $theme->get( 'Version' ),
		);

		$this->theme = wp_parse_args( $this->theme, $arr );
		/**
		 * If PHP Version is older than 5.3, we switch back to default theme
		 */
		add_action( 'admin_init', array( $this, 'php_version_check' ) );

		/**
		 * Add a notice for the MachoThemes feedback
		 */
		add_action( 'admin_init', array( $this, 'add_feedback_notice' ) );
		/**
		 * Enqueue styles and scripts
		 */
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueues' ) );
		/**
		 * Customizer enqueues & controls
		 */
		add_action( 'customize_register', array( $this, 'customize_register_init' ) );

		/**
		 * Init epsilon dashboard
		 */
		add_filter( 'epsilon-dashboard-setup', array( $this, 'epsilon_dashboard' ) );
		add_filter( 'epsilon-onboarding-setup', array( $this, 'epsilon_onboarding' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'customizer_styles' ), 99 );
		/**
		 * Grab all class methods and initiate automatically
		 */
		$methods = get_class_methods( 'Sierra' );
		foreach ( $methods as $method ) {
			if ( false !== strpos( $method, 'init_' ) ) {
				$this->$method();
			}
		}
	}

	/**
	 * Sierra instance
	 *
	 * @param array $theme
	 *
	 * @return Sierra
	 */
	public static function get_instance( $theme = array() ) {
		static $inst;
		if ( ! $inst ) {
			$inst = new Sierra( $theme );
		}

		return $inst;
	}

	/**
	 * Check PHP Version and switch theme
	 */
	public function php_version_check() {
		if ( version_compare( PHP_VERSION, '5.3.0' ) >= 0 ) {
			return true;
		}

		switch_theme( WP_DEFAULT_THEME );

		return false;
	}

	/**
	 * Adds a feedback notice if conditions are met
	 */
	public function add_feedback_notice() {
		if ( get_user_meta( get_current_user_id(), 'notification_feedback', true ) ) {
			return;
		}

		$page_on_front = 'page' == get_option( 'show_on_front' ) ? true : false;
		$id            = absint( get_option( 'page_on_front', 0 ) );

		if ( $page_on_front && 0 !== $id ) {
			$revisions = wp_get_post_revisions( $id );

			if ( count( $revisions ) > 3 ) {
				/**
				 * Revision keys are ID's, and it's not incremental
				 */
				$first = end( $revisions );

				$revision_time = new DateTime( $first->post_modified );
				$today         = new DateTime( 'today' );
				$interval      = $today->diff( $revision_time )->format( '%d' );

				if ( 2 <= absint( $interval ) ) {
					$this->_notify_feedback();
				}
			}
		}
	}

	/**
	 * Notify of feedback
	 */
	private function _notify_feedback() {
		if ( ! class_exists( 'Epsilon_Notifications' ) ) {
			return;
		}
		$html = '<p>';
		$html .=
			vsprintf(
			// Translators: 1 is Theme Name, 2 is opening Anchor, 3 is closing.
				__( 'We\'ve been working hard on making %1$s the best one out there. We\'re interested in hearing your thoughts about %1$s and what we could do to make it even better. %2$sSend your feedback our way%3$s.', 'sierra' ),
				array(
					'Sierra',
					'<a target="_blank" href="https://bit.ly/feedback-sierra">',
					'</a>',
				)
			);

		$notifications = Epsilon_Notifications::get_instance();
		$notifications->add_notice(
			array(
				'id'      => 'sierra_notification_feedback',
				'type'    => 'notice epsilon-big',
				'message' => $html,
			)
		);
	}

	/**
	 * Initiate the epsilon framework
	 */
	public function init_epsilon() {
		new Epsilon_Framework();

		$this->start_typography_controls();
		$this->start_color_schemes();
	}

	/**
	 *
	 */
	public function init_nav_menus() {
		//new Epsilon_Section_Navigation_Menu( 'sierra_frontpage_sections_' );
	}

	/**
	 * Initiate the setting helper
	 */
	public function customize_register_init() {
		new Sierra_Customizer();
	}

	/**
	 * Customizer styles ( from repeater )
	 */
	public function customizer_styles() {
		//new Epsilon_Section_Styling( 'sierra-main', 'sierra_frontpage_sections_', Sierra_Repeatable_Sections::get_instance() );
	}

	/**
	 * Set color scheme controls
	 */
	 
	public function get_color_scheme() {
		
		return 	array(
				'epsilon_general_separator' => array(
					'label'     => esc_html__( 'Accent Colors', 'sierra' ),
					'section'   => 'colors',
					'separator' => true,
				),

				'epsilon_accent_color' => array(
					'label'       => esc_html__( 'Accent Color #1', 'sierra' ),
					'description' => esc_html__( 'Theme main color.', 'sierra' ),
					'default'     => '#7699F5',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_accent_color_second' => array(
					'label'       => esc_html__( 'Accent Color #2', 'sierra' ),
					'description' => esc_html__( 'The second main color.', 'sierra' ),
					'default'     => '#B2AADB',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_text_separator' => array(
					'label'     => esc_html__( 'Typography Colors', 'sierra' ),
					'section'   => 'colors',
					'separator' => true,
				),
				
				'epsilon_title_color' => array(
					'label'       => esc_html__( 'Title Color', 'sierra' ),
					'description' => esc_html__( 'The color used for titles.', 'sierra' ),
					'default'     => '#0b1033',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_subtitle_color' => array(
					'label'       => esc_html__( 'Subtitle Color', 'sierra' ),
					'description' => esc_html__( 'The color used for subtitle.', 'sierra' ),
					'default'     => '#7c8d93',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_text_color' => array(
					'label'       => esc_html__( 'Text Color', 'sierra' ),
					'description' => esc_html__( 'The color used for paragraphs.', 'sierra' ),
					'default'     => '#7c8d93',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_link_color' => array(
					'label'       => esc_html__( 'Link Color', 'sierra' ),
					'description' => esc_html__( 'The color used for links.', 'sierra' ),
					'default'     => '#fff',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_link_hover_color' => array(
					'label'       => esc_html__( 'Link Hover Color', 'sierra' ),
					'description' => esc_html__( 'The color used for hovered links.', 'sierra' ),
					'default'     => '#fff',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_link_active_color' => array(
					'label'       => esc_html__( 'Link Active Color', 'sierra' ),
					'description' => esc_html__( 'The color used for active links.', 'sierra' ),
					'default'     => '#333333',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_menu_separator' => array(
					'label'     => esc_html__( 'Navigation Colors', 'sierra' ),
					'section'   => 'colors',
					'separator' => true,
				),

				'epsilon_header_background' => array(
					'label'       => esc_html__( 'Header background color', 'sierra' ),
					'description' => esc_html__( 'The color used for the header background.', 'sierra' ),
					'default'     => '#151C1F',
					'section'     => 'colors',
					'hover-state' => false,
				),
				
				'epsilon_dropdown_menu_background' => array(
					'label'       => esc_html__( 'Dropdown background', 'sierra' ),
					'description' => esc_html__( 'The color used for the menu background.', 'sierra' ),
					'default'     => '#171717',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_dropdown_menu_hover_background' => array(
					'label'       => esc_html__( 'Dropdown Hover background', 'sierra' ),
					'description' => esc_html__( 'The color used for the menu hover background.', 'sierra' ),
					'default'     => '#940534',
					'section'     => 'colors',
					'hover-state' => false,
				),
				
				'epsilon_menu_item_color' => array(
					'label'       => esc_html__( 'Menu item color', 'sierra' ),
					'description' => esc_html__( 'The color used for the menu item color.', 'sierra' ),
					'default'     => '#fff',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_menu_item_hover_color' => array(
					'label'       => esc_html__( 'Menu item hover color', 'sierra' ),
					'description' => esc_html__( 'The color used for the menu item hover color.', 'sierra' ),
					'default'     => '#171717',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_menu_item_active_color' => array(
					'label'       => esc_html__( 'Menu item active color', 'sierra' ),
					'description' => esc_html__( 'The color used for the menu item active color.', 'sierra' ),
					'default'     => '#171717',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_footer_separator' => array(
					'label'     => esc_html__( 'Footer Colors', 'sierra' ),
					'section'   => 'colors',
					'separator' => true,
				),

				'epsilon_footer_contact_background' => array(
					'label'       => esc_html__( 'Contact Background Color', 'sierra' ),
					'description' => esc_html__( 'The color used for the footer contact background.', 'sierra' ),
					'default'     => '#0377bb',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_footer_background' => array(
					'label'       => esc_html__( 'Background Color', 'sierra' ),
					'description' => esc_html__( 'The color used for the footer background.', 'sierra' ),
					'default'     => '#11173b',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_footer_title_color' => array(
					'label'       => esc_html__( 'Title Color', 'sierra' ),
					'description' => esc_html__( 'The color used for the footer title color.', 'sierra' ),
					'default'     => '#ffffff',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_footer_text_color' => array(
					'label'       => esc_html__( 'Text Color', 'sierra' ),
					'description' => esc_html__( 'The color used for the footer text color.', 'sierra' ),
					'default'     => '#2a2f56',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_footer_link_color' => array(
					'label'       => esc_html__( 'Link Color', 'sierra' ),
					'description' => esc_html__( 'The color used for the footer text color.', 'sierra' ),
					'default'     => '#007bff',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_footer_link_hover_color' => array(
					'label'       => esc_html__( 'Link Hover Color', 'sierra' ),
					'description' => esc_html__( 'The color used for the footer text color.', 'sierra' ),
					'default'     => '#0056b3',
					'section'     => 'colors',
					'hover-state' => false,
				),

				'epsilon_footer_link_active_color' => array(
					'label'       => esc_html__( 'Link Active Color', 'sierra' ),
					'description' => esc_html__( 'The color used for the footer text color.', 'sierra' ),
					'default'     => '#0056b3',
					'section'     => 'colors',
					'hover-state' => false,
				),
			);
	}
	
	/**
	 * Load color scheme controls
	 */
	private function start_color_schemes() {
		$handler = 'sierra-style-overrides';

		$args = array(
			'fields' => $this->get_color_scheme(),
			'css' => Epsilon_Color_Scheme::load_css_overrides( get_template_directory() . '/assets/css/style-overrides.css' ),
		);

		Epsilon_Color_Scheme::get_instance( $handler, $args );
	}

	/**
	 * Loads the typography controls required scripts
	 */
	public function start_typography_controls() {
		/**
		 * Instantiate the Epsilon Typography object
		 */
		$options = array(
			'sierra_typography_headings',
			'sierra_paragraphs_typography',
		);

		$handler = 'theme-style';
		Epsilon_Typography::get_instance( $options, $handler );
	}

	/**
	 * Initiate the welcome screen
	 */
	public function init_dashboard() {
		Epsilon_Dashboard::get_instance(
			array(
				'theme'    => array(
					'download-id' => '212499'
				),
				'tracking' => $this->theme['theme-slug'] . '_tracking_enable',
			)
		);

		$dashboard = Sierra_Dashboard_Setup::get_instance();
		$dashboard->add_admin_notice();

		$upsells = get_option( $this->theme['theme-slug'] . '_theme_upsells', false );
		if ( $upsells ) {
			add_filter( 'epsilon_upsell_control_display', '__return_false' );
		}
	}

	/**
	 * Separate setup from init
	 *
	 * @param array $setup
	 *
	 * @return array
	 */
	public function epsilon_dashboard( $setup = array() ) {
		$dashboard = new Sierra_Dashboard_Setup();

		$setup['actions'] = $dashboard->get_actions();
		$setup['tabs']    = $dashboard->get_tabs( $setup );
		$setup['plugins'] = $dashboard->get_plugins();
		$setup['privacy'] = $dashboard->get_privacy_options();

		$setup['edd'] = $dashboard->get_edd( $setup );

		$tab = get_user_meta( get_current_user_id(), 'epsilon_active_tab', true );

		$setup['activeTab'] = ! empty( $tab ) ? absint( $tab ) : 0;

		return $setup;
	}

	/**
	 * Add steps to onboarding
	 *
	 * @param array $setup
	 *
	 * @return array
	 */
	public function epsilon_onboarding( $setup = array() ) {
		$dashboard = new Sierra_Dashboard_Setup();

		$setup['steps']   = $dashboard->get_steps();
		$setup['plugins'] = $dashboard->get_plugins( true );
		$setup['privacy'] = $dashboard->get_privacy_options();

		return $setup;
	}

	/**
	 * Register Scripts and Styles for the theme
	 */
	public function enqueues() {
		wp_enqueue_style( 'sierra-overrides', get_template_directory_uri() . '/assets/css/overrides.css' );
	}
}
