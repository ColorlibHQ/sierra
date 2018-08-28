<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @version sierra 1.0
 */

if ( post_password_required() ) {
	return;
}
?>

<?php if( get_comments_number() > 0 ) : ?>
<div class="blog_comment">
	<h3><?php esc_html_e( 'Comments', 'sierra' ); ?> (<?php print number_format_i18n(get_comments_number() ); ?>)</h3>
    <?php
    wp_list_comments( array(
        'callback'    => 'sierra_comment_list',
        'short_ping'  => true,
    ) );
    ?>
    <div class="nav-links">
        <?php the_comments_pagination(); ?>
    </div>
</div>
<?php endif; ?>

<div class="blog_comment_form">
	<div class="contact_us_form">
		<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ($req ? " aria-required='true' " : '');
		$required_text = ' ';
		$comment_form_arg = array(
			'class_submit'  => 'btn submit_btn form-control',
			'label_submit'  => esc_html__( 'Send', 'sierra' ),
			'title_reply'   => esc_html__( 'Leave a comments', 'sierra' ),
			'comment_notes_before' => '',
			'fields'        => apply_filters( 'comment_form_default_fields', array(
				'author'    => '<div class="row"><div class="form-group col-sm-6"><input type="text"' . $aria_req . ' name="author" class="form-control" placeholder="Name" value="'.esc_attr( $commenter['comment_author'] ).'"></div>',
				'email'    => '<div class="form-group col-sm-6"><input type="email"' . $aria_req . ' name="email" class="form-control" placeholder="E-mail" value="'.esc_attr(  $commenter['comment_author_email'] ).'"></div></div>'
			) ),
			'comment_field' => '<div class="row"><div class="form-group col-sm-12"><textarea name="comment" rows="1" class="form-control" placeholder="Message"></textarea></div></div>',
		);
		comment_form( $comment_form_arg );
		?>
	</div>
</div>