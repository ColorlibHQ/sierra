<?php get_header(); ?>

<?php sierra_page_banner(); ?>
<section class="blog_main_area p_100">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="blog_main_inner">
					<div class="s_blog_main">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'sierra' ); ?></h1>
						</header><!-- .page-header -->
						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'sierra' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .page-content -->
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
