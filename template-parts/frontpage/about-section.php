<?php
$elements = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_section_' . get_the_ID(), get_the_ID() );
$fields = $elements->sections[ $section_id ];
$attr_helper = new Epsilon_Section_Attr_Helper( $fields, 'about', Sierra_Repeatable_Sections::get_instance() );
$parent_attr = array(
	'class' => array( 'challange_area', 'p_100', 'ewf-section', 'contrast' ),
	'style' => array( 'background-image', 'background-position', 'background-size', 'background-repeat'),
);
$get_col = $fields['about_image'] ? '6' : '12';
?>

<section data-customizer-section-id="sierra_repeatable_section" data-section="<?php echo esc_attr( $section_id ); ?>">
	<div <?php $attr_helper->generate_attributes($parent_attr); ?>>
		<?php
		$attr_helper->generate_color_overlay();
		?>
        <div class="<?php echo esc_attr( Sierra_Helper::container_class( 'about', $fields ) ); ?>">
			<?php echo wp_kses( Epsilon_Helper::generate_pencil( 'Sierra_Repeatable_Sections', 'about' ), Epsilon_Helper::allowed_kses_pencil() ); ?>
            <div class="row">
				<?php
				if( $fields[ 'about_row_title_align' ] == 'left' ) {
					?>
                    <div class="col-lg-6">
                        <div class="challange_text_inner">
                            <div class="l_title">
                                <?php
                                if( ! empty( $fields['about_section_image'] ) ){
                                ?>
                                <img src="<?php echo esc_url( $fields['about_section_image'] ); ?>" alt="<?php echo wp_kses_post( $fields['about_section_title'] ); ?>">
                                <?php } ?>
                                <?php if( ! empty( $fields['about_section_subtitle'] ) ) { ?>
                                <h6><?php echo wp_kses_post( $fields['about_section_subtitle'] ); ?></h6>
                                <?php } ?>
                                <?php if( ! empty( $fields['about_section_title'] ) ){ ?>
                                <h2><?php echo wp_kses_post( $fields['about_section_title'] ); ?></h2>
                                <?php } ?>
                            </div>
                            <?php echo wp_kses_post( wpautop( $fields['about_text'] ) ); ?>
                            <?php if( ! empty( $fields['about_youtube_link'] ) ){ ?>
                            <div class="c_video">
                                <a class="popup-youtube" href="<?php echo esc_url( $fields['about_youtube_link'] ); ?>"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/video-icon.png"
                                            alt="">See how we work </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6 challange_img">
                        <?php if( ! empty( $fields['about_image'] ) ){ ?>
                        <div class="challange_img_inner">
                            <img class="img-fluid" src="<?php echo esc_url( $fields['about_image'] ); ?>" alt="<?php echo wp_kses_post( $fields['about_section_title'] ); ?>">
                        </div>
                        <?php } ?>
                    </div>
					<?php
				}
				else{
					?>
                    <div class="col-lg-6 challange_img">
                        <?php if( ! empty( $fields['about_image'] ) ) { ?>
                        <div class="challange_img_inner">
                            <img class="img-fluid" src="<?php echo esc_url( $fields['about_image'] ); ?>" alt="<?php echo wp_kses_post( $fields['about_section_title'] ); ?>">
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="challange_text_inner">
                            <div class="l_title">
		                        <?php
		                        if( ! empty( $fields['about_section_image'] ) ){
			                        ?>
                                    <img src="<?php echo esc_url( $fields['about_section_image'] ); ?>" alt="<?php echo wp_kses_post( $fields['about_section_title'] ); ?>">
		                        <?php } ?>
		                        <?php if( ! empty( $fields['about_section_subtitle'] ) ) { ?>
                                    <h6><?php echo wp_kses_post( $fields['about_section_subtitle'] ); ?></h6>
		                        <?php } ?>
		                        <?php if( ! empty( $fields['about_section_title'] ) ){ ?>
                                    <h2><?php echo wp_kses_post( $fields['about_section_title'] ); ?></h2>
		                        <?php } ?>
                            </div>
	                        <?php echo wp_kses_post( wpautop( $fields['about_text'] ) ); ?>
	                        <?php if( ! empty( $fields['about_youtube_link'] ) ){ ?>
                                <div class="c_video">
                                    <a class="popup-youtube" href="<?php echo esc_url( $fields['about_youtube_link'] ); ?>"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/video-icon.png"
                                                alt="">See how we work </a>
                                </div>
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