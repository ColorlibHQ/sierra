<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
if( ! is_active_sidebar( 'sidebar-1' ) ){
    return;
}
?>

<div class="blog_right_sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>