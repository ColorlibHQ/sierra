<?php
$element = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields = $element->sections[ $section_id ];

$grouping = array(
    'values' => $fields[ 'testimonials_grouping' ],
    'group_by' => 'testimonial_title'
);
$fields[ 'testimonials' ] = $element->get_repeater_field( $fields[ 'testimonials_repeater_field' ], array(), $grouping );

?>

<section class="best_3d_area" data-customizer-section-id="sierra_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
	<?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Sierra_Repeatable_Sections', 'testimonials' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
	<div class="left_3d">
		<div class="shap_slider_inner owl-carousel">
            <?php
            if( !empty( $fields[ 'testimonials' ] ) ) {
	            foreach ( $fields['testimonials'] as $key => $value ) {
		            ?>
                    <div class="item">
                        <h4><?php echo esc_html( $value[ 'testimonial_title' ] ); ?></h4>
                        <p><?php echo esc_html( $value[ 'testimonial_text' ] ); ?></p>
                        <div class="media">
                            <img src="<?php echo esc_url( $value[ 'testimonial_image' ] ); ?>" alt="">
                            <div class="media-body">
                                <h5><?php echo esc_html( $value[ 'testimonial_name' ] ); ?></h5>
                                <h6><?php echo esc_html( $value[ 'testimonial_deg' ] ); ?></h6>
                            </div>
                        </div>
                    </div>
            <?php
	            }
            }
            ?>
		</div>
	</div>
	<div class="right_text">
		<div class="right_text_inner">
			<div class="text_3d">
				<div class="l_title">
					<img src="<?php echo esc_url( $fields[ 'testimonial_section_image' ] ); ?>" alt="">
					<h6><?php echo esc_html( $fields[ 'testimonials_section_subtitle' ] ); ?></h6>
					<h2><?php echo esc_html( $fields[ 'testimonials_section_title' ] ); ?></h2>
				</div>
				<p><?php echo esc_html( $fields[ 'testimonials_section_text' ] ); ?></p>
			</div>
			<div class="shap_mobile">
				<img src="<?php echo esc_url( $fields[ 'testimonial_section_image_right' ] ); ?>" alt="">
			</div>
		</div>
	</div>
</section>