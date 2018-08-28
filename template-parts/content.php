<?php if( is_single() ) : ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class( 's_blog_main' ); ?>>
        <div class="blog_img">
            <?php
	            if( get_theme_mod( 'sierra_show_single_post_thumbnail', true ) ) {
		            if ( has_post_thumbnail() ) {
			            the_post_thumbnail( 'sierra-post-thumb', array( 'class' => 'img-fluid' ) );
		            } else {
			            ?>
                        <img class="img-fluid"
                             src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/blog-placeholder.png"
                             alt="">
			            <?php
		            }
	            }
            if( get_theme_mod( 'sierra_show_single_post_date', true ) ) {
	            ?>
                <div class="blog_date">
		            <?php sierra_post_date_format(); ?>
                </div>
	            <?php
            }
            ?>
        </div>
        <div class="blog_text">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <div class="blog_author">
                <?php
	                if( get_theme_mod( 'sierra_enable_author_box', true ) ) {
		                ?>
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_html_e( 'By', 'sierra' ); ?><?php echo get_the_author_meta( 'display_name' ); ?></a>
		                <?php
	                }
                ?>
                <?php
                $sierra_post_category = get_the_category();
                ?>
                <a href="<?php echo esc_url( get_category_link( $sierra_post_category[0]->term_id ) ); ?>"><?php print $sierra_post_category[0]->name; ?></a>
            </div>
            <?php the_content(); ?>
            <?php
	        if( get_theme_mod( 'sierra_show_single_post_tags', true ) ) {
		        if ( has_tag() ) :
			        ?>
                    <div class="s_blog_tags">
                        <h3><?php esc_html_e( 'Tags :', 'sierra' ); ?></h3>
                        <ul>
					        <?php
					        $sierra_tag = get_the_tags();
					        foreach ( $sierra_tag as $tags ) {
						        echo '<li><a href="' . get_tag_link( $tags->term_id ) . '">' . $tags->name . '</a>,</li>';
					        }
					        ?>
                        </ul>
                    </div>
		        <?php
		        endif;
	        }
            ?>
            <?php
            if( get_theme_mod( 'sierra_show_single_post_categories', true ) ) {
	            if ( has_category() ) :
		            ?>
                    <div class="s_blog_category">
                        <h3><?php esc_html_e( 'Category :', 'sierra' ); ?></h3>
                        <ul>
				            <?php
				            $categories = get_the_category();
				            if ( ! empty( $categories ) ) {
					            echo '<li><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></li>';
				            }
				            ?>
                        </ul>
                    </div>
	            <?php
	            endif;
            }
            ?>
	        <?php
	        wp_link_pages( array(
		        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sierra' ),
		        'after'  => '</div>',
	        ) );
	        ?>
        </div>
    </div>
    <?php sierra_post_share(); ?>
    <?php sierra_author_bio(); ?>
<?php else: ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class( 'blog_main_item' ); ?>>
        <div class="blog_img">
            <?php
            if( get_theme_mod( 'sierra_show_single_post_thumbnail', true ) ) {
	            if ( has_post_thumbnail() ) {
		            the_post_thumbnail( 'sierra-post-thumb', array( 'class' => 'img-fluid' ) );
	            } else {
		            ?>
                    <img class="img-fluid"
                         src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/blog-placeholder.png" alt="">
		            <?php
	            }
            }

            if( get_theme_mod( 'sierra_show_single_post_date', true ) ) {
            ?>
                <div class="blog_date">
		            <?php sierra_post_date_format(); ?>
                </div>
	            <?php
            }
            ?>
        </div>
        <div class="blog_text">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <div class="blog_author">
                <?php
                if( get_theme_mod( 'sierra_enable_author_box', true ) ) {
	                ?>
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_html_e( 'By', 'sierra' ); ?><?php echo get_the_author_meta( 'display_name' ); ?></a>
	                <?php
                }
                ?>
                <?php
                if( get_theme_mod( 'sierra_show_single_post_categories', true ) ) {
	                $categories = get_the_category();
	                ?>
                    <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>"><?php echo esc_html( $categories[0]->name ); ?></a>
	                <?php
                }
                ?>
            </div>
            <p><?php echo sierra_excerpt( '45' ); ?></p>
            <a class="more_btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'sierra' ); ?></a>
        </div>
    </div>

<?php endif; ?>