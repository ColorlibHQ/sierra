<?php get_header(); ?>

<!--================Blog Main Area =================-->
<section class="blog_main_area p_100">
	<div class="container">
		<div class="row">
			<?php $sierra_page_layout = Sierra_Helper::get_layout(); ?>
            <div class="<?php echo ( 1 === $sierra_page_layout['columnsCount'] && ! is_active_sidebar( 'sidebar-1' ) ) ? 'col-sm-12' : 'col-sm-' . esc_attr( $sierra_page_layout['columns']['content']['span'] ); ?>">
                <div class="single_blog_inner">
	                <?php
	                if( have_posts() ) :
		                while ( have_posts() ) : the_post();
			                get_template_part( 'template-parts/content', get_post_format() );
			                // If comments are open or we have at least one comment, load up the comment template.
			                if ( comments_open() || get_comments_number() ) :
				                comments_template();
			                endif;
		                endwhile;
	                endif;
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
<!--================End Blog Main Area =================-->
<?php get_footer(); ?>
