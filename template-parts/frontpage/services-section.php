<?php
$elements = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields = $elements->sections[ $section_id ];
$grouping = array(
	'values'    => $fields[ 'services_grouping' ],
	'group_by'  => 'services_title'
);
$fields[ 'services' ] = $elements->get_repeater_field( $fields[ 'services_repeater_field' ], array(), $grouping );
$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'services', Sierra_Repeatable_Sections::get_instance() );

$parent_attr = array(
	'class' => array( 'service_feature', 'section', 'ewf-section', 'contrast' ),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat' ),
);
$section_items_column = 12 / intval( $fields[ 'services_column_group' ] );
?>

<section data-customizer-section-id="sierra_repeatable_section_<?php echo esc_attr( $section_id ); ?>" data-section="<?php echo esc_attr( $section_id ); ?>">
	<div <?php $attr_helper->generate_attributes($parent_attr); ?>>
        <?php
            $attr_helper->generate_color_overlay();
        ?>
        <div class="<?php echo esc_attr( Sierra_Helper::container_class( 'services', $fields ) ); ?>">
	        <?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Sierra_Repeatable_Sections', 'services' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
            <div class="row feature_inner">
				<?php
				if( ! empty( $fields[ 'services' ] ) ){
					foreach ( $fields[ 'services' ] as $key => $value ) {
						?>
                        <div class="col-lg-<?php echo intval( $section_items_column ); ?> col-sm-6">
                            <div class="feature_item">
                                <?php
                                if( ! empty( $value[ 'services_image' ] ) ) {
	                                ?>
                                    <div class="f_icon">
                                        <img src="<?php echo esc_url( $value['services_image'] ); ?>" alt="">
                                    </div>
	                                <?php
                                }
                                    ?>
                                <h4><?php echo esc_html( $value[ 'service_title' ] ); ?></h4>
                                <p><?php echo wp_kses_post( $value[ 'service_description' ] ); ?></p>
                                <?php
                                if( ! empty( $value[ 'service_url' ] ) ) {
	                                ?>
                                    <a class="more_btn"
                                       href="<?php echo esc_url( $value['service_url'] ); ?>"><?php esc_html_e( 'Read More', 'sierra' ); ?></a>
	                                <?php
                                }
                                    ?>
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