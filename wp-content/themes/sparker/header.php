<?php
/**
 * The header section of Sparker.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sparker
 */
    global $sparker_theme_options;
	$sparker_theme_options = sparker_get_theme_options();
	$sparker_header_disable = $sparker_theme_options['sparker-header-disable'];

?>
<?php
	/**
	 * Hook - sparker_doctype.
	 *
	 * @hooked sparker_doctype_action - 10
	 */
	do_action( 'sparker_doctype' );
?>

<head>

<?php
	/**
	 * Hook - sparker_head.
	 *
	 * @hooked sparker_head_action - 10
	 */
	do_action( 'sparker_head' );


	wp_head(); ?>

</head>

<body <?php body_class('at-sticky-sidebar');?>>
	<div class="site_layout">

<?php

	/**
	 * Hook - sparker_header_start_wrapper_action.
	 *
	 * @hooked sparker_header_start_wrapper - 10
	 */
	do_action( 'sparker_header_start_wrapper_action' );


	/**
	 * Hook - sparker_skip_link.
	 *
	 * @hooked sparker_skip_link_action - 10
	 */
	do_action( 'sparker_skip_link_action' );


	/**
	 * Hook - sparker_header_section.
	 *
	 * @hooked sparker_header_section_action - 10
	 */
	if($sparker_header_disable == 1 ){ 
	 do_action( 'sparker_header_section_action' );
	}


	/**
	 * Hook - sparker_header_lower_section.
	 *
	 * @hooked sparker_header_lower_section_action - 10
	 */
	do_action( 'sparker_header_lower_section_action' );

	/**
	 * Hook - sparker_header_end_wrapper.
	 *
	 * @hooked sparker_header_end_wrapper_action - 10
	 */
	do_action( 'sparker_header_end_wrapper_action' );

?>
		