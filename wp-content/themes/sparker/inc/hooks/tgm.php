<?php
/**
 * Recommended plugins
 *
 * @package sparker
 */
if ( ! function_exists( 'sparker_recommended_plugins' ) ) :
	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function sparker_recommended_plugins() {
		
		$plugins = array(

			array(
				'name'     => esc_html__( 'One Click Demo Import', 'sparker' ),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			),
			
			array(
				'name'     => esc_html__( 'Contact Us', 'sparker' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			),

			array(
				'name'     => esc_html__( 'Elementor', 'sparker' ),
				'slug'     => 'elementor',
				'required' => true,
			),

		   
		);
		tgmpa( $plugins );
	}
endif;
add_action( 'tgmpa_register', 'sparker_recommended_plugins' );
