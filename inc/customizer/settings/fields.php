<?php
/**
 * Sierra Theme Customizer Fields
 *
 * @package Sierra
 * @since   1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register customizer fields
 */

/**
 * Layout section options
 */
Epsilon_Customizer::add_field(
	'sierra_layout',
	array(
		'type'     => 'epsilon-layouts',
		'section'  => 'sierra_layout_section',
		'layouts'  => array(
			1 => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
			2 => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/two-column.png',
		),
		'default'  => array(
			'columnsCount' => 2,
			'columns'      => array(
				1 => array(
					'index' => 1,
					'span'  => 8,
				),
				2 => array(
					'index' => 2,
					'span'  => 4,
				),
			),
		),
		'min_span' => 4,
		'fixed'    => true,
		'label'    => esc_html__( 'Blog Layout', 'sierra' ),
	)
);
Epsilon_Customizer::add_field(
	'sierra_page_layout',
	array(
		'type'     => 'epsilon-layouts',
		'section'  => 'sierra_layout_section',
		'layouts'  => array(
			1 => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
			2 => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/two-column.png',
		),
		'default'  => array(
			'columnsCount' => 2,
			'columns'      => array(
				1 => array(
					'index' => 1,
					'span'  => 8,
				),
				2 => array(
					'index' => 2,
					'span'  => 4,
				),
			),
		),
		'min_span' => 4,
		'fixed'    => true,
		'label'    => esc_html__( 'Page Layout', 'sierra' ),
	)
);
/**
 * Typography section options
 */
Epsilon_Customizer::add_field(
	'sierra_typography_headings',
	array(
		'type'          => 'epsilon-typography',
		'transport'     => 'postMessage',
		'label'         => esc_html__( 'Headings', 'sierra' ),
		'section'       => 'sierra_layout_section',
		'description'   => esc_html__( 'Note: Current typography controls will only be affecting the blog.', 'sierra' ),
		'stylesheet'    => 'theme-style',
		'choices'       => array(
			'font-family',
			'font-weight',
			'font-style',
			'letter-spacing',
		),
		'selectors'     => array(
			'.post-title',
			'.post-content h1',
			'.post-content h2',
			'.post-content h3',
			'.post-content h4',
			'.post-content h5',
			'.post-content h6',
			'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
			'.c_title h2',
			'.slider_text_box p',
			'.feature_item h4',
			'.l_title h2',
			'.l_title h2',
			'.banner_inner_text h2',
		),
		'font_defaults' => array(
			'letter-spacing' => '0',
			'font-family'    => '',
			'font-weight'    => '',
			'font-style'     => '',
		),
	)
);
Epsilon_Customizer::add_field(
	'sierra_paragraphs_typography',
	array(
		'type'          => 'epsilon-typography',
		'transport'     => 'postMessage',
		'section'       => 'sierra_layout_section',
		'label'         => esc_html__( 'Paragraphs', 'sierra' ),
		'description'   => esc_html__( 'Note: Current typography controls will only be affecting the blog.', 'sierra' ),
		'stylesheet'    => 'theme-style',
		'choices'       => array(
			'font-family',
			'font-weight',
			'font-style',
		),
		'selectors'     => array(
			'.post-content p',
            'p',
			'.feature_item p',
			'.text_3d p',
			'.team_people_text p',
			'.touch_details p',
			'.challange_text_inner p',
			'.testimonials_slider .owl-item.center p',
			'.left_company_text p',
			'.s_solution_item p',
		),
		'font_defaults' => array(
			'font-family' => '',
			'font-weight' => '',
			'font-style'  => '',
		),
	)
);

/**
 * Blog section options
 */
Epsilon_Customizer::add_field(
	'sierra_show_single_post_thumbnail',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Post Meta: Thumbnail in content', 'sierra' ),
		'description' => esc_html__( 'This option will disable the post thumbnail from the beginning of the post content.', 'sierra' ),
		'section'     => 'sierra_blog_section',
		'default'     => true,
	)
);

Epsilon_Customizer::add_field(
	'sierra_show_single_post_date',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Post Meta: Date in content', 'sierra' ),
		'description' => esc_html__( 'This option will disable the post date from the beginning of the post content.', 'sierra' ),
		'section'     => 'sierra_blog_section',
		'default'     => true,
	)
);

Epsilon_Customizer::add_field(
	'sierra_show_single_post_categories',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Post Meta: Categories', 'sierra' ),
		'description' => esc_html__( 'This will disable the category section at the beggining of the post.', 'sierra' ),
		'section'     => 'sierra_blog_section',
		'default'     => true,
	)
);


Epsilon_Customizer::add_field(
	'sierra_enable_author_box',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Post meta: Author', 'sierra' ),
		'description' => esc_html__( 'Toggle the display of the author box, at the left side of the post. Will only display if the author has a description defined.', 'sierra' ),
		'section'     => 'sierra_blog_section',
		'default'     => true,
	)
);

Epsilon_Customizer::add_field(
	'sierra_show_single_post_tags',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Post Meta: Tags', 'sierra' ),
		'description' => esc_html__( 'This will disable the tags zone at the end of the post.', 'sierra' ),
		'section'     => 'sierra_blog_section',
		'default'     => true,
	)
);

/**
 * Footer section options
 */
Epsilon_Customizer::add_field(
	'sierra_footer_bg',
	array(
		'label'   => esc_html__( 'Footer BG', 'sierra' ),
		'type'    => 'epsilon-image',
		'size'    => 'original',
        'sanitize_callback' => 'sanitize_text_field',
		'default-image' => esc_url( get_template_directory_uri() . '/assets/img/footer-bg.jpg' ),
		'section' => 'sierra_footer_section',
	)
);
Epsilon_Customizer::add_field(
	'sierra_footer_columns',
	array(
		'type'     => 'epsilon-layouts',
		'section'  => 'sierra_footer_section',
		'priority' => 0,
		'layouts'  => array(
			1 => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
			2 => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/two-column.png',
			3 => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/three-column.png',
			4 => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/four-column.png',
		),
		'default'  => array(
			'columnsCount' => 3,
			'columns'      => array(
				array(
					'index' => 1,
					'span'  => 3,
				),
				array(
					'index' => 2,
					'span'  => 3,
				),
				array(
					'index' => 3,
					'span'  => 3,
				),
				array(
					'index' => 4,
					'span'  => 3,
				),
			),
		),
		'min_span' => 2,
		'label'    => esc_html__( 'Footer Columns', 'sierra' ),
	)
);
/**
 * Google Api KEY
 */
Epsilon_Customizer::add_field(
	'sierra_google_api_key',
	array(
		'type'              => 'text',
		'section'           => 'sierra_misc_section',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Google API KEY', 'sierra' ),
	)
);

/**
 * Contact boxes
 */
Epsilon_Customizer::add_field(
	'sierra_contact_section',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'sierra_contact_section',
		'save_as_meta' => Epsilon_Content_Backup::get_instance()->setting_page,
		'label'        => esc_html__( 'Contact Columns', 'sierra' ),
		'button_label' => esc_html__( 'Add new boxes', 'sierra' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'contact_title',
		),
		'fields'       => array(
			'contact_title' => array(
				'label'   => esc_html__( 'Title', 'sierra' ),
				'type'    => 'text',
				'default' => esc_html__( 'Headquarters', 'sierra' ),
			),
			'contact_icon'  => array(
				'label'   => esc_html__( 'Icon', 'sierra' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-map',
			),
			'contact_text'  => array(
				'label'   => esc_html__( 'Text', 'sierra' ),
				'type'    => 'epsilon-text-editor',
				'default' => esc_html__( '176 Westmore Mondaile Street Victorian 887 NYC', 'sierra' ),
			),
		),
	)
);

/**
 * Copyright contents
 */
$url = 'https://colorlib.com';
Epsilon_Customizer::add_field(
	'sierra_copyright_contents',
	array(
		'type'    => 'epsilon-text-editor',
		'default' => sprintf('COPYRIGHT ©2019 ALL RIGHTS RESERVED | THIS TEMPLATE IS MADE WITH  BY <a href="%s">COLORLIB</a>.', $url),
		'label'   => esc_html__( 'Copyright Text', 'sierra' ),
		'section' => 'sierra_footer_section',
	)
);
Epsilon_Customizer::add_field(
	'sierra_footer_facebook',
	array(
		'type'    => 'url',
		'default' => '#',
		'label'   => esc_html__( 'Facebook', 'sierra' ),
		'section' => 'sierra_footer_section',
	)
);
Epsilon_Customizer::add_field(
	'sierra_footer_twitter',
	array(
		'type'    => 'url',
		'default' => '#',
		'label'   => esc_html__( 'Twitter', 'sierra' ),
		'section' => 'sierra_footer_section',
	)
);
Epsilon_Customizer::add_field(
	'sierra_footer_linkedin',
	array(
		'type'    => 'url',
		'default' => '#',
		'label'   => esc_html__( 'Linkedin', 'sierra' ),
		'section' => 'sierra_footer_section',
	)
);
Epsilon_Customizer::add_field(
	'sierra_footer_pinterest',
	array(
		'type'    => 'url',
		'default' => '#',
		'label'   => esc_html__( 'Pinterest', 'sierra' ),
		'section' => 'sierra_footer_section',
	)
);
Epsilon_Customizer::add_field(
	'sierra_footer_dribbble',
	array(
		'type'    => 'url',
		'default' => '#',
		'label'   => esc_html__( 'Dribbble', 'sierra' ),
		'section' => 'sierra_footer_section',
	)
);
Epsilon_Customizer::add_field(
	'sierra_footer_behance',
	array(
		'type'    => 'url',
		'default' => '#',
		'label'   => esc_html__( 'Behance', 'sierra' ),
		'section' => 'sierra_footer_section',
	)
);
/**
 * Theme Content
 */

/**
 * Slides
 */
Epsilon_Customizer::add_field(
	'sierra_slides',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'sierra_slides_section',
		'save_as_meta' => Epsilon_Content_Backup::get_instance()->setting_page,
		'label'        => esc_html__( 'Slides', 'sierra' ),
		'button_label' => esc_html__( 'Add new slides', 'sierra' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'slides_title',
		),
		'fields'       => array(
			'slides_title'       => array(
				'label'             => esc_html__( 'Title', 'sierra' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Growing your business',
			),
			'slides_description' => array(
				'label'   => esc_html__( 'Description', 'sierra' ),
				'type'    => 'epsilon-text-editor',
				'default' => 'Choose a powerful design for your Start-up',
			),
			'slides_btn_text'       => array(
				'label'             => esc_html__( 'Button Text', 'sierra' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Discover',
			),
			'slides_btn_url'       => array(
				'label'             => esc_html__( 'URL', 'sierra' ),
				'type'              => 'url',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => '#',
			),
			'slides_image'       => array(
				'label'   => esc_html__( 'Portrait', 'sierra' ),
				'type'    => 'epsilon-image',
				'size'    => 'sierra-main-slider',
				'default' => esc_url( get_template_directory_uri() . '/assets/img/home-slider/slider-m-1.png' ),
			),
		),
	)
);

/**
 * Feature
 */
Epsilon_Customizer::add_field(
	'sierra_feature',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'sierra_feature_section',
		'save_as_meta' => Epsilon_Content_Backup::get_instance()->setting_page,
		'label'        => esc_html__( 'Feature', 'sierra' ),
		'button_label' => esc_html__( 'Add new entries', 'sierra' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'feature_title',
		),
		'fields'       => array(
			'feature_image'    => array(
				'label'   => esc_html__( 'Portrait', 'sierra' ),
				'type'    => 'epsilon-image',
				'size'    => 'medium',
				'default' => esc_url( get_template_directory_uri() . '/assets/img/icon/title-icon.png' ),
			),
			'feature_title'    => array(
				'label'   => esc_html__( 'Title', 'sierra' ),
				'type'    => 'text',
				'default' => 'Brand Identity',
			),
			'feature_text'     => array(
				'label'   => esc_html__( 'Text', 'sierra' ),
				'type'    => 'epsilon-text-editor',
				'default' => 'Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.',
			),
			'feature_url'      => array(
				'label'             => esc_html__( 'Button URL', 'sierra' ),
				'type'              => 'text',
				'default'           => '#',
				'sanitize_callback' => 'wp_kses_post',
			),
		),
	)
);

/**
 * Testimonials
 */
Epsilon_Customizer::add_field(
	'sierra_testimonials',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'sierra_testimonial_section',
		'save_as_meta' => Epsilon_Content_Backup::get_instance()->setting_page,
		'label'        => esc_html__( 'Testimonials', 'sierra' ),
		'button_label' => esc_html__( 'Add new entries', 'sierra' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'testimonial_title',
		),
		'fields'       => array(
			'testimonial_title'    => array(
				'label'   => esc_html__( 'Title', 'sierra' ),
				'type'    => 'text',
				'default' => 'They are the best',
			),
			'testimonial_text'     => array(
				'label'   => esc_html__( 'Text', 'sierra' ),
				'type'    => 'epsilon-text-editor',
				'default' => 'Maecenas nec maximus magna. Nullam nec metus ullamcorper, scelerisque nulla vel, amus at fermentum ligula Maecenas nec maximus magna. Nullam nec metus ullamcorper, scelerisque nulla vel, amus at fermentum ligula',
			),
			'testimonial_name'     => array(
				'label'   => esc_html__( 'Commenter Name', 'sierra' ),
				'type'    => 'text',
				'default' => 'Chriss Turner',
			),
			'testimonial_deg'     => array(
				'label'   => esc_html__( 'Commenter Designation', 'sierra' ),
				'type'    => 'text',
				'default' => 'CEO Enterprise',
			),
			'testimonial_image'    => array(
				'label'   => esc_html__( 'Image', 'sierra' ),
				'type'    => 'epsilon-image',
				'size'    => 'thumbnail',
				'default' => esc_url( get_template_directory_uri() . '/assets/img/team/people/people-5.jpg' ),
			),
		),
	)
);

/**
 * Skill
 */
Epsilon_Customizer::add_field(
	'sierra_skill',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'sierra_skill_section',
		'save_as_meta' => Epsilon_Content_Backup::get_instance()->setting_page,
		'label'        => esc_html__( 'Skill', 'sierra' ),
		'button_label' => esc_html__( 'Add new entries', 'sierra' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'skill_title',
		),
		'fields'       => array(
			'skill_title'    => array(
				'label'   => esc_html__( 'Title', 'sierra' ),
				'type'    => 'text',
				'default' => 'Development',
			),
			'skill_text'     => array(
				'label'   => esc_html__( 'Text', 'sierra' ),
				'type'    => 'text',
				'default' => '65',
			),
		),
	)
);

/**
 * Build Team
 */
Epsilon_Customizer::add_field(
	'sierra_build',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'sierra_build_section',
		'save_as_meta' => Epsilon_Content_Backup::get_instance()->setting_page,
		'label'        => esc_html__( 'Build Section', 'sierra' ),
		'button_label' => esc_html__( 'Add new items', 'sierra' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'build_image_title',
		),
		'fields'       => array(
			'build_image_title'       => array(
				'label'             => esc_html__( 'Title', 'sierra' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Business',
			),
			'build_team_image'    => array(
				'label'   => esc_html__( 'Image', 'sierra' ),
				'type'    => 'epsilon-image',
				'size'    => 'medium',
				'default' => esc_url( get_template_directory_uri() . '/assets/img/team/people/people-1.jpg' ),
			),
		),
	)
);

/**
 * Services
 */
Epsilon_Customizer::add_field(
	'sierra_services',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'sierra_services_section',
		'save_as_meta' => Epsilon_Content_Backup::get_instance()->setting_page,
		'label'        => esc_html__( 'Services', 'sierra' ),
		'button_label' => esc_html__( 'Add new service', 'sierra' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'service_title',
		),
		'fields'       => array(
			'services_image'    => array(
				'label'   => esc_html__( 'Image', 'sierra' ),
				'type'    => 'epsilon-image',
				'size'    => 'medium',
				'default' => esc_url( get_template_directory_uri() . '/assets/img/icon/f-icon-1.png' ),
			),
			'service_title'       => array(
				'label'             => esc_html__( 'Title', 'sierra' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Brand Identity',
			),
			'service_description' => array(
				'label'             => esc_html__( 'Description', 'sierra' ),
				'type'              => 'epsilon-text-editor',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.',
			),
			'service_url'       => array(
				'label'             => esc_html__( 'URL', 'sierra' ),
				'type'              => 'url',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => '#',
			),
		),
	)
);

/**
 * Progress bars
 */
Epsilon_Customizer::add_field(
	'sierra_progress_bars',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'sierra_progress_section',
		'save_as_meta' => Epsilon_Content_Backup::get_instance()->setting_page,
		'label'        => esc_html__( 'Progress Bars', 'sierra' ),
		'button_label' => esc_html__( 'Add new items', 'sierra' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'progress_bar_title',
		),
		'fields'       => array(
			'progress_bar_title' => array(
				'label'             => esc_html__( 'Title', 'sierra' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'Hard work',
			),
			'progress_bar_value' => array(
				'label'             => esc_html__( 'Number', 'sierra' ),
				'type'              => 'text',
				'sanitize_callback' => 'absint',
				'default'           => 55,
			),
		),
	)
);

/**
 * Solutions
 */
Epsilon_Customizer::add_field(
	'sierra_solutions',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'sierra_solutions_section',
		'save_as_meta' => Epsilon_Content_Backup::get_instance()->setting_page,
		'label'        => esc_html__( 'Solution Items', 'sierra' ),
		'button_label' => esc_html__( 'Add new items', 'sierra' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'solution_title',
		),
		'fields'       => array(
			'solution_title'       => array(
				'label'             => esc_html__( 'Title', 'sierra' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => esc_html__( 'We can improve your business', 'sierra' ),
			),
			'solution_description' => array(
				'label'   => esc_html__( 'Description', 'sierra' ),
				'type'    => 'epsilon-text-editor',
				'default' => esc_html__( 'Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit.', 'sierra' ),
			),
		),
	)
);

/**
 * Section builder page changer ( acts as a menu )
 */
Epsilon_Customizer::add_field(
	'sierra_page_changer',
	array(
		'type'     => 'epsilon-page-changer',
		'label'    => esc_html__( 'Available pages', 'sierra' ),
		'section'  => 'sierra_repeatable_section',
		'priority' => 0,
	)
);

Epsilon_Customizer::add_field(
	'sierra_logo_dimensions',
	array(
		'type'           => 'epsilon-image-dimensions',
		'label'          => esc_html__( 'Logo Dimensions', 'sierra' ),
		'linked_control' => 'custom_logo',
		'section'        => 'title_tagline',
		'priority'       => 1,
	)
);

/**
 * Repeatable sections
 */
Epsilon_Customizer::add_field(
	'sierra_frontpage_sections',
	array(
		'type'                => 'epsilon-section-repeater',
		'label'               => esc_html__( 'Sections', 'sierra' ),
		'section'             => 'sierra_repeatable_section',
		'page_builder'        => true,
		'selective_refresh'   => true,
        'transport'           => 'postMessage',
		'repeatable_sections' => Sierra_Repeatable_Sections::get_instance()->sections,
	)
);





/*========================================
Color Option
==========================================*/

Epsilon_Customizer::add_field(
    'epsilon_accent_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Accent Color #1', 'sierra' ),
        'description' => esc_html__( 'Theme main color.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#7699F5',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_accent_color_second',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Accent Color #2', 'sierra' ),
        'description' => esc_html__( 'The second main color.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#B2AADB',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_title_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Title Color', 'sierra' ),
        'description' => esc_html__( 'The color used for titles.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#0b1033',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_text_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Text Color', 'sierra' ),
        'description' => esc_html__( 'TThe color used for paragraphs.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#7c8d93',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_widgettitle_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Widget Title Color', 'sierra' ),
        'description' => esc_html__( 'The color used for wifget title.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#0b1033',
    )
);



Epsilon_Customizer::add_field(
    'epsilon_link_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Link Color', 'sierra' ),
        'description' => esc_html__( 'The color used for links.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fff',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_link_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Link Hover Color', 'sierra' ),
        'description' => esc_html__( 'The color used for hovered links.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fff',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_header_background',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header background color', 'sierra' ),
        'description' => esc_html__( 'The color used for the header background.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fff',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_menu_item_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Menu item color', 'sierra' ),
        'description' => esc_html__( 'The color used for the menu item color.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fff',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_menu_item_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Menu item hover color', 'sierra' ),
        'description' => esc_html__( 'The color used for the menu item hover color.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#0b1033',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_menu_item_active_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Menu item active color', 'sierra' ),
        'description' => esc_html__( 'The color used for the menu item active color.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#0b1033',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_dropdown_menu_background',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown background', 'sierra' ),
        'description' => esc_html__( 'The color used for the menu background.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#171717',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_dropdown_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown Menu Hover Color', 'sierra' ),
        'description' => esc_html__( 'The color used for the dropdown menu hover color.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#97ccfe',
    )
);


Epsilon_Customizer::add_field(
    'epsilon_footer_background',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Background Color', 'sierra' ),
        'description' => esc_html__( 'The color used for the footer background.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#11173b',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_footer_title_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Title Color', 'sierra' ),
        'description' => esc_html__( 'The color used for the footer title color.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fff',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_footer_text_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Text Color', 'sierra' ),
        'description' => esc_html__( 'The color used for the footer text color.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#2a2f56',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_footer_link_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Link Color', 'sierra' ),
        'description' => esc_html__( 'The color used for the footer text color.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#007bff',
    )
);

Epsilon_Customizer::add_field(
    'epsilon_footer_link_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Link Hover Color', 'sierra' ),
        'description' => esc_html__( 'The color used for the footer text color.', 'sierra' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#0056b3',
    )
);


