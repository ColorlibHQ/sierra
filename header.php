<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!--================Header Menu Area =================-->
<header class="main_menu_area">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<?php
		if ( ! function_exists( 'the_custom_logo' ) ) {
			if ( has_custom_logo() ) {
				Epsilon_Helper::get_image_with_custom_dimensions( 'sierra_logo_dimensions' );
			}
			else{
				?>
                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name')?></a>
				<?php
			}
		}
		?>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span></span>
			<span></span>
			<span></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<?php
			wp_nav_menu( array(
				'theme_location'    => 'primary',
				'container'         => true,
				'menu_class'        => 'navbar-nav',
				'depth'             => 3,
				'fallback_cb'       => '',
				'walker'            => new Sierra_wp_bootstrap_navwalker()
			) );
			?>
		</div>
	</nav>
</header>