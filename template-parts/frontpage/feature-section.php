<?php
$section_id = !empty( $section_id ) ? $section_id : '';
$elements = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields = $elements->sections[ $section_id ];

$grouping = array(
        'values'   => $fields['feature_grouping'],
        'group_by' => 'feature_title'
);
$fields['feature'] = $elements->get_repeater_field( $fields['feature_repeater_field'], array(), $grouping );
$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'feature', Sierra_Repeatable_Sections::get_instance() );
$parent_attr = array(
	'class' => array( 'feature_area', 'ewf-section', 'contrast' ),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat')
);

$section_items_column = 12 / intval( $fields[ 'feature_column_group' ] );
?>

<section data-customizer-section-id="sierra_repeatable_section_<?php echo esc_attr( $section_id ); ?>" data-section="<?php echo esc_attr( $section_id ); ?>">
	<div <?php $attr_helper->generate_attributes($parent_attr); ?>>
		<?php
		$attr_helper->generate_video_overlay();
		$attr_helper->generate_color_overlay();
		?>
        <div class="<?php echo esc_attr( Sierra_Helper::container_class( 'feature', $fields ) ); ?>">
			<?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Sierra_Repeatable_Sections', 'feature' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
            <div class="c_title">
                <?php
                if( ! empty( $fields[ 'feature_section_image' ] ) ) {
	                ?>
                    <img src="<?php echo esc_url( $fields['feature_section_image'] ); ?>"
                         alt="<?php echo esc_html( $fields['feature_section_title'] ); ?>">
	                <?php
                }
                if( ! empty( $fields[ 'feature_section_subtitle' ] ) ) {
	                ?>
                    <h6><?php echo esc_html( $fields['feature_section_subtitle'] ); ?></h6>
	                <?php
                }
                if( ! empty( $fields[ 'feature_section_title' ] ) ) {
	                ?>
                    <h2><?php echo esc_html( $fields['feature_section_title'] ); ?></h2>
	                <?php
                }
                ?>
            </div>
            <div class="row feature_inner">
				<?php
                echo '<pre>';
                print_r($fields);
                echo '</pre>';
				foreach ( $fields['feature'] as $key => $value ){
					?>
                    <div class="col-lg-<?php echo intval( $section_items_column ); ?> col-sm-6">
                        <div class="feature_item">
                            <div class="f_icon">
                                <?php
                                if ( ! empty( $value[ 'feature_image' ] ) ){
                                ?>
                                <img src="<?php echo esc_url( $value[ 'feature_image' ] ); ?>" alt="<?php echo esc_html( $value[ 'feature_title' ] ); ?>">
                                <?php } ?>
                            </div>
                            <h4><?php echo esc_html( $value[ 'feature_title' ] ); ?></h4>
                            <p><?php echo esc_html( $value[ 'feature_text' ] ); ?></p>
                            <?php
                            if( ! empty( $value[ 'feature_url' ] ) ){
                            ?>
                            <a class="more_btn" href="<?php echo esc_url( $value[ 'feature_url' ] ); ?>"><?php echo esc_html( 'Read More', 'sierra' ); ?></a>
                            <?php } ?>
                        </div>
                    </div>
				<?php } ?>
            </div>
        </div>
    </div>
</section>