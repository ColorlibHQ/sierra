<?php
/**
 * Class that renders repeater blocks readable
 *
 * @package Sierra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Sierra_Post_Parser {
	/**
	 * Sierra_Post_Parser constructor.
	 *
	 * @param string $option
	 */
	public function __construct( $option = '' ) {

	}

	/**
	 * @return Sierra_Post_Parser
	 */
	public static function get_instance() {
		static $inst;
		if ( ! $inst ) {
			$inst = new Sierra_Post_Parser();
		}

		return $inst;
	}

	/**
	 * @param $control
	 * @param $value
	 * @param $id
	 *
	 * @return string
	 */
	public function parse_sierra_team_members( $control, $value, $id ) {
		$content = '';
		$content .= '<!-- epsilon/' . $id . ' -->' . "\n";

		foreach ( $value as $item ) {
			$content .= '<!-- epsilon/' . $control->label . '-->' . "\n";

			if ( ! empty( $item['member_image'] ) ) {
				$content .= '<img src="' . $item['member_image'] . '" />' . "\n";
			}
			if ( ! empty( $item['member_title'] ) ) {
				$content .= '<h3 class="member-name">' . $item['member_title'] . '</h3>' . "\n";
			}
			if ( ! empty( $item['member_text'] ) ) {
				/**
				 * This accepts editor, so we can wrap it in a div
				 */
				$content .= '<div class="member-description">' . $item['member_text'] . '</div>' . "\n";
			}

			$socials = array(
				'Facebook'  => ! empty( $item['member_social_facebook'] ) ? $item['member_social_facebook'] : '',
				'Twitter'   => ! empty( $item['member_social_twitter'] ) ? $item['member_social_twitter'] : '',
				'Pinterest' => ! empty( $item['member_social_google'] ) ? $item['member_social_google'] : '',
				'LinkedIn'  => ! empty( $item['member_social_linked'] ) ? $item['member_social_linked'] : '',
			);
			$socials = array_filter( $socials );
			if ( ! empty( $socials ) ) {
				$content .= '<ul class="member-socials">' . "\n";
				foreach ( $socials as $name => $url ) {
					$content .= '<li><a href="' . esc_url( $url ) . '">' . $name . '</a></li>' . "\n";
				}
				$content .= '</ul>' . "\n";
			}

			$content .= '<!-- /epsilon/' . $control->label . '-->' . "\n";
		}

		$content .= '<!-- /epsilon/' . $id . ' -->' . "\n";

		return $content;
	}

	/**
	 * @param $control
	 * @param $value
	 * @param $id
	 *
	 * @return string
	 */
	public function parse_sierra_expertise( $control, $value, $id ) {
		$content = '';
		$content .= '<!-- epsilon/' . $id . ' -->' . "\n";

		foreach ( $value as $item ) {
			$content .= '<!-- epsilon/' . $control->label . '-->' . "\n";

			if ( ! empty( $item['expertise_title'] ) ) {
				$content .= '<h3 class="expertise-title">' . $item['expertise_title'] . '</h3>' . "\n";
			}

			if ( ! empty( $item['portfolio_image'] ) ) {
				$content .= '<img src="' . $item['portfolio_image'] . '" />' . "\n";
			}

			if ( ! empty( $item['expertise_description'] ) ) {
				/**
				 * This accepts editor, so we can wrap it in a div
				 */
				$content .= '<div class="expertise-description">' . $item['expertise_description'] . '</div>' . "\n";
			}

			$content .= '<!-- /epsilon/' . $control->label . '-->' . "\n";
		}

		$content .= '<!-- /epsilon/' . $id . ' -->' . "\n";

		return $content;
	}

	/**
	 * @param $control
	 * @param $value
	 * @param $id
	 *
	 * @return string
	 */
	public function parse_sierra_services( $control, $value, $id ) {
		$content = '';
		$content .= '<!-- epsilon/' . $id . ' -->' . "\n";

		foreach ( $value as $item ) {
			$content .= '<!-- epsilon/' . $control->label . '-->' . "\n";

			if ( ! empty( $item['service_title'] ) ) {
				$content .= '<h3 class="service-title">' . $item['service_title'] . '</h3>' . "\n";
			}

			if ( ! empty( $item['service_description'] ) ) {
				$content .= '<p class="service-description">' . $item['service_description'] . '</p>' . "\n";
			}

			$content .= '<!-- /epsilon/' . $control->label . '-->' . "\n";
		}

		$content .= '<!-- /epsilon/' . $id . ' -->' . "\n";

		return $content;
	}

	/**
	 * @param $control
	 * @param $value
	 * @param $id
	 *
	 * @return string
	 */
	public function parse_sierra_testimonials( $control, $value, $id ) {
		$content = '';
		$content .= '<!-- epsilon/' . $id . ' -->' . "\n";

		foreach ( $value as $item ) {
			$content .= '<!-- epsilon/' . $control->label . '-->' . "\n";

			if ( ! empty( $item['testimonial_title'] ) ) {
				$content .= '<h3 class="testimonial-title">' . $item['testimonial_title'] . '</h3>' . "\n";
			}
			if ( ! empty( $item['testimonial_subtitle'] ) ) {
				$content .= '<h5 class="testimonial-subtitle">' . $item['testimonial_subtitle'] . '</h5>' . "\n";
			}

			if ( ! empty( $item['testimonial_image'] ) ) {
				$content .= '<img src="' . $item['testimonial_image'] . '" />' . "\n";
			}

			if ( ! empty( $item['testimonial_text'] ) ) {
				/**
				 * This accepts editor, so we can wrap it in a div
				 */
				$content .= '<div class="testimonial-text">' . $item['testimonial_text'] . '</div>' . "\n";
			}

			$content .= '<!-- /epsilon/' . $control->label . '-->' . "\n";
		}

		$content .= '<!-- /epsilon/' . $id . ' -->' . "\n";

		return $content;
	}

	/**
	 * @param $control
	 * @param $value
	 * @param $id
	 *
	 * @return string
	 */
	public function parse_sierra_portfolio( $control, $value, $id ) {
		$content = '';
		$content .= '<!-- epsilon/' . $id . ' -->' . "\n";

		foreach ( $value as $item ) {
			$content .= '<!-- epsilon/' . $control->label . '-->' . "\n";

			if ( ! empty( $item['portfolio_title'] ) ) {
				$content .= '<h4 class="portfolio-title">' . $item['portfolio_title'] . '</h4>' . "\n";
			}

			if ( ! empty( $item['portfolio_image'] ) ) {
				$content .= '<img src="' . $item['portfolio_image'] . '" />' . "\n";
			}

			if ( ! empty( $item['portfolio_description'] ) ) {
				/**
				 * This accepts editor, so we can wrap it in a div
				 */
				$content .= '<div class="portfolio-description">' . $item['portfolio_description'] . '</div>' . "\n";
			}

			$content .= '<!-- /epsilon/' . $control->label . '-->' . "\n";
		}

		$content .= '<!-- /epsilon/' . $id . ' -->' . "\n";

		return $content;
	}

	/**
	 * @param $control
	 * @param $value
	 * @param $id
	 *
	 * @return string
	 */
	public function parse_sierra_price_boxes( $control, $value, $id ) {
		$content = '';
		$content .= '<!-- epsilon/' . $id . ' -->' . "\n";

		foreach ( $value as $item ) {
			$content .= '<!-- epsilon/' . $control->label . '-->' . "\n";

			if ( ! empty( $item['price_box_title'] ) ) {
				$content .= '<h4 class="price-title">' . $item['price_box_title'] . '</h4>' . "\n";
			}

			if ( ! empty( $item['price_box_price'] ) ) {
				$content .= '<strong>' . $item['price_box_price'] . '</strong>' . "\n";
			}

			if ( ! empty( $item['price_box_text'] ) ) {
				/**
				 * This accepts editor, so we can wrap it in a div
				 */
				$content .= '<div class="price-box-description">' . $item['price_box_text'] . '</div>' . "\n";
			}

			if ( ! empty( $item['price_box_features'] ) ) {
				/**
				 * This accepts editor, so we can wrap it in a div
				 */
				$content .= '<div class="price-box-features">' . $item['price_box_features'] . '</div>' . "\n";
			}

			if ( ! empty( $item['price_box_url'] ) ) {
				$content .= '<a href="' . $item['price_box_url'] . '">' . esc_html__( 'Purchase', 'sierra' ) . '</a>' . "\n";
			}

			$content .= '<!-- /epsilon/' . $control->label . '-->' . "\n";
		}

		$content .= '<!-- /epsilon/' . $id . ' -->' . "\n";

		return $content;
	}


	/**
	 * @param $control
	 * @param $value
	 * @param $id
	 *
	 * @return string
	 */
	public function parse_sierra_slides( $control, $value, $id ) {
		$content = '';
		$content .= '<!-- epsilon/' . $id . ' -->' . "\n";
		if ( ! empty( $value ) ) {
			$content .= '<ul class="slider">' . "\n";
		}

		foreach ( $value as $slide ) {
			$content .= '<!-- epsilon/' . $control->label . '-->' . "\n";

			$content .= '<li>' . "\n";
			if ( ! empty( $slide['slides_image'] ) ) {
				$content .= '<img src="' . $slide['slides_image'] . '" />' . "\n";
			}
			if ( ! empty( $slide['slides_title'] ) ) {
				$content .= '<h3 class="slide-title">' . $slide['slides_title'] . '</h3>' . "\n";
			}
			if ( ! empty( $slide['slides_description'] ) ) {
				$content .= '<div class="slide-caption">' . $slide['slides_description'] . '</div>' . "\n";
			}
			$content .= '</li>' . "\n";

			$content .= '<!-- /epsilon/' . $control->label . '-->' . "\n";
		}

		if ( ! empty( $value ) ) {
			$content .= '</ul>' . "\n";
		}
		$content .= '<!-- /epsilon/' . $id . ' -->' . "\n";

		return $content;
	}
}
