<?php
/**
 * Sierra Theme Customizer repeatable sections
 *
 * @package Sierra
 * @since   1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class Sierra_Repeatable_Sections
 */
class Sierra_Repeatable_Sections {
	/**
	 * Holds the sections
	 *
	 * @var array
	 */
	public $sections = array();

	/**
	 * Sierra_Repeatable_Sections constructor.
	 */
	public function __construct() {
		$this->collect_sections();
	}

	/** 
	 * Grab an instance of the sections
	 *
	 * @return Sierra_Repeatable_Sections
	 */
	public static function get_instance() {
		static $inst;
		if ( ! $inst ) {
			$inst = new Sierra_Repeatable_Sections();
		}

		return $inst;
	}

	/**
	 * Create the section array
	 */
	public function collect_sections() {
		$methods = get_class_methods( 'Sierra_Repeatable_Sections' );
		foreach ( $methods as $method ) {
			if ( false !== strpos( $method, 'repeatable_' ) ) {
				$section = $this->$method();

				if ( ! empty( $section ) ) {
					$this->sections[ $section['id'] ] = $section;
				}
			}
		}

		$this->sections = apply_filters( 'sierra_section_collection', $this->sections );
	}

	/**
	 * Repeatable slider section
	 *
	 * @return array
	 */
	private function repeatable_slider() {
		return array(
			'id'          => 'slider',
			'title'       => esc_html__( 'Slider Section', 'sierra' ),
			'description' => esc_html__( 'A slider section. It retrieves content from Theme Content / Slides.', 'sierra' ),
			'image'       => esc_url( get_template_directory_uri() . '/assets/img/sections/ewf-icon-section-hero-pt.png' ),
			'fields'      => array(
				'slider_section_image'    => array(
					'label'   => esc_html__( 'Section Image', 'sierra' ),
					'type'    => 'epsilon-image',
					'size'    => 'large',
					'default' => esc_url( get_template_directory_uri() . '/assets/img/home-slider/slider-bg-1.png' ),
				),
				'slider_navigation'        => array(
					'type'            => 'epsilon-customizer-navigation',
					'opensDoubled'    => true,
					'navigateToId'    => 'sierra_slides_section',
					'navigateToLabel' => esc_html__( 'Add Slides &rarr;', 'sierra' ),
				),
				'slider_grouping'          => array(
					'label'       => esc_html__( 'Slides to show', 'sierra' ),
					'description' => esc_html__( 'Only selected items will be shown in the frontend.', 'sierra' ),
					'type'        => 'selectize',
					'multiple'    => true,
					'choices'     => Sierra_Helper::get_group_values_from_meta( 'sierra_slides', 'slides_title' ),
					'default'     => array( 'all' ),
				),
				'slider_repeater_field'    => array(
					'type'    => 'hidden',
					'default' => 'sierra_slides',
				),
				'slider_section_unique_id' => array(
					'label'             => esc_html__( 'Section ID', 'sierra' ),
					'type'              => 'text',
					'sanitize_callback' => 'sanitize_key',
				),
			),
		);
	}

	/**
	 * Repeatable Feature section
	 *
	 * @return array
	 */
	private function repeatable_feature() {
		return array(
			'id'            => 'feature',
			'title'         => esc_html__( 'Feature Section', 'sierra' ),
			'description'   => esc_html__( 'A feature section. It retrieves content from Theme Content / Testimonials.', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/1.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'column-stretch'            => array(
						'default' => 'boxedin',
						'choices' => array( 'boxedcenter', 'boxedin', 'fullwidth', ),
					),
					'row-spacing-top'    => array(
						'default' => 'none',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom' => array(
						'default' => 'none',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'column-group'       => array(
						'default' => 3,
						'choices' => array( 1, 2, 3, 4 ),
					),
					'column-alignment'          => array(
						'default' => 'center',
						'choices' => array( 'left', 'center', 'right', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
					'background-video'         => array(
						'default' => '',
					),
				),
			),
			'fields'        => array(
				'feature_section_image'    => array(
					'label'   => esc_html__( 'Image', 'sierra' ),
					'type'    => 'epsilon-image',
					'size'    => 'original',
					'default' => esc_url( get_template_directory_uri() . '/assets/img/icon/title-icon.png' ),
				),
				'feature_section_title'             => array(
					'label'             => esc_html__( 'Title', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => wp_kses_post( 'We are young but bold' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'feature_section_subtitle'          => array(
					'label'             => esc_html__( 'Subtitle', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => wp_kses_post( 'Discover the features' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'feature_grouping'          => array(
					'label'       => esc_html__( 'Feature to show', 'sierra' ),
					'description' => esc_html__( 'Only selected items will be shown in the frontend.', 'sierra' ),
					'type'        => 'selectize',
					'multiple'    => true,
					'choices'     => Sierra_Helper::get_group_values_from_meta( 'sierra_feature', 'feature_title' ),
					'default'     => array( 'all' ),
				),
				'feature_navigation'        => array(
					'type'            => 'epsilon-customizer-navigation',
					'opensDoubled'    => true,
					'navigateToId'    => 'sierra_feature_section',
					'navigateToLabel' => esc_html__( 'Add Testimonials &rarr;', 'sierra' ),
				),
				'feature_repeater_field'    => array(
					'type'    => 'hidden',
					'default' => 'sierra_feature',
				),
				'feature_section_unique_id' => array(
					'label'             => esc_html__( 'Section ID', 'sierra' ),
					'type'              => 'text',
					'sanitize_callback' => 'sanitize_key',
				),
			),
		);
	}

	/**
	 * Repeatable testimonials section
	 *
	 * @return array
	 */
	private function repeatable_testimonials() {
		return array(
			'id'            => 'testimonials',
			'title'         => esc_html__( 'Testimonials Section', 'sierra' ),
			'description'   => esc_html__( 'A testimonial section. It retrieves content from Theme Content / Testimonials.', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/2.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'row-title-align'           => array(
						'default' => 'left',
						'choices' => array( 'left', 'right', ),
					),
					'column-stretch'            => array(
						'default' => 'boxedin',
						'choices' => array( 'boxedcenter', 'boxedin', 'fullwidth', ),
					),
					'row-spacing-top'    => array(
						'default' => 'md',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom' => array(
						'default' => 'md',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
					'background-video'         => array(
						'default' => '',
					),
				),
			),
			'fields'        => array(
				'testimonial_section_image'    => array(
					'label'   => esc_html__( 'Image', 'sierra' ),
					'type'    => 'epsilon-image',
					'size'    => 'medium',
					'default' => esc_url( get_template_directory_uri() . '/assets/img/icon/title-icon.png' ),
				),
				'testimonials_section_title'             => array(
					'label'             => esc_html__( 'Title', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => wp_kses_post( 'We don’t hide, we stand tall in front of chalenge' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'testimonials_section_subtitle'          => array(
					'label'             => esc_html__( 'Subtitle', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => wp_kses_post( 'Discover the features' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'testimonials_section_text'          => array(
					'label'             => esc_html__( 'Text', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => wp_kses_post( 'Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor.' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'testimonial_section_image_right'    => array(
					'label'   => esc_html__( 'Image', 'sierra' ),
					'type'    => 'epsilon-image',
					'size'    => 'medium',
					'default' => esc_url( get_template_directory_uri() . '/assets/img/iphone4.png' ),
				),
				'testimonials_grouping'          => array(
					'label'       => esc_html__( 'Testimonials to show', 'sierra' ),
					'description' => esc_html__( 'Only selected items will be shown in the frontend.', 'sierra' ),
					'type'        => 'selectize',
					'multiple'    => true,
					'choices'     => Sierra_Helper::get_group_values_from_meta( 'sierra_testimonials', 'testimonial_title' ),
					'default'     => array( 'all' ),
				),
				'testimonials_navigation'        => array(
					'type'            => 'epsilon-customizer-navigation',
					'opensDoubled'    => true,
					'navigateToId'    => 'sierra_testimonial_section',
					'navigateToLabel' => esc_html__( 'Add Testimonials &rarr;', 'sierra' ),
				),
				'testimonials_repeater_field'    => array(
					'type'    => 'hidden',
					'default' => 'sierra_testimonials',
				),
				'testimonials_section_unique_id' => array(
					'label'             => esc_html__( 'Section ID', 'sierra' ),
					'type'              => 'text',
					'sanitize_callback' => 'sanitize_key',
				),
			),
		);
	}

	/**
	 * Repeatable Build section
	 *
	 * @return array
	 */
	private function repeatable_build() {
		return array(
			'id'            => 'build',
			'title'         => esc_html__( 'Build Section', 'sierra' ),
			'description'   => esc_html__( 'Services section. It retrieves content from Theme Content / Services', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/3.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'row-title-align'           => array(
						'default' => 'right',
						'choices' => array( 'right', 'left', ),
					),
					'column-stretch'            => array(
						'default' => 'boxedin',
						'choices' => array( 'boxedcenter', 'boxedin', 'fullwidth', ),
					),
					'row-spacing-top'           => array(
						'default' => 'lg',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom'        => array(
						'default' => 'lg',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'column-vertical-alignment' => array(
						'default' => 'middle',
						'choices' => array( 'top', 'middle', 'bottom', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
					'background-video'         => array(
						'default' => '',
					),
				),
			),
			'fields'        => array(
				'build_section_image'    => array(
					'label'   => esc_html__( 'Image', 'sierra' ),
					'type'    => 'epsilon-image',
					'size'    => 'medium',
					'default' => esc_url( get_template_directory_uri() . '/assets/img/icon/title-icon.png' ),
				),
				'build_section_title'             => array(
					'label'             => esc_html__( 'Title', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => wp_kses_post( 'We build a strong team of great people' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'build_section_subtitle'          => array(
					'label'             => esc_html__( 'Subtitle', 'sierra' ),
					'type'              => 'text',
					'default'           => wp_kses_post( 'Discover the features' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'build_section_text'          => array(
					'label'             => esc_html__( 'Text', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => wp_kses_post( 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra.' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'build_grouping'          => array(
					'label'       => esc_html__( 'Team Item To Show', 'sierra' ),
					'description' => esc_html__( 'Only selected items will be shown in the frontend.', 'sierra' ),
					'type'        => 'selectize',
					'multiple'    => true,
					'choices'     => Sierra_Helper::get_group_values_from_meta( 'sierra_build', 'build_image_title' ),
					'default'     => array( 'all' ),
				),
				'build_navigation'        => array(
					'type'            => 'epsilon-customizer-navigation',
					'opensDoubled'    => true,
					'navigateToId'    => 'sierra_build_section',
					'navigateToLabel' => esc_html__( 'Add Team &rarr;', 'sierra' ),
				),
				'build_repeater_field'    => array(
					'type'    => 'hidden',
					'default' => 'sierra_build',
				),
				'build_section_unique_id' => array(
					'label'             => esc_html__( 'Section ID', 'sierra' ),
					'type'              => 'text',
					'sanitize_callback' => 'sanitize_key',
				),
			),
		);
	}

	/**
	 * Repeatable Contact section
	 *
	 * @return array
	 */
	private function repeatable_contact() {
		return array(
			'id'            => 'contact',
			'title'         => esc_html__( 'Contact Section', 'sierra' ),
			'description'   => esc_html__( 'Services section. It retrieves content from Theme Content / Services', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/4.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'row-title-align'           => array(
						'default' => 'left',
						'choices' => array( 'left', 'right', ),
					),
					'column-stretch'            => array(
						'default' => 'boxedin',
						'choices' => array( 'boxedcenter', 'boxedin', 'fullwidth', ),
					),
					'row-spacing-top'           => array(
						'default' => 'none',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom'        => array(
						'default' => 'none',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
					'background-video'         => array(
						'default' => '',
					),
				),
			),
			'fields'        => array(
				'contact_shortcode'             => array(
					'label'             => esc_html__( 'Shortcode', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'sanitize_callback' => 'wp_kses_post',
				),
				'contact_section_image'    => array(
					'label'   => esc_html__( 'Section Image : ', 'sierra' ),
					'type'    => 'epsilon-image',
					'size'    => 'medium',
					'default' => esc_url( get_template_directory_uri() . '/assets/img/icon/title-icon.png' ),
				),
				'contact_section_title'             => array(
					'label'             => esc_html__( 'Title', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => wp_kses_post( 'We build a strong team of great people' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'contact_section_subtitle'          => array(
					'label'             => esc_html__( 'Subtitle', 'sierra' ),
					'type'              => 'text',
					'default'           => wp_kses_post( 'Discover the features' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'contact_section_text'          => array(
					'label'             => esc_html__( 'Text', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => wp_kses_post( 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra.' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'contact_phone_number'          => array(
					'label'             => esc_html__( 'Phone Number', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => wp_kses_post( '+452373 95593 232' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'contact_section_unique_id' => array(
					'label'             => esc_html__( 'Section ID', 'sierra' ),
					'type'              => 'text',
					'sanitize_callback' => 'sanitize_key',
				),
			),
		);
	}

	/**
	 * Contact map and boxes
	 *
	 * @return array
	 */
	private function repeatable_contact_info() {
		return array(
			'id'            => 'contact_info',
			'title'         => esc_html__( 'Contact Info Section', 'sierra' ),
			'description'   => esc_html__( 'A Google Map section', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/5.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'column-stretch'            => array(
						'default' => 'boxedin',
						'choices' => array( 'boxedcenter', 'boxedin', 'fullwidth', ),
					),
					'row-spacing-top'           => array(
						'default' => 'lg',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom'        => array(
						'default' => 'lg',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
					'background-video'         => array(
						'default' => '',
					),
				),
			),
			'fields'        => array(
				'contact_info_map_image'    => array(
					'label'   => esc_html__( 'Section Image : ', 'sierra' ),
					'type'    => 'epsilon-image',
					'size'    => 'medium',
					'default' => esc_url( get_template_directory_uri() . '/assets/img/world-map.png' ),
				),
				'contact_info_title'             => array(
					'label'             => esc_html__( 'Title', 'sierra' ),
					'type'              => 'text',
					'default'           => esc_html__( 'Gibraltar Office', 'sierra' ),
					'sanitize_callback' => 'sanitize_text_field',
				),
				'contact_info_address'           => array(
					'label'             => esc_html__( 'Address', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => 'Casemates Square, no253 United kingdom',
					'sanitize_callback' => 'wp_kses_post',
				),
				'contact_info_phone'          => array(
					'label'             => esc_html__( 'Phone', 'sierra' ),
					'type'              => 'text',
					'default'           => esc_html__( '+453678 9283 559', 'sierra' ),
					'sanitize_callback' => 'sanitize_text_field',
				),
				'contact_info_email'          => array(
					'label'             => esc_html__( 'Email', 'sierra' ),
					'type'              => 'text',
					'default'           => esc_html__( 'contact@template.com', 'sierra' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'contact_info_section_unique_id' => array(
					'label'             => esc_html__( 'Section ID', 'sierra' ),
					'type'              => 'text',
					'sanitize_callback' => 'sanitize_key',
				),
			)
		);
	}

	/**
	 * Contact map and boxes
	 *
	 * @return array
	 */
	private function repeatable_google_map() {
		return array(
			'id'            => 'google_map',
			'title'         => esc_html__( 'Map Section', 'sierra' ),
			'description'   => esc_html__( 'A Google Map section', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/5.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'row-spacing-top'           => array(
						'default' => 'lg',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom'        => array(
						'default' => 'lg',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
					'background-video'         => array(
						'default' => '',
					),
				),
			),
			'fields'        => array(
				'google_map_lat'          => array(
					'label'             => esc_html__( 'Latitude', 'sierra' ),
					'type'              => 'text',
					'default'           => esc_html__( '40.701083', 'sierra' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'google_map_long'           => array(
					'label'             => esc_html__( 'Longitude', 'sierra' ),
					'type'              => 'text',
					'default'           => '-74.1522848',
					'sanitize_callback' => 'sanitize_text_field',
				),
				'google_map_zoom'              => array(
					'type'    => 'epsilon-slider',
					'label'   => esc_html__( 'Google Map Zoom', 'sierra' ),
					'default' => 13,
					'choices' => array(
						'min'  => 1,
						'max'  => 20,
						'step' => 1,
					),
				),
				'google_map_height'              => array(
					'type'    => 'epsilon-slider',
					'label'   => esc_html__( 'Google Map Height', 'sierra' ),
					'default' => 450,
					'choices' => array(
						'min'  => 120,
						'max'  => 850,
						'step' => 10,
					),
				),
				'google_map_api_key'           => array(
					'type'            => 'epsilon-customizer-navigation',
					'navigateToId'    => 'sierra_misc_section',
					'navigateToLabel' => esc_html__( 'Add Your API Key &rarr;', 'sierra' ),
				),
				'contact_info_title'             => array(
					'label'             => esc_html__( 'Title', 'sierra' ),
					'type'              => 'text',
					'default'           => esc_html__( 'Gibraltar Office', 'sierra' ),
					'sanitize_callback' => 'sanitize_text_field',
				),
				'contact_info_address'           => array(
					'label'             => esc_html__( 'Address', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => 'Casemates Square, no253 United kingdom',
					'sanitize_callback' => 'wp_kses_post',
				),
				'contact_info_phone'          => array(
					'label'             => esc_html__( 'Phone', 'sierra' ),
					'type'              => 'text',
					'default'           => esc_html__( '+453678 9283 559', 'sierra' ),
					'sanitize_callback' => 'sanitize_text_field',
				),
				'contact_info_email'          => array(
					'label'             => esc_html__( 'Email', 'sierra' ),
					'type'              => 'text',
					'default'           => esc_html__( 'contact@template.com', 'sierra' ),
					'sanitize_callback' => 'wp_kses_post',
				),
			)
		);
	}

	/**
	 * Repeatable services section
	 *
	 * @return array
	 */
	private function repeatable_services() {
		return array(
			'id'            => 'services',
			'title'         => esc_html__( 'Services Section', 'sierra' ),
			'description'   => esc_html__( 'Services section. It retrieves content from Theme Content / Services', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/13.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'row-title-align'           => array(
						'default' => 'left',
						'choices' => array( 'left', 'top', 'right', ),
					),
					'column-stretch'            => array(
						'default' => 'boxedin',
						'choices' => array( 'boxedcenter', 'boxedin', 'fullwidth', ),
					),
					'row-spacing-top'           => array(
						'default' => 'md',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom'        => array(
						'default' => 'md',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'column-group'              => array(
						'default' => 3,
						'choices' => array( 2, 3, 4, ),
					),
					'column-alignment'          => array(
						'default' => 'center',
						'choices' => array( 'left', 'center', 'right', ),
					),
					'column-vertical-alignment' => array(
						'default' => 'middle',
						'choices' => array( 'top', 'middle', 'bottom', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
					'background-video'         => array(
						'default' => '',
					),
				),
			),
			'fields'        => array(
				'services_grouping'          => array(
					'label'       => esc_html__( 'Services Item To Show', 'sierra' ),
					'description' => esc_html__( 'Only selected items will be shown in the frontend.', 'sierra' ),
					'type'        => 'selectize',
					'multiple'    => true,
					'choices'     => Sierra_Helper::get_group_values_from_meta( 'sierra_services', 'service_title' ),
					'default'     => array( 'all' ),
				),
				'services_navigation'        => array(
					'type'            => 'epsilon-customizer-navigation',
					'opensDoubled'    => true,
					'navigateToId'    => 'sierra_services_section',
					'navigateToLabel' => esc_html__( 'Add Services &rarr;', 'sierra' ),
				),
				'services_repeater_field'    => array(
					'type'    => 'hidden',
					'default' => 'sierra_services',
				),
				'services_section_unique_id' => array(
					'label'             => esc_html__( 'Section ID', 'sierra' ),
					'type'              => 'text',
					'sanitize_callback' => 'sanitize_key',
				),
			),
		);
	}

	/**
	 * Repeatable progress bars
	 *
	 * @return array
	 */
	private function repeatable_progress() {
		return array(
			'id'            => 'progress',
			'title'         => esc_html__( 'Progress Section', 'sierra' ),
			'description'   => esc_html__( 'A section in which you can add your website counters.', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/10.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'row-title-align'           => array(
						'default' => 'top',
						'choices' => array( 'left', 'top', 'right', ),
					),
					'column-stretch'     => array(
						'default' => 'boxedin',
						'choices' => array( 'boxedcenter', 'boxedin', 'fullwidth', ),
					),
					'row-spacing-top'    => array(
						'default' => 'md',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom' => array(
						'default' => 'md',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'column-group'       => array(
						'default' => 4,
						'choices' => array( 2, 3, 4, ),
					),
					'column-alignment'          => array(
						'default' => 'center',
						'choices' => array( 'left', 'center', 'right', ),
					),
					'column-vertical-alignment' => array(
						'default' => 'top',
						'choices' => array( 'top', 'middle', 'bottom', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
					'background-video'         => array(
						'default' => '',
					),
				),
				'colors'  => array(
					'heading-color' => array(
						'selectors' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.headline span', ),
						'default'   => '',
					),
					'text-color'    => array(
						'selectors' => array( 'p', ),
						'default'   => '',
					),
				),
			),
			'fields'        => array(
				'progress_bars_grouping'       => array(
					'label'       => esc_html__( 'Progress bars to show', 'sierra' ),
					'description' => esc_html__( 'Only selected items will be shown in the frontend.', 'sierra' ),
					'type'        => 'selectize',
					'multiple'    => true,
					'choices'     => Sierra_Helper::get_group_values_from_meta( 'sierra_progress_bars', 'progress_bar_title' ),
					'default'     => array( 'all' ),
				),
				'progress_bars_navigation'     => array(
					'type'            => 'epsilon-customizer-navigation',
					'opensDoubled'    => true,
					'navigateToId'    => 'sierra_progress_section',
					'navigateToLabel' => esc_html__( 'Add Progress Bar Boxes &rarr;', 'sierra' ),
				),
				'progress_bars_repeater_field' => array(
					'type'    => 'hidden',
					'default' => 'sierra_progress_bars',
				),
				'progress_section_unique_id'   => array(
					'label'             => esc_html__( 'Section ID', 'sierra' ),
					'type'              => 'text',
					'sanitize_callback' => 'sanitize_key',
				),
			),
		);
	}

	/**
	 * Repeatable expertise section
	 *
	 * @return array
	 */
	private function repeatable_solutions() {
		return array(
			'id'            => 'solutions',
			'title'         => esc_html__( 'Solutions Section', 'sierra' ),
			'description'   => esc_html__( 'Solutions section. It retrieves content from Theme Content / Portfolio', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/8.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'row-title-align'           => array(
						'default' => 'left',
						'choices' => array( 'left', 'right' ),
					),
					'column-stretch'            => array(
						'default' => 'boxedin',
						'choices' => array( 'boxedcenter', 'boxedin', 'fullwidth', ),
					),
					'row-spacing-top'           => array(
						'default' => 'md',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom'        => array(
						'default' => 'md',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'column-alignment'          => array(
						'default' => 'left',
						'choices' => array( 'left', 'center', 'right', ),
					),
					'column-vertical-alignment' => array(
						'default' => 'middle',
						'choices' => array( 'top', 'middle', 'bottom', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
					'background-video'         => array(
						'default' => '',
					),
				),
				'colors'  => array(
					'heading-color' => array(
						'selectors' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.headline span', ),
						'default'   => '',
					),
					'text-color'    => array(
						'selectors' => array( 'p', ),
						'default'   => '',
					),
				),
			),
			'fields'        => array(
				'Solution_section_image'             => array(
					'label'   => esc_html__( 'Section Image', 'sierra' ),
					'type'    => 'epsilon-image',
					'size'    => 'original',
					'default' => esc_url( get_template_directory_uri() . '/assets/img/icon/title-icon.png' ),
				),
				'solution_section_title'             => array(
					'label'             => esc_html__( 'Title', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => esc_html__( 'Simple solutions for complicated times', 'sierra' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'solution_section_subtitle'          => array(
					'label'             => esc_html__( 'Subtitle', 'sierra' ),
					'type'              => 'text',
					'default'           => esc_html__( 'Discover the features', 'sierra' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'solution_section_content'          => array(
					'label'             => esc_html__( 'Text', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => wp_kses_post( 'Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra a eget nisi. Aenean pellentesque elit vitae eros dignissim ultrices.' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'solution_grouping'          => array(
					'label'       => esc_html__( 'Expertise to show', 'sierra' ),
					'description' => esc_html__( 'Only selected items will be shown in the frontend.', 'sierra' ),
					'type'        => 'selectize',
					'multiple'    => true,
					'choices'     => Sierra_Helper::get_group_values_from_meta( 'sierra_solutions', 'solution_title' ),
					'default'     => array( 'all' ),
				),
				'solution_navigation'        => array(
					'type'            => 'epsilon-customizer-navigation',
					'opensDoubled'    => true,
					'navigateToId'    => 'sierra_solutions_section',
					'navigateToLabel' => esc_html__( 'Add Expertise &rarr;', 'sierra' ),
				),
				'solution_repeater_field'    => array(
					'type'    => 'hidden',
					'default' => 'sierra_solutions',
				),
				'solution_section_unique_id' => array(
					'label'             => esc_html__( 'Section ID', 'sierra' ),
					'type'              => 'text',
					'sanitize_callback' => 'sanitize_key',
				),
			),
		);
	}

	/**
	 * Repeatable about section
	 *
	 * @return array
	 */
	private function repeatable_about() {
		return array(
			'id'            => 'about',
			'title'         => esc_html__( 'About Section', 'sierra' ),
			'description'   => esc_html__( 'About section. It retrieves content from Theme Content / Services', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/6.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'row-title-align'           => array(
						'default' => 'left',
						'choices' => array( 'left', 'right', ),
					),
					'column-stretch'            => array(
						'default' => 'boxedin',
						'choices' => array( 'boxedcenter', 'boxedin', 'fullwidth', ),
					),
					'row-spacing-top'           => array(
						'default' => 'none',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom'        => array(
						'default' => 'none',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
					'background-video'         => array(
						'default' => '',
					),
				),
			),
			'fields'        => array(
				'about_section_image'             => array(
					'label'   => esc_html__( 'Section Image', 'sierra' ),
					'type'    => 'epsilon-image',
					'size'    => 'large',
					'default' => esc_url( get_template_directory_uri() . '/assets/img/icon/title-icon.png' ),
				),
				'about_section_title'             => array(
					'label'             => esc_html__( 'Section Title', 'sierra' ),
					'type'              => 'text',
					'default'           => esc_html__( 'We don’t hide, we stand tall in front of chalenge', 'sierra' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'about_section_subtitle'          => array(
					'label'             => esc_html__( 'Section Subtitle', 'sierra' ),
					'type'              => 'text',
					'default'           => wp_kses_post( 'Discover the features' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'about_text'              => array(
					'label'             => esc_html__( 'Information', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => esc_html__( 'Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra a eget nisi. Aenean pellentesque elit vitae eros dignissim ultrices.', 'sierra' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'about_image'             => array(
					'label'   => esc_html__( 'Image', 'sierra' ),
					'type'    => 'epsilon-image',
					'size'    => 'large',
					'default' => esc_url( get_template_directory_uri() . '/assets/img/popup-photo.jpg' ),
				),
				'about_youtube_link'          => array(
					'label'             => esc_html__( 'Video Link', 'sierra' ),
					'type'              => 'text',
					'default'           => wp_kses_post( 'https://www.youtube.com/watch?v=62QYQE6k7tg' ),
					'sanitize_callback' => 'wp_kses_post',
				),
			),
		);
	}

	/**
	 * Repeatable testimonials section
	 *
	 * @return array
	 */
	private function repeatable_about_testimonials() {
		return array(
			'id'            => 'aboutTestimonials',
			'title'         => esc_html__( 'About Testimonial Section', 'sierra' ),
			'description'   => esc_html__( 'A testimonial section. It retrieves content from Theme Content / Testimonials.', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/7.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'row-spacing-top'    => array(
						'default' => 'none',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom' => array(
						'default' => 'none',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
					'background-video'         => array(
						'default' => '',
					),
				),
			),
			'fields'        => array(
				'testimonial_section_image'    => array(
					'label'   => esc_html__( 'Image', 'sierra' ),
					'type'    => 'epsilon-image',
					'size'    => 'medium',
					'default' => esc_url( get_template_directory_uri() . '/assets/img/3d-shap.png' ),
				),
				'testimonials_grouping'          => array(
					'label'       => esc_html__( 'Testimonials to show', 'sierra' ),
					'description' => esc_html__( 'Only selected items will be shown in the frontend.', 'sierra' ),
					'type'        => 'selectize',
					'multiple'    => true,
					'choices'     => Sierra_Helper::get_group_values_from_meta( 'sierra_testimonials', 'testimonial_title' ),
					'default'     => array( 'all' ),
				),
				'testimonials_navigation'        => array(
					'type'            => 'epsilon-customizer-navigation',
					'opensDoubled'    => true,
					'navigateToId'    => 'sierra_testimonial_section',
					'navigateToLabel' => esc_html__( 'Add Testimonials &rarr;', 'sierra' ),
				),
				'testimonials_repeater_field'    => array(
					'type'    => 'hidden',
					'default' => 'sierra_testimonials',
				),
				'testimonials_section_unique_id' => array(
					'label'             => esc_html__( 'Section ID', 'sierra' ),
					'type'              => 'text',
					'sanitize_callback' => 'sanitize_key',
				),
			),
		);
	}

	/**
	 * Repeatable skill section
	 */
	private function repeatable_skill(){
		return array(
			'id'            => 'skill',
			'title'         => esc_html__( 'About Skill Section', 'sierra' ),
			'description'   => esc_html__( 'A skill section. It retrieves content from Theme Content / Testimonials.', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/8.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'row-title-align'           => array(
						'default' => 'left',
						'choices' => array( 'left', 'right', ),
					),
					'column-stretch'            => array(
						'default' => 'boxedin',
						'choices' => array( 'boxedcenter', 'boxedin', 'fullwidth', ),
					),
					'row-spacing-top'    => array(
						'default' => 'lg',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom' => array(
						'default' => 'lg',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
					'background-video'         => array(
						'default' => '',
					),
				),
			),
			'fields'        => array(
				'skill_section_image'    => array(
					'label'   => esc_html__( 'Image', 'sierra' ),
					'type'    => 'epsilon-image',
					'size'    => 'medium',
					'default' => esc_url( get_template_directory_uri() . '/assets/img/icon/title-icon.png' ),
				),
				'skill_section_title'             => array(
					'label'             => esc_html__( 'Section Title', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => esc_html__( 'We are a Gibraltar based Company', 'sierra' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'skill_section_subtitle'          => array(
					'label'             => esc_html__( 'Section Subtitle', 'sierra' ),
					'type'              => 'text',
					'default'           => wp_kses_post( 'Discover the features' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'skill_text'              => array(
					'label'             => esc_html__( 'Text', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => esc_html__( 'Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra a eget nisi. Aenean pellentesque elit vitae eros dignissim ultrices.', 'sierra' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'skill_group_text'              => array(
					'label'             => esc_html__( 'Skill Text', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'default'           => esc_html__( 'Etiam nec odio vestibulum est mattis effic iturut magna. Pellente sque sit am et tellus blandit. Etiam nec odio vestibul.', 'sierra' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'skill_grouping'          => array(
					'label'       => esc_html__( 'Skill to show', 'sierra' ),
					'description' => esc_html__( 'Only selected items will be shown in the frontend.', 'sierra' ),
					'type'        => 'selectize',
					'multiple'    => true,
					'choices'     => Sierra_Helper::get_group_values_from_meta( 'sierra_skill', 'skill_title' ),
					'default'     => array( 'all' ),
				),
				'skill_navigation'        => array(
					'type'            => 'epsilon-customizer-navigation',
					'opensDoubled'    => true,
					'navigateToId'    => 'sierra_skill_section',
					'navigateToLabel' => esc_html__( 'Add Skill &rarr;', 'sierra' ),
				),
				'skill_repeater_field'    => array(
					'type'    => 'hidden',
					'default' => 'sierra_skill',
				),
				'skill_section_unique_id' => array(
					'label'             => esc_html__( 'Section ID', 'sierra' ),
					'type'              => 'text',
					'sanitize_callback' => 'sanitize_key',
				),
			),
		);
	}

	/**
	 * Repeatable call to action section
	 *
	 * @return array
	 */
	private function repeatable_cta() {
		return array(
			'id'            => 'cta',
			'title'         => esc_html__( 'CTA Section', 'sierra' ),
			'description'   => esc_html__( 'Call to action section. It retrieves content from Theme Content / Services', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/9.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'column-stretch'            => array(
						'default' => 'boxedin',
						'choices' => array( 'boxedcenter', 'boxedin', 'fullwidth', ),
					),
					'row-spacing-top'           => array(
						'default' => 'lg',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom'        => array(
						'default' => 'lg',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'column-alignment'          => array(
						'default' => 'center',
						'choices' => array( 'left', 'center', 'right', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
					'background-video'         => array(
						'default' => '',
					),
				),
			),
			'fields'        => array(
				'cta_title'             => array(
					'label'             => esc_html__( 'Section Title', 'sierra' ),
					'type'              => 'text',
					'default'           => esc_html__( 'Are you ready to talk?', 'sierra' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'cta_email'          => array(
					'label'             => esc_html__( 'Email', 'sierra' ),
					'type'              => 'text',
					'default'           => wp_kses_post( 'contact@sierracompany.com' ),
					'sanitize_callback' => 'wp_kses_post',
				),
			),
		);
	}

	/**
	 * Repeatable portfolio section
	 *
	 * @return array
	 */
	private function repeatable_portfolio() {
		return array(
			'id'            => 'portfolio',
			'title'         => esc_html__( 'Portfolio Section', 'sierra' ),
			'description'   => esc_html__( 'Portfolio section. It retrieves content from Theme Content / Portfolio', 'sierra' ),
			'image'         => esc_url( get_template_directory_uri() . '/assets/img/sections/12.png' ),
			'customization' => array(
				'enabled' => true,
				'layout'  => array(
					'column-stretch'     => array(
						'default' => 'fullwidth',
						'choices' => array( 'boxedcenter', 'boxedin', 'fullwidth', ),
					),
					'row-spacing-top'    => array(
						'default' => 'md',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
					'row-spacing-bottom' => array(
						'default' => 'none',
						'choices' => array( 'lg', 'md', 'sm', 'none', ),
					),
				),
				'styling' => array(
					'background-color'         => array(
						'default' => false,
					),
					'background-color-opacity' => array(
						'default' => 1,
					),
					'background-image'         => array(
						'default' => false,
					),
					'background-position'      => array(
						'default' => 'center',
					),
					'background-size'          => array(
						'default' => 'initial',
					),
					'background-repeat'        => array(
						'default' => 'repeat'
					),
					'background-parallax'      => array(
						'default' => false,
					),
				),
				'colors'  => array(
					'heading-color' => array(
						'selectors' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.headline span', ),
						'default'   => '',
					),
					'text-color'    => array(
						'selectors' => array( 'p', ),
						'default'   => '',
					),
				),
			),
			'fields'        => array(
				'portfolio_shorecode'          => array(
					'label'             => esc_html__( 'Portfolio Shortcode', 'sierra' ),
					'type'              => 'epsilon-text-editor',
					'sanitize_callback' => 'wp_kses_post',
				),
				'portfolio_section_unique_id' => array(
					'label'             => esc_html__( 'Section ID', 'sierra' ),
					'type'              => 'text',
					'sanitize_callback' => 'sanitize_key',
				),
			),
		);
	}
}
