<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sparker
 */
  	/**
	 * Hook - sparker_container_closing_action.
	 *
	 * @hooked sparker_container_closing_action - 10
	 */
	do_action( 'sparker_container_closing_action' );


  	/**
	 * Hook - sparker_site_footer_start_action.
	 *
	 * @hooked sparker_site_footer_start_action - 10
	 */
	do_action( 'sparker_site_footer_start_action' );


	/**
	 * Hook - sparker_site_footer_widget_action.
	 *
	 * @hooked sparker_site_footer_widget_action - 10
	 */
	do_action( 'sparker_site_footer_widget_action' );

	/**
	 * Hook - sparker_footer_site_info_action.
	 *
	 * @hooked sparker_footer_site_info_action - 10
	 */
	do_action( 'sparker_footer_site_info_action' );

	/**
	 * Hook - sparker_footer_closing_action.
	 *
	 * @hooked sparker_footer_closing - 10
	 */
	do_action( 'sparker_footer_closing_action' );


    wp_footer(); ?>
</div>

</body>
</html>
