<?php
/**
 * Sierra Theme Customizer Panels & Sections
 *
 * @package Sierra
 * @since   1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register customizer panels
 */
$panels = array(
	/**
	 * General panel
	 */
	array(
		'id'   => 'sierra_panel_general',
		'args' => array(
			'priority'       => 24,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'General options', 'sierra' ),
		),
	),
	/**
	 * Content Panel
	 */
	array(
		'id'   => 'sierra_panel_content',
		'args' => array(
			'priority'       => 27,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'type'           => 'epsilon-panel-regular',
			'title'          => esc_html__( 'Page Content', 'sierra' ),
		),
	),
	/**
	 * Color panel
	 */
	array(
		'id'   => 'sierra_panel_colors',
		'args' => array(
			'priority'       => 29,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Colors', 'sierra' ),
		),
	),
	/**
	 * Content panel
	 */
	array(
		'id'   => 'sierra_panel_section_content',
		'args' => array(
			'priority'       => 9999,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'type'           => 'epsilon-panel-regular',
			'title'          => esc_html__( 'Front Page Content', 'sierra' ),
			'panel'          => 'sierra_panel_content',
			'hidden'         => true,
		),
	),
);

/**
 * Register sections
 */
$sections = array(
	/**
	 * General section
	 */
	array(
		'id'   => 'sierra_header_section',
		'args' => array(
			'title'    => esc_html__( 'Header', 'sierra' ),
			'panel'    => 'sierra_panel_general',
			'priority' => 1,
		),
	),
	array(
		'id'   => 'sierra_blog_section',
		'args' => array(
			'title'    => esc_html__( 'Blog Option', 'sierra' ),
			'panel'    => 'sierra_panel_general',
			'priority' => 1,
		),
	),
	array(
		'id'   => 'sierra_layout_section',
		'args' => array(
			'title'    => esc_html__( 'Layout & Typography', 'sierra' ),
			'panel'    => 'sierra_panel_general',
			'priority' => 3,
		),
	),

	array(
		'id'   => 'sierra_footer_section',
		'args' => array(
			'title'    => esc_html__( 'Footer', 'sierra' ),
			'panel'    => 'sierra_panel_general',
			'priority' => 50,
		),
	),
	array(
		'id'   => 'sierra_misc_section',
		'args' => array(
			'title'    => esc_html__( 'Misc', 'sierra' ),
			'panel'    => 'sierra_panel_general',
			'priority' => 60,
		),
	),
	/**
	 * Repeatable sections container
	 */
	array(
		'id'   => 'sierra_repeatable_section',
		'args' => array(
			'title'       => esc_html__( 'Page Sections', 'sierra' ),
			'description' => esc_html__( 'Sierra theme pages are rendered through the use of these sections.', 'sierra' ),
			'priority'    => 0,
			'panel'       => 'sierra_panel_content',
		),
	),

	/**
	 * Theme Content Sections
	 */
	array(
		'id'   => 'sierra_slides_section',
		'args' => array(
			'title'    => esc_html__( 'Slides', 'sierra' ),
			'panel'    => 'sierra_panel_section_content',
			'priority' => 0,
			'type'     => 'epsilon-section-doubled',
		),
	),
	array(
		'id'    => 'sierra_feature_section',
		'args'  => array(
			'title'     => esc_html__( 'Feature', 'sierra' ),
			'panel'     => 'sierra_panel_section_content',
			'priority'  => 1,
			'type'      => 'epsilon-section-doubled',
		)
	),
	array(
		'id'    => 'sierra_testimonial_section',
		'args'  => array(
			'title'     => esc_html__( 'Testimonial', 'sierra' ),
			'panel'     => 'sierra_panel_section_content',
			'priority'  => 2,
			'type'      => 'epsilon-section-doubled',
		)
	),
	array(
		'id'    => 'sierra_build_section',
		'args'  => array(
			'title'     => 'Build Team',
			'panel'     => 'sierra_panel_section_content',
			'priority'  => 3,
			'type'      => 'epsilon-section-doubled'
		)
	),
	array(
		'id'    => 'sierra_services_section',
		'args'  => array(
			'title'     => 'Services',
			'panel'     => 'sierra_panel_section_content',
			'priority'  => 4,
			'type'      => 'epsilon-section-doubled'
		)
	),
	array(
		'id'    => 'sierra_progress_section',
		'args'  => array(
			'title'     => 'Progress',
			'panel'     => 'sierra_panel_section_content',
			'priority'  => 5,
			'type'      => 'epsilon-section-doubled'
		)
	),
	array(
		'id'    => 'sierra_solutions_section',
		'args'  => array(
			'title'     => 'Solution',
			'panel'     => 'sierra_panel_section_content',
			'priority'  => 6,
			'type'      => 'epsilon-section-doubled'
		)
	),
	array(
		'id'    => 'sierra_skill_section',
		'args'  => array(
			'title'     => 'Skill',
			'panel'     => 'sierra_panel_section_content',
			'priority'  => 7,
			'type'      => 'epsilon-section-doubled'
		),
	),
);

$visible_recommended = get_option( 'sierra_recommended_actions', false );
if ( $visible_recommended ) {
	unset( $sections[0] );
}

$collection = array(
	'panel'   => $panels,
	'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );
