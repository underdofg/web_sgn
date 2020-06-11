<?php
/**
 * Demo Data support.
 *
 * @package nexas
 */

/*Disable PT branding.*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * Demo Data files.
 *
 * @since 1.0.0
 *
 * @return array Files.
 */

function sparker_import_files() {
    return array(
    array(
        'import_file_name'=> __('Main Demo','sparker'),
        'categories'      =>  array( 'Main Demo' ),
        'local_import_file'=> trailingslashit( get_template_directory() ) . 'inc/dummy-data/dummy-data-files/elementor/sparkerblog.wordpress.xml',
        'local_import_widget_file'     =>  trailingslashit( get_template_directory() ) . 'inc/dummy-data/dummy-data-files/elementor/sparker-widgets.wie',
        'local_import_customizer_file' =>  trailingslashit( get_template_directory() ) . 'inc/dummy-data/dummy-data-files/elementor/sparker-export.dat',
    ),

);

}
add_filter( 'pt-ocdi/import_files', 'sparker_import_files' );


/**
 * Demo Data after import.
 *
 * @since 1.0.0
 */

function sparker_after_import_setup() {
    // Assign front page and posts page (blog page).

    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );
    $social_menu = get_term_by( 'name', 'Social', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
        'primary' => $main_menu->term_id,
        'social' => $social_menu->term_id,
    )
);


    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );



}
add_action( 'pt-ocdi/after_import', 'sparker_after_import_setup' );