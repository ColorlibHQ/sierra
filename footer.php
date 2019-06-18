<!--================Footer Area =================-->
<footer class="footr_area">
    <?php
    if( is_active_sidebar( 'footer-sidebar-1' ) || is_active_sidebar( 'footer-sidebar-2' ) || is_active_sidebar( 'footer-sidebar-3' ) ) {
	    $footer_bg_url = get_theme_mod( 'sierra_footer_bg', true );
        $footerbgImg = json_decode( $footer_bg_url );
	    $footer_bg     = !empty( $footerbgImg->url ) ? 'style="background-image:url( '. esc_url( $footerbgImg->url ) .' )"' : '';

        ?>
        <div class="footer_widget_area" <?php echo $footer_bg; ?>>
            <div class="container">
                <div class="row footer_widget_inner">
				    <?php get_sidebar( 'footer' ); ?>
                </div>
            </div>
        </div>
	    <?php
    }
    ?>
	<div class="footer_copyright">
		<div class="container">
			<div class="float-sm-left">
				<h5>
					<?php
                    $url = 'https://colorlib.com';
                    $footerText = sprintf( 'COPYRIGHT ©2019 ALL RIGHTS RESERVED | THIS TEMPLATE IS MADE WITH BY <a href="%s">COLORLIB</a>', $url  );
					echo wp_kses_post( get_theme_mod( 'sierra_copyright_contents', $footerText ) );
					?>
                </h5>
			</div>
			<div class="float-sm-right">
				<ul>
                    <?php
                    $fb_url = get_theme_mod( 'sierra_footer_facebook', true );
                    $tw_url = get_theme_mod( 'sierra_footer_twitter', true );
                    $li_url = get_theme_mod( 'sierra_footer_linkedin', true );
                    $pi_url = get_theme_mod( 'sierra_footer_pinterest', true );
                    $dr_url = get_theme_mod( 'sierra_footer_dribbble', true );
                    $be_url = get_theme_mod( 'sierra_footer_behance', true );
                    if( ! empty( $fb_url ) ){
                        ?>
					<li><a href="<?php echo esc_url( $fb_url ); ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php } ?>
					<?php if( ! empty( $tw_url ) ){ ?>
                    <li><a href="<?php echo esc_url( $tw_url ); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
					<?php if( ! empty( $li_url ) ){ ?>
                    <li><a href="<?php echo esc_url( $li_url ); ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php } ?>
					<?php if( ! empty( $pi_url ) ){ ?>
					<li><a href="<?php echo esc_url( $pi_url ); ?>"><i class="fa fa-pinterest"></i></a></li>
                    <?php } ?>
					<?php if( ! empty( $dr_url ) ){ ?>
					<li><a href="<?php echo esc_url( $dr_url ); ?>"><i class="fa fa-dribbble"></i></a></li>
                    <?php } ?>
					<?php if( ! empty( $be_url ) ){ ?>
					<li><a href="<?php echo esc_url( $be_url ); ?>"><i class="fa fa-behance"></i></a></li>
                    <?php } ?>

				</ul>
			</div>
		</div>
	</div>
</footer>
<!--================End Footer Area =================-->

<?php wp_footer(); ?>
</body>
</html>