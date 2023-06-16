<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage Hodophile
* @since Hodophile 1.0.0
*/

if ( ! function_exists( 'hodophile_validate_long_excerpt' ) ) :
  function hodophile_validate_long_excerpt( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'hodophile' ) );
	 } elseif ( $value < 5 ) {
		 $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'hodophile' ) );
	 } elseif ( $value > 100 ) {
		 $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'hodophile' ) );
	 }
	 return $validity;
  }
endif;


if ( ! function_exists( 'hodophile_validate_popular_destination_count' ) ) :
  function hodophile_validate_popular_destination_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'hodophile' ) );
	 } elseif ( $value < 3 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 3', 'hodophile' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'hodophile' ) );
	 }
	 return $validity;
  }
endif;


if ( ! function_exists( 'hodophile_validate_blog_count' ) ) :
  function hodophile_validate_blog_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'hodophile' ) );
	 } elseif ( $value < 2 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 2', 'hodophile' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'hodophile' ) );
	 }
	 return $validity;
  }
endif;




