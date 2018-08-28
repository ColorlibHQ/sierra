<?php
$elements = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields = $elements->sections[ $section_id ];
$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'cta', Sierra_Repeatable_Sections::get_instance() );
$parent_attr = array(
	'class' => array( 'talk_area', 'ewf-section', 'contrast' ),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat'),
);
?>
<section data-customizer-section-id="sierra_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
	<div <?php $attr_helper->generate_attributes( $parent_attr ); ?>>
        <?php $attr_helper->generate_color_overlay(); ?>
        <div class="<?php echo esc_attr( Sierra_Helper::container_class( 'cta', $fields ) ); ?>">
			<?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Sierra_Repeatable_Sections', 'cta' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
            <div class="talk_text">
				<?php if( ! empty( $fields[ 'cta_title' ] ) ){ ?>
                    <h4><?php echo esc_html( $fields[ 'cta_title' ] ); ?></h4>
				<?php } ?>
				<?php if( ! empty( $fields[ 'cta_email' ] ) ){ ?>
                    <a href="mailto:<?php echo esc_html( $fields[ 'cta_email' ] ); ?>"><?php echo esc_html( $fields[ 'cta_email' ] ); ?></a>
				<?php } ?>
            </div>
        </div>
    </div>
</section>