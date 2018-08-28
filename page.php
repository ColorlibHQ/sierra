<?php
/**
 * The template for displaying pages
 *
 * @package sierra
 */

get_header();

sierra_page_banner();
?>
<?php
$page_layout = Sierra_Helper::get_layout( 'sierra_page_layout' );
if( class_exists( 'Epsilon_Page_Generator' ) ){
	$sierra_page_layout = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_sections_' . get_the_ID(), get_the_ID() );
}

if ( ! empty( $sierra_page_layout -> sections ) ) :
	$sierra_page_layout -> generate_output();
else :
	?>
    <section class="blog_main_area p_100">
        <div class="container">
            <div class="row">
	            <?php if ( 'left-sidebar' === $page_layout['type'] && is_active_sidebar( 'sidebar-1' ) ) { ?>
                <div class="col-lg-<?php echo esc_attr( $page_layout['columns']['sidebar']['span'] ); ?>">
		            <?php get_sidebar(); ?>
                </div>
                <?php } ?>
                <div class="<?php echo ( 1 === $page_layout['columnsCount'] && ! is_active_sidebar( 'sidebar' ) ) ? 'col-sm-12' : 'col-sm-' . esc_attr( $page_layout['columns']['content']['span'] ); ?>">
                    <div class="blog_main_inner">
                        <div class="s_blog_main">
							<?php
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content', 'page' );
							endwhile;
							?>
                        </div>
						<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sierra' ),
							'after'  => '</div>',
						) );
						?>
                        <div class="sierra_clear"></div>
						<?php
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
						?>
                    </div>
                </div>
	            <?php if ( 'right-sidebar' === $page_layout['type'] && is_active_sidebar( 'sidebar-1' ) ) { ?>
                    <div class="col-lg-<?php echo esc_attr( $page_layout['columns']['sidebar']['span'] ); ?>">
			            <?php get_sidebar(); ?>
                    </div>
	            <?php } ?>
            </div>
        </div>
    </section>
<?php
endif;
get_footer();
