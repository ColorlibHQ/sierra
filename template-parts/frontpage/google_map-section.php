<?php
$elements = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_section_' . get_the_ID(), get_the_ID() );
$fields = $elements->sections[ $section_id ];
$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'google_map', Sierra_Repeatable_Sections::get_instance() );
$parent_attr = array(
	'class' => array( 'contact_map_area', 'ewf-section', 'contrast' ),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat'),
);
?>

<section data-customizer-section-id="sierra_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
	<div <?php $attr_helper->generate_attributes( $parent_attr ); ?>>
        <div id="mapBox1" class="mapBox1 row m0"
             data-lat="<?php print $fields[ 'google_map_lat' ]; ?>"
             data-lon="<?php print $fields[ 'google_map_long' ]; ?>"
             data-zoom="<?php print $fields[ 'google_map_zoom' ]; ?>"
             data-marker=""
             data-info=""
             data-mlat=""
             data-mlon="">
        </div>
        <div class="map_location_box">
            <div class="container">
				<?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Sierra_Repeatable_Sections', 'google_map' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
                <div class="map_l_box_inner">
                    <div class="bd-callout">
						<?php if( $fields[ 'contact_info_title' ] != '' ){?>
                            <h3><?php echo wp_kses_post( $fields[ 'contact_info_title' ] ); ?></h3>
						<?php } ?>
						<?php echo wp_kses_post( wpautop( $fields[ 'contact_info_address' ] ) ); ?>
                        <h4><a href="#"><?php echo wp_kses_post( $fields[ 'contact_info_phone' ] ); ?></a> <a href="#"><?php echo wp_kses_post( $fields[ 'contact_info_email' ] ); ?></a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>