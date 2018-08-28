<?php
$element = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields = $element->sections[ $section_id ];

$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'contact', Sierra_Repeatable_Sections::get_instance() );
$parent_attr = array(
	'class' => array( 'get_in_touch_area', 'ewf-section', 'contrast' ),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat'),
);
?>

<section data-customizer-section-id="sierra_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
    <div <?php $attr_helper->generate_attributes($parent_attr); ?>>
        <?php
        $attr_helper->generate_color_overlay();
        ?>
        <div class="<?php echo esc_attr( Sierra_Helper::container_class( 'contact', $fields ) ); ?>">
		    <?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Sierra_Repeatable_Sections', 'contact' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
            <div class="row get_touch_inner">
                <?php
                    if( $fields[ 'contact_row_title_align' ] == 'left' ) {
	                    ?>
                        <div class="col-lg-6">
	                        <?php
	                        if( ! empty( $fields['contact_shortcode'] ) ){
		                        echo do_shortcode( $fields['contact_shortcode'] );
	                        }
	                        ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="touch_details">
                                <div class="l_title">
                                    <?php if( ! empty( $fields['contact_section_image'] ) ){ ?>
                                    <img src="<?php echo esc_url( $fields['contact_section_image'] ); ?>" alt="">
                                    <?php } ?>
                                    <?php if( ! empty( $fields['contact_section_subtitle'] ) ) { ?>
                                    <h6><?php echo esc_html( $fields['contact_section_subtitle'] ); ?></h6>
                                    <?php } ?>
                                    <?php if( ! empty( $fields['contact_section_title'] ) ) { ?>
                                    <h2><?php echo wp_kses_post( $fields['contact_section_title'] ); ?></h2>
                                    <?php } ?>
                                </div>
                                <p><?php echo wp_kses_post( $fields['contact_section_text'] ); ?></p>
                                <?php if( ! empty( $fields['contact_phone_number'] ) ) { ?>
                                <a href="#"><h5><?php esc_html_e( 'Call us now', 'sierra' ); ?></h5></a>
                                <a href="#"><h4><?php echo esc_html( $fields['contact_phone_number'] ); ?></h4></a>
                                <?php } ?>
                            </div>
                        </div>
	                    <?php
                    }
                    else{
                        ?>
                        <div class="col-lg-6">
                            <div class="touch_details">
                                <div class="l_title">
			                        <?php if( ! empty( $fields['contact_section_image'] ) ){ ?>
                                        <img src="<?php echo esc_url( $fields['contact_section_image'] ); ?>" alt="">
			                        <?php } ?>
			                        <?php if( ! empty( $fields['contact_section_subtitle'] ) ) { ?>
                                        <h6><?php echo esc_html( $fields['contact_section_subtitle'] ); ?></h6>
			                        <?php } ?>
			                        <?php if( ! empty( $fields['contact_section_title'] ) ) { ?>
                                        <h2><?php echo wp_kses_post( $fields['contact_section_title'] ); ?></h2>
			                        <?php } ?>
                                </div>
                                <p><?php echo wp_kses_post( $fields['contact_section_text'] ); ?></p>
		                        <?php if( ! empty( $fields['contact_phone_number'] ) ) { ?>
                                    <a href="#"><h5><?php esc_html_e( 'Call us now', 'sierra' ); ?></h5></a>
                                    <a href="#"><h4><?php echo esc_html( $fields['contact_phone_number'] ); ?></h4></a>
		                        <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php
                                if( ! empty( $fields['contact_shortcode'] ) ){
                                    echo do_shortcode( $fields['contact_shortcode'] );
                                }
                             ?>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</section>