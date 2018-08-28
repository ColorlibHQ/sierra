<?php

/**
 * Custom Page banner
 */
if( ! function_exists( 'sierra_page_banner' ) ) {
	function sierra_page_banner(){
	    global $post;
		$value = get_post_meta( $post->ID, 'sierra_page_subtitle_meta', true );
		?>
		<section class="banner_area">
			<div class="container">
				<div class="banner_inner_text">
					<h2><?php echo esc_html( get_the_title() ); ?></h2>
                    <?php if( ! empty( $value ) ){ ?>
					<p><?php echo esc_html( $value ); ?></p>
                    <?php } ?>
				</div>
			</div>
		</section>
		<?php
	}
}

/*
 * Portfolio Shortcode
 */
if( ! function_exists( 'sierra_portfolio_shortcode' ) ){
	function sierra_portfolio_shortcode( $atts = null ){
    global $post;
	?>
	    <section class="portfolio_area">
            <div class="container">
                <div class="portfolio_filter">
                    <ul>
                        <li class="active" data-filter="*"><a href="#">All</a></li>
                        <?php
                        $args = array(
                            'post_type' => 'portfolio',
                        );
                        $ierra_portfolio = new WP_Query( $args );
                        while ( $ierra_portfolio->have_posts() ) : $ierra_portfolio->the_post();
                            $sierra_portfolio_cat = get_the_terms( $post->ID, 'portfolio_category' );
                            foreach ( $sierra_portfolio_cat as $sierra_cat_name ){
                                $sierra_cat_name_arg[$sierra_cat_name->name] = $sierra_cat_name->slug;
                            }
                        endwhile;
                        $sierra_cat_name_val = array_unique($sierra_cat_name_arg);
                        ?>
                        <?php
                        foreach ( $sierra_cat_name_val as $key => $value ) {
                        ?>
                            <li data-filter=".<?php print $value; ?>"><a href="#"><?php print $key; ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="ms_portfolio_inner">
                <?php
                    $ierra_portfolio = new WP_Query( $args );
                    while ( $ierra_portfolio->have_posts() ) : $ierra_portfolio->the_post();
                        $s = '';
                        $sierra_portfolio_cat_name = get_the_terms( $post->ID, 'portfolio_category' );
                        foreach ( $sierra_portfolio_cat_name as $key => $value ) {
                            $s .=  $value->slug.' ';
                        }
                        ?>
                            <div class="ms_p_item wd_25 <?php print $s; ?>">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php

                    endwhile;
                ?>
            </div>
        </section>
        <?php
    }
	add_shortcode( 'sierra_portfolio', 'sierra_portfolio_shortcode' );
}

/**
 * Page meta box for banner subtitle
 */
function sierra_page_subtitle_meta() {
	add_meta_box( 'page-subtitle-meta-box-id', esc_html__( 'Page Subtitle', 'sierra' ), 'sierra_meta_display_callback', 'page' );
}
add_action( 'add_meta_boxes', 'sierra_page_subtitle_meta' );
function sierra_meta_display_callback( $post ) {
	$value = get_post_meta( $post->ID, 'sierra_page_subtitle_meta', true );
	?>
    <label for="text_field">
		<?php esc_html_e( 'Page Subtitle :', 'sierra' ); ?>
    </label>
    <input type="text" id="text_field" name="sierra_page_meta_value" value="<?php echo esc_attr( $value ); ?>" size="25" />
	<?php
}
function sierra_save_meta_box( $post_id ) {
    $get_post_name = get_post_type( $post_id );
    if( $get_post_name == 'page' ) {
        if(isset($_POST['sierra_page_meta_value'] )){
	        update_post_meta( $post_id, 'sierra_page_subtitle_meta',$_POST['sierra_page_meta_value'] );
        }

    }
}
add_action( 'save_post', 'sierra_save_meta_box' );

/**
 * Custom function for post pagination
 */
if( ! function_exists( 'sierra_post_pagination' ) ) {
	function sierra_post_pagination(){
		the_posts_pagination( array(
			'prev_text'  => esc_html__( '&laquo;', 'sierra' ),
			'next_text'  => esc_html__( '&raquo;', 'sierra' ),
			'mid_size'   => 2,
			'screen_reader_text'    => ' ',
		) );
	}
}

/**
 * Custom function for social share blog post
 */
function hopecharity_post_share(){

	?>
    <div class="share">
        <label><?php esc_html_e( 'Share:', '' ); ?> </label>
        <div class="share-social">
            <a href="<?php print esc_url( $facebookURL ) ?>"><i class="fa fa-facebook"></i></a>
            <a href="<?php print esc_url( $twitterURL ) ?>"><i class="fa fa-twitter"></i></a>
            <a href="<?php print esc_url( $googleURL ) ?>"><i class="fa fa-google-plus"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
        </div>
    </div>
	<?php
}
if( ! function_exists( 'sierra_post_share' ) ) {
	function sierra_post_share(){
		global $post;
		// Get current page URL
		$crunchifyURL = get_permalink();

		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		$pinterestURL = 'https://www.pinterest.com/share?url='.$crunchifyURL;
		$behanceURL = 'https://www.behance.net/share?url='.$crunchifyURL;
		$linkedinURL = 'https://www.linkedin.com/share?url='.$crunchifyURL;
		?>
		<div class="s_blog_social">
			<h3><?php esc_html_e( 'Share', 'sierra' ); ?></h3>
			<ul>
				<li><a href="<?php print esc_url( $facebookURL ) ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="<?php print esc_url( $twitterURL ) ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="<?php print esc_url( $googleURL ) ?>"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                <li><a href="<?php print esc_url( $pinterestURL ) ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a href="<?php print esc_url( $behanceURL ) ?>"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
				<li><a href="<?php print esc_url( $linkedinURL ) ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		<?php
	}
}

/**
 * Blog post date format that control from 'general setting'
 */
function sierra_post_date_format(){
	?>
    <h4><?php the_time('j' ); ?></h4>
    <h5><?php the_time('F, Y' ); ?></h5>
    <?php
}

/**
 *
 */
if(!function_exists('sierra_excerpt')):
	function sierra_excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt);
		} else {
			$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
		return $excerpt;
	}
endif;

/**
 * Custom function for author bio
 */
if( ! function_exists( 'sierra_author_bio' ) ) {
	function sierra_author_bio(){
		?>
		<div class="blog_author">
			<div class="media">
                <?php
                $avatar = get_avatar(get_the_author_meta('user_email' ),84 );
                ?>
				<div class="d-flex">
					<?php print $avatar; ?>
				</div>
				<div class="media-body">
					<h4><?php echo get_the_author_meta( 'display_name' ); ?>, <span><?php esc_html_e('Author', 'sierra' ); ?></span></h4>
					<p><?php echo get_the_author_meta( 'user_description' ); ?></p>
				</div>
			</div>
		</div>
		<?php
	}
}

/*
 * Function for comment list
 */
if( ! function_exists( 'sierra_comment_list' ) ){
	function sierra_comment_list( $comment, $args, $depth ){
		$GLOBALS['comment'] = $comment;
		?>
        <div id="comment-<?php comment_ID(); ?>" class="media">
	        <?php echo get_avatar( $comment, 52 ); ?>
            <div class="d-flex">
                <h4><?php print $comment->comment_author; ?></h4>
                <h5><?php echo get_comment_date(); ?></h5>
            </div>
            <div class="media-body">
	            <?php comment_text(); ?>
	            <?php
	            comment_reply_link( array_merge(
		            $args, array(
			            'depth' => $depth,
			            'max_depth' => $args['max_depth'],
			            'reply_text' => esc_html__( 'Reply', 'sierra' ),
		            )
	            ) );
	            ?>
            </div>
        </div>
		<?php
	}
}

/**
 * Sierra custom style
 */
if( ! function_exists( 'sierra_custom_style' ) ){
	function sierra_custom_style(){
		$img = get_custom_header();
		$sierra_banner_img = $img->url;
	    $custom_style = '<style type="text/css">';
		$custom_style .='
        .banner_area:before {
            content: "";
            background: url('.$sierra_banner_img.') no-repeat scroll center left;
            position: absolute;
            right: 0px;
            top: 0px;
            height: 100%;
            width: 100%;
            background-size: cover;
        }
        ';
		$custom_style .= '</style>';
	    print $custom_style;
    }
	add_action( 'wp_head', 'sierra_custom_style' );
}

/**
 * Hide epsilon framework quick bar
 */
add_filter( 'show_epsilon_quickie_bar', function (){
    return false;
} );

