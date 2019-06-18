<?php
$element = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields = $element->sections[ $section_id ];
$groping = array(
    'values'    => 'testimonials_grouping',
    'group_by'  => 'testimonials_title'
);
$fields[ 'testimonials' ] = $element->get_repeater_field( $fields[ 'testimonials_repeater_field' ], array(), $groping );
$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'aboutTestimonials', Sierra_Repeatable_Sections::get_instance() );
$parent_attr = array(
	'class' => array( 'testimonials_area', 'ewf-section', 'contrast' ),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat'),
);
?>

<section data-customizer-section-id="sierra_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
	<div <?php $attr_helper->generate_attributes($parent_attr); ?>>
		<?php
		    $attr_helper->generate_color_overlay();
		?>
        <div class="<?php echo esc_attr( Sierra_Helper::container_class( 'aboutTestimonials', $fields ) ); ?>">
			<?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Sierra_Repeatable_Sections', 'aboutTestimonials' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
            <div class="testimonials_slider owl-carousel">
				<?php
                $testimonialGroup = $fields['testimonials_grouping'];


				if( ! empty( $fields[ 'testimonials' ] ) ) {
					foreach ( $fields[ 'testimonials' ] as $key => $values ) {
                        if( in_array( $values['testimonial_title'], $testimonialGroup ) || $testimonialGroup[0] == 'all' ) {
                            ?>
                            <div class="item">
                                <div class="testi_item">
                                    <h3><?php echo esc_html($values['testimonial_title']); ?></h3>
                                    <?php echo wp_kses_post(wpautop($values['testimonial_text'])); ?>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img class="rounded-circle"
                                                 src="<?php echo esc_url($values['testimonial_image']); ?>"
                                                 alt="<?php echo esc_html($values['testimonial_name']); ?>">
                                        </div>
                                        <div class="media-body">
                                            <h4><?php echo esc_html($values['testimonial_name']); ?></h4>
                                            <h5><?php echo esc_html($values['testimonial_deg']); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
					}
				}
				?>
            </div>
        </div>
    </div>
</section>