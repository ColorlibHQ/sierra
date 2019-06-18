<?php

if( ! function_exists( 'sierra_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sierra_setup(){
		 /*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'sierra' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		 /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		) );

		// Add theme support for Custom Logo.
		add_theme_support( 'custom-logo', array(
			'width'       => 250,
			'height'      => 250,
			'flex-width'  => true,
            'header-text'   => array( 'site-title', 'site-description' ),
		) );

		// Add theme support for custom header
		$header_info = array(
			'width'         => 1233,
			'height'        => 424,
			'default-image' => get_template_directory_uri() . '/assets/img/banner/banner-bg.png',
		);
		add_theme_support( 'custom-header', $header_info );

		// Add theme support for custom background

		add_theme_support( 'custom-background' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		// Set image size
		add_image_size( 'sierra-post-thumb', 825, 246, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary'     => esc_html__( 'Main Menu', 'sierra' ),
			)
		);
		if ( ! isset( $content_width ) ) $content_width = 900;
		// Enable Shortcodes in widgets
		add_filter( 'widget_text', 'do_shortcode' );

	}
	add_action( 'after_setup_theme', 'sierra_setup' );
endif;

if( ! function_exists( 'sierra_widget' ) ) :
	/**
	 * Registers a widget area.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
	 *
	 */
	function sierra_widget(){
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'sierra' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'sierra' ),
				'before_widget' => '<article id="%1$s" class="r_widget widget %2$s">',
				'after_widget'  => '</article>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer One', 'sierra' ),
				'id'            => 'footer-sidebar-1',
				'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'sierra' ),
				'before_widget' => '<article id="%1$s" class="f_widget widget %2$s">',
				'after_widget'  => '</article>',
				'before_title'  => '<div class="f_title"><h3>',
				'after_title'   => '</h3></div>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Two', 'sierra' ),
				'id'            => 'footer-sidebar-2',
				'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'sierra' ),
				'before_widget' => '<article id="%1$s" class="f_widget widget %2$s">',
				'after_widget'  => '</article>',
				'before_title'  => '<div class="f_title"><h3>',
				'after_title'   => '</h3></div>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Three', 'sierra' ),
				'id'            => 'footer-sidebar-3',
				'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'sierra' ),
				'before_widget' => '<article id="%1$s" class="f_widget widget %2$s">',
				'after_widget'  => '</article>',
				'before_title'  => '<div class="f_title"><h3>',
				'after_title'   => '</h3></div>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Four', 'sierra' ),
				'id'            => 'footer-sidebar-4',
				'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'sierra' ),
				'before_widget' => '<article id="%1$s" class="f_widget widget %2$s">',
				'after_widget'  => '</article>',
				'before_title'  => '<div class="f_title"><h3>',
				'after_title'   => '</h3></div>',
			)
		);
	}
	add_action( 'widgets_init', 'sierra_widget' );
endif;

if( ! function_exists( 'sierra_scripts' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function sierra_scripts(){
		// css
		wp_enqueue_style( 'sierra-style', get_stylesheet_uri() );
		wp_enqueue_style( 'font-awesome-min-css', get_theme_file_uri( '/assets/css/font-awesome.min.css' ), array() );
		wp_enqueue_style( 'bootstrap-min-css', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) );
		wp_enqueue_style( 'settings-css', get_theme_file_uri( '/assets/vendors/revolution/css/settings.css' ) );
		wp_enqueue_style( 'layers-css', get_theme_file_uri( '/assets/vendors/revolution/css/layers.css' ) );
		wp_enqueue_style( 'navigation-css', get_theme_file_uri( '/assets/vendors/revolution/css/navigation.css' ) );
		wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/vendors/owl-carousel/owl.carousel.min.css' ) );
		wp_enqueue_style( 'magnific-popup-css', get_theme_file_uri( '/assets/vendors/magnify-popup/magnific-popup.css' ) );
		wp_enqueue_style( 'theme-style', get_theme_file_uri( '/assets/css/style.css' ) );
		wp_enqueue_style( 'responsive', get_theme_file_uri( '/assets/css/responsive.css' ) );
		// js
		//Include all compiled plugins (below), or include individual files as needed
		//wp_enqueue_script( 'jquery-3-2-1-min', get_theme_file_uri('/assets/js/jquery-3.2.1.min.js'), array( 'jquery' ), false, true );


		wp_enqueue_script( 'popper-min-js', get_theme_file_uri('/assets/js/popper.min.js'), array( 'jquery' ), false, true );
		wp_enqueue_script( 'bootstrap-min-js', get_theme_file_uri('/assets/js/bootstrap.min.js'), array( 'jquery' ), false, true );
		// Rev slider js
		wp_enqueue_script( 'themepunch-tools', get_theme_file_uri( '/assets/vendors/revolution/js/jquery.themepunch.tools.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'themepunch-revolution', get_theme_file_uri( '/assets/vendors/revolution/js/jquery.themepunch.revolution.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'revolution-extension-actions', get_theme_file_uri( '/assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'revolution-extension.video', get_theme_file_uri( '/assets/vendors/revolution/js/extensions/revolution.extension.video.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'revolution-extension.slideanims', get_theme_file_uri( '/assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'revolution-extension.layeranimation', get_theme_file_uri( '/assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'revolution-extension.navigation', get_theme_file_uri( '/assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'revolution-extension.slideanims', get_theme_file_uri( '/assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js' ), array( 'jquery' ), false, true );
		// Extra plugin js
		wp_enqueue_script( 'jquery-waypoints', get_theme_file_uri( '/assets/vendors/counterup/jquery.waypoints.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-counterup', get_theme_file_uri( '/assets/vendors/counterup/jquery.counterup.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'apear', get_theme_file_uri( '/assets/vendors/counterup/apear.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'countto', get_theme_file_uri( '/assets/vendors/counterup/countto.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'owl-carousel', get_theme_file_uri( '/assets/vendors/owl-carousel/owl.carousel.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-magnific-popup', get_theme_file_uri( '/assets/vendors/magnify-popup/jquery.magnific-popup.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'smoothscroll', get_theme_file_uri( '/assets/js/smoothscroll.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'circle-progress', get_theme_file_uri( '/assets/vendors/circle-bar/circle-progress.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'plugins', get_theme_file_uri( '/assets/vendors/circle-bar/plugins.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'imagesloaded-pkgd', get_theme_file_uri( '/assets/vendors/isotope/imagesloaded.pkgd.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/vendors/isotope/isotope.pkgd.min.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'circle-active', get_theme_file_uri( '/assets/js/circle-active.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery.instagramFeed.min', get_theme_file_uri( '/assets/js/jquery.instagramFeed.min.js' ), array( 'jquery' ), false, true );
        // Google Map API Js
		if( is_page() ){
			$api_key = get_theme_mod('sierra_google_api_key','AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE');
			if( $api_key != '' ) {
				wp_enqueue_script('sierra-map_api', 'http://maps.googleapis.com/maps/api/js?key='.$api_key, array('jquery'),false,true );
				wp_enqueue_script( 'gmaps', get_theme_file_uri( '/assets/js/gmaps.min.js' ), array( 'jquery' ), false, true );
			}
		}

		wp_enqueue_script( 'theme', get_theme_file_uri( '/assets/js/theme.js' ), array( 'jquery' ), false, true );
		// Comments replay
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		add_editor_style( '/assets/css/custom-editor-style.css' );
	}
	add_action( 'wp_enqueue_scripts', 'sierra_scripts' );
endif;

// Required theme custom function
require get_parent_theme_file_path( '/inc/template-functions.php' );

// Required theme common css
require get_parent_theme_file_path( '/inc/common-css.php' );

// Required custom widget
require get_parent_theme_file_path( '/inc/widget/widget_setting.php' );

// Required WP bootstrap nav walker class
require get_parent_theme_file_path( '/inc/sierra-wp-bootstrap-navwalker.php' );

// Add custom plugin for TGM
require get_parent_theme_file_path( '/inc/class-tgm-plugin-activation.php' );
require get_parent_theme_file_path( '/inc/sierra_add_plugin.php' );



// theme option callback
function sierra_opt( $id = null, $default = '' ) {

    $opt = get_theme_mod( $id, $default );

    $data = '';

    if( $opt ) {
        $data = $opt;
    }

    return $data;
}



/**
 * Load Autoloader
 */
require_once 'inc/class-sierra-autoloader.php';
// Instance for Epsilon Framework
if( class_exists( 'Epsilon_Framework' ) ){
	$sierra = Sierra::get_instance();
}

