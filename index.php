<?php get_header(); ?>

<?php sierra_page_banner(); ?>

<section class="blog_main_area p_100">
	<div class="container">
		<div class="row">
			<?php $sierra_page_layout = Sierra_Helper::get_layout(); ?>
			<div class="<?php echo ( 1 === $sierra_page_layout['columnsCount'] && ! is_active_sidebar( 'sidebar-1' ) ) ? 'col-sm-12' : 'col-sm-' . esc_attr( $sierra_page_layout['columns']['content']['span'] ); ?>">
                <div class="blog_main_inner">
	                <?php
	                if( have_posts() ) :
		                while ( have_posts() ) : the_post();
			                get_template_part( 'template-parts/content', get_post_format() );
		                endwhile;
	                else:
		                get_template_part( 'template-parts/content', 'none' );
	                endif;
	                ?>
	                <?php
	                /**
	                 * Function call for post pagination
	                 */
	                sierra_post_pagination();
	                ?>
                </div>
			</div>
			<?php if ( 'right-sidebar' === $sierra_page_layout['type'] && is_active_sidebar( 'sidebar-1' ) ) { ?>
			<div class="col-lg-<?php echo esc_attr( $sierra_page_layout['columns']['sidebar']['span'] ); ?>">
				<?php get_sidebar(); ?>
			</div>
            <?php } ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
