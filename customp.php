<?php

/**
 * Plugin Name: customp
 * Description: some
 * Version: 1.0.0
 * License:           GPL-2.0+ 
 * Text Domain:       customp
 * Domain Path:       /languages
 */

add_action('admin_head', '_20161201_admin_head');


function _20161201_admin_head() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
    return;
    }
    // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
    // check if WYSIWYG is enabled
    if ( get_user_option('rich_editing') == 'true') {    	
        add_filter("mce_external_plugins", "_20161201_add_script");
        add_filter('mce_buttons', '_20161201_register');
    }
}

function _20161201_register($buttons) {
   array_push($buttons, "20161201");
   return $buttons;
}

function _20161201_add_script($plugin_array) {
    $plugin_array['20161201'] = plugins_url( 'js/20161201-rich.js', __FILE__ ); 
    return $plugin_array;
}

add_action('admin_print_scripts', '_20161201_admin_print_scripts');
function _20161201_admin_print_scripts() {
  wp_enqueue_script( '20161201quicktags',   plugin_dir_url(__FILE__) . 'js/20161201-html.js',   array('quicktags')
  );
}
