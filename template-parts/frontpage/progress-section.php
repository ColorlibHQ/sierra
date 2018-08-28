<?php
$elements = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields = $elements->sections[ $section_id ];
$grouping = array(
	'values' => $fields[ 'progress_bars_grouping' ],
	'group_by' => 'progress_bar_title'
);
$fields[ 'progress' ] = $elements->get_repeater_field( $fields[ 'progress_bars_repeater_field' ], array(), $grouping );
$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'progress', Sierra_Repeatable_Sections::get_instance() );
$parent_attr = array(
	'class' => array( 'circle_chart_area', 'section', 'ewf-section', 'contrast' ),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat' ),
);
?>

<section data-customizer-section-id="sierra_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
    <div <?php $attr_helper->generate_attributes($parent_attr); ?>>
	    <?php
	    $attr_helper->generate_color_overlay();
	    ?>
        <div class="<?php echo esc_attr( Sierra_Helper::container_class( 'progress', $fields ) ); ?>">
		    <?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Sierra_Repeatable_Sections', 'progress' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
            <div class="row">
			    <?php
			    if( ! empty( $fields[ 'progress' ] ) ) {
				    foreach ( $fields[ 'progress' ] as $key => $value ) {
					    ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="circle_progress circular style-polygon" data-percentage="<?php echo esc_html( $value[ 'progress_bar_value' ] ); ?>" data-thickness="3"
                                 data-reverse="true" data-empty-fill="transparent" data-start-color="#987dff"
                                 data-end-color="#7acaff">
                                <div class="circle_progress_inner">
                                    <strong></strong>
                                    <span class="percentage"></span>
                                    <h4><?php echo wp_kses_post( $value[ 'progress_bar_title' ] ); ?></h4>
                                </div>
                            </div>
                        </div>
					    <?php
				    }
			    }
			    ?>
            </div>
        </div>
    </div>
</section>