<?php get_header(); ?>

<?php sierra_page_banner(); ?>

<section class="blog_main_area p_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
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
            <div class="col-lg-3">
				<?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
