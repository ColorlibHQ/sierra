<?php
$element = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields = $element->sections[ $section_id ];

$grouping = array(
	'values' => $fields[ 'build_grouping' ],
	'group_by' => 'build_image_title'
);
$fields[ 'build' ] = $element->get_repeater_field( $fields[ 'build_repeater_field' ], array(), $grouping );
$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'build', Sierra_Repeatable_Sections::get_instance() );
$parent_attr = array(
	'id'    => $fields['build_section_unique_id'] ? array( $fields['build_section_unique_id'] ) : array(),
	'class' => array( 'team_people_area', 'ewf-section', 'contrast' ),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat'),
);

?>
<section data-customizer-section-id="sierra_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
	<div <?php $attr_helper->generate_attributes($parent_attr); ?>>
        <?php
        $attr_helper->generate_color_overlay();
        ?>
        <div class="<?php echo esc_attr( Sierra_Helper::container_class( 'build', $fields ) ); ?>">
			<?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Sierra_Repeatable_Sections', 'build' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
            <div class="row">
                <?php
                if( $fields[ 'build_row_title_align' ] == 'right' ) {
	                ?>
                    <div class="col-lg-6">
                        <div class="team_people_text">
                            <div class="l_title">
                                <img src="<?php echo esc_url( $fields['build_section_image'] ); ?>" alt="">
                                <h6><?php echo esc_html( $fields['build_section_subtitle'] ); ?></h6>
                                <h2><?php echo wp_kses_post( $fields['build_section_title'] ); ?></h2>
                            </div>
                            <p><?php echo wp_kses_post( $fields['build_section_text'] ); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team_img_inner">
                            <div class="row">
				                <?php
				                if ( ! empty( $fields['build'] ) ) {
					                $i = 0;
					                foreach ( $fields['build'] as $key => $value ) {
						                ?>
                                        <div class="col-lg-6 col-6">
                                            <div class="team_img_item">
                                                <img src="<?php echo esc_url( $value['build_team_image'] ); ?>"
                                                     alt="<?php echo esc_html__( 'build_image_title', 'sierra' ); ?>">
                                            </div>
                                        </div>
						                <?php
						                if ( ++ $i == 4 ) {
							                break;
						                }
					                }
				                }
				                ?>
                            </div>
                        </div>
                    </div>
	                <?php
                }
                else{
                    ?>
                    <div class="col-lg-6">
                        <div class="team_img_inner">
                            <div class="row">
				                <?php
				                if ( ! empty( $fields['build'] ) ) {
					                $i = 0;
					                foreach ( $fields['build'] as $key => $value ) {
						                ?>
                                        <div class="col-lg-6 col-6">
                                            <div class="team_img_item">
                                                <img src="<?php echo esc_url( $value['build_team_image'] ); ?>"
                                                     alt="<?php echo esc_html__( 'build_image_title', 'sierra' ); ?>">
                                            </div>
                                        </div>
						                <?php
						                if ( ++ $i == 4 ) {
							                break;
						                }
					                }
				                }
				                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team_people_text">
                            <div class="l_title">
                                <img src="<?php echo esc_url( $fields['build_section_image'] ); ?>" alt="">
                                <h6><?php echo esc_html( $fields['build_section_subtitle'] ); ?></h6>
                                <h2><?php echo wp_kses_post( $fields['build_section_title'] ); ?></h2>
                            </div>
                            <p><?php echo wp_kses_post( $fields['build_section_text'] ); ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>