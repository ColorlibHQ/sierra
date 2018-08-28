<?php
/**
 * Sierra Theme Profile Fields
 *
 * @package Sierra
 * @since   1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class Sierra_Profile_Fields
 */
class Sierra_Profile_Fields {

	/**
	 * Sigma_Shop_Profile_Fields constructor.
	 */
	public function __construct() {
		add_filter( 'user_contactmethods', array( $this, 'add_social_media_fields' ), 10, 1 );
	}

	/**
	 * Adds the new social media fields to the standard WP
	 *
	 * @param array $social Social Media Fields.
	 *
	 * @return mixed
	 */
	public function add_social_media_fields( $social ) {
		$new_socials = array(
			'twitter'     => 'Twitter',
			'facebook'    => 'Facebook',
			'github'      => 'GitHub',
			'youtube'     => 'YouTube',
			'google-plus' => 'Google Plus',
			'linkedin'    => 'LinkedIn',
		);

		return array_merge( $social, $new_socials );
	}

	/**
	 * Print social media icons
	 */
	public static function echo_social_media() {

		$socials = array(
			'twitter'     => get_the_author_meta( 'twitter' ),
			'facebook'    => get_the_author_meta( 'facebook' ),
			'github'      => get_the_author_meta( 'github' ),
			'youtube'     => get_the_author_meta( 'youtube' ),
			'google-plus' => get_the_author_meta( 'google-plus' ),
		);

		$socials = array_filter( $socials );

		$html = '<span class="author-bio-social">';
		foreach ( $socials as $k => $v ) {
			$html .= '<a href="' . esc_url( $v ) . '" target="_blank"><span class="fa fa-' . esc_attr( $k ) . '"></span></a>';
		}
		$html .= '</span><!-- end .author-bio-social -->';

		echo wp_kses_post( $html );
	}
}
