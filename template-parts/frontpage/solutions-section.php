<?php
$elements = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields = $elements->sections[ $section_id ];
$grouping = array(
	'values'    => 'solution_grouping',
	'group_by'  => 'solution_title',
);
$fields[ 'solutions' ] = $elements->get_repeater_field( $fields[ 'solution_repeater_field' ], array(), $grouping );
$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'solutions', Sierra_Repeatable_Sections::get_instance() );
$parent_attr = array(
	'class' => array( 'service_solution_area', 'p_100', 'section', 'ewf-section', 'contrast' ),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat' ),
);
?>

<section data-customizer-section-id="sierra_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
    <div <?php $attr_helper->generate_attributes($parent_attr); ?>>
	    <?php
	    $attr_helper->generate_color_overlay();
	    ?>
        <div class="<?php echo esc_attr( Sierra_Helper::container_class( 'solutions', $fields ) ); ?>">
	        <?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Sierra_Repeatable_Sections', 'solutions' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
            <div class="row s_solution_inner">
                <div class="col-lg-6">
                    <div class="s_solution_item">
                        <div class="l_title">
                            <img src="<?php echo esc_url( $fields[ 'Solution_section_image' ] ); ?>" alt="">
                            <h6><?php echo esc_html( $fields[ 'solution_section_subtitle' ] ); ?></h6>
                            <h2><?php echo wp_kses_post( $fields[ 'solution_section_title' ] ); ?></h2>
                        </div>
                        <p><?php echo wp_kses_post( $fields[ 'solution_section_content' ] ); ?></p>
                        <div id="accordion" role="tablist" class="solution_collaps">
						    <?php
						    foreach ( $fields[ 'solutions' ] as $key => $value ) {
							    ?>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-<?php echo absint( $value[ 'index' ] ); ?>">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapse-<?php echo absint( $value[ 'index' ] ); ?>" aria-expanded="false"
                                               aria-controls="collapse-<?php echo absint( $value[ 'index' ] ); ?>">
											    <?php echo esc_html( $value[ 'solution_title' ] ); ?>
                                                <i class="minus">-</i>
                                                <i class="plus">+</i>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapse-<?php echo absint( $value[ 'index' ] ); ?>" class="collapse" role="tabpanel" aria-labelledby="heading-<?php echo absint( $value[ 'index' ] ); ?>"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <p><?php echo wp_kses_post( $value[ 'solution_description' ] ); ?></p>
                                        </div>
                                    </div>
                                </div>
							    <?php
						    }
						    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>