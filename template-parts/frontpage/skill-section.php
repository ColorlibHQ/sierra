<?php
$elements = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields = $elements->sections[ $section_id ];
$grouping = array(
	'values'    => 'skill_grouping',
	'group_by'  => 'skill_title'
);
$fields[ 'skill' ] = $elements->get_repeater_field( $fields[ 'skill_repeater_field' ], array(), $grouping );
$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'skill', Sierra_Repeatable_Sections::get_instance() );
$parent_attr = array(
	'class' => array( 'we_company_area', 'p_100', 'ewf-section', 'contrast' ),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat'),
);
?>

<section data-customizer-section-id="sierra_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
	<div <?php $attr_helper->generate_attributes( $parent_attr ); ?>>
        <?php $attr_helper->generate_color_overlay(); ?>
        <div class="<?php echo esc_attr( Sierra_Helper::container_class( 'skill', $fields ) ); ?>">
			<?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Sierra_Repeatable_Sections', 'skill' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
            <div class="row company_inner">
                <?php
                if( $fields[ 'skill_row_title_align' ] == 'left' ) {
	                ?>
                    <div class="col-lg-6">
                        <div class="left_company_text">
                            <div class="l_title">
				                <?php if ( ! empty( $fields['skill_section_image'] ) ) { ?>
                                    <img src="<?php echo esc_url( $fields['skill_section_image'] ); ?>"
                                         alt="<?php echo wp_kses_post( $fields['skill_section_title'] ); ?>">
				                <?php } ?>
				                <?php if ( ! empty( $fields['skill_section_subtitle'] ) ) { ?>
                                    <h6><?php echo esc_html( $fields['skill_section_subtitle'] ); ?></h6>
				                <?php } ?>
				                <?php if ( ! empty( $fields['skill_section_title'] ) ) { ?>
                                    <h2><?php echo wp_kses_post( $fields['skill_section_title'] ); ?></h2>
				                <?php } ?>
                            </div>
			                <?php if ( ! empty( $fields['skill_text'] ) ) { ?>
				                <?php echo wp_kses_post( wpautop( $fields['skill_text'] ) ); ?>
			                <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="company_skill">
			                <?php if ( ! empty( $fields['skill_group_text'] ) ) { ?>
				                <?php echo wp_kses_post( wpautop( $fields['skill_group_text'] ) ); ?>
			                <?php } ?>
                            <div class="our_skill_inner">
				                <?php
				                if ( ! empty( $fields['skill'] ) ) {
					                foreach ( $fields['skill'] as $key => $value ) {
						                ?>
                                        <div class="single_skill">
                                            <h3><?php echo esc_html( $value['skill_title'] ); ?></h3>
                                            <div class="progress"
                                                 data-value="<?php echo esc_html( $value['skill_text'] ); ?>">
                                                <div class="progress-bar">
                                                    <div class="progress_parcent"><span
                                                                class="counter"><?php echo esc_html( $value['skill_text'] ); ?></span>%
                                                    </div>
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
	                <?php
                }
                else{
                    ?>
                    <div class="col-lg-6">
                        <div class="company_skill">
			                <?php if ( ! empty( $fields['skill_group_text'] ) ) { ?>
				                <?php echo wp_kses_post( wpautop( $fields['skill_group_text'] ) ); ?>
			                <?php } ?>
                            <div class="our_skill_inner">
				                <?php
				                if ( ! empty( $fields['skill'] ) ) {
					                foreach ( $fields['skill'] as $key => $value ) {
						                ?>
                                        <div class="single_skill">
                                            <h3><?php echo esc_html( $value['skill_title'] ); ?></h3>
                                            <div class="progress"
                                                 data-value="<?php echo esc_html( $value['skill_text'] ); ?>">
                                                <div class="progress-bar">
                                                    <div class="progress_parcent"><span
                                                                class="counter"><?php echo esc_html( $value['skill_text'] ); ?></span>%
                                                    </div>
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
                    <div class="col-lg-6">
                        <div class="left_company_text">
                            <div class="l_title">
				                <?php if ( ! empty( $fields['skill_section_image'] ) ) { ?>
                                    <img src="<?php echo esc_url( $fields['skill_section_image'] ); ?>"
                                         alt="<?php echo wp_kses_post( $fields['skill_section_title'] ); ?>">
				                <?php } ?>
				                <?php if ( ! empty( $fields['skill_section_subtitle'] ) ) { ?>
                                    <h6><?php echo esc_html( $fields['skill_section_subtitle'] ); ?></h6>
				                <?php } ?>
				                <?php if ( ! empty( $fields['skill_section_title'] ) ) { ?>
                                    <h2><?php echo wp_kses_post( $fields['skill_section_title'] ); ?></h2>
				                <?php } ?>
                            </div>
			                <?php if ( ! empty( $fields['skill_text'] ) ) { ?>
				                <?php echo wp_kses_post( wpautop( $fields['skill_text'] ) ); ?>
			                <?php } ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>