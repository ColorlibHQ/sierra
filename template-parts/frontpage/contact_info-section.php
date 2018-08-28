<?php
$elements = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields = $elements->sections[ $section_id ];

$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'contact_info', Sierra_Repeatable_Sections::get_instance() );
$parent_attr = array(
	'class' => array( 'world_map_area p_100', 'ewf-section', 'contrast' ),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat'),
);
?>

<section data-customizer-section-id="sierra_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
	<div <?php $attr_helper->generate_attributes($parent_attr); ?>>
        <?php
        $attr_helper->generate_color_overlay();
        ?>
        <div class="<?php echo esc_attr( Sierra_Helper::container_class( 'contact_info', $fields ) ); ?>">
			<?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Sierra_Repeatable_Sections', 'contact_info' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
            <div class="world_map_inner">
                <?php
                if( ! empty( $fields[ 'contact_info_map_image' ] ) ){
                ?>
                <img class="img-fluid" src="<?php echo esc_url( $fields[ 'contact_info_map_image' ] ); ?>" alt="<?php echo esc_html( $fields[ 'contact_info_title' ] ); ?>">
                <?php } ?>
                <div class="bd-callout">
                    <h3><?php echo esc_html( $fields[ 'contact_info_title' ] ); ?></h3>
					<?php echo wp_kses_post( wpautop( $fields[ 'contact_info_address' ] ) ); ?>
                    <h4>
                        <a href="#"><?php echo esc_html( $fields[ 'contact_info_phone' ] ); ?></a>
                        <a href="#"><?php echo esc_html( $fields[ 'contact_info_email' ] ); ?></a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>