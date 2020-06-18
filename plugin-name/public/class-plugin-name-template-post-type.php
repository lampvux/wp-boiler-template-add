<?php
if ( $settings_post_type_name['custom_post_type'] == get_post_type() && is_single() ) {

    return $this->locate_template( $template, $settings_post_type_name, 'single' );	
}

if (get_post_type()=="post_type_name") {

    if (is_page_template( WP_PLUGIN_DIR . '/' . $this->plugin_name . '/' . 'templates' . '/single-' . 'post_type_name'. '.php' )) {

        $file = get_post_meta( 
            $post->ID, '_wp_page_template', true
        );		
        // Just to be safe, we check if the file exist first
        if ( file_exists( $file ) ) {
            return $file;
        } else {
            //echo $file;
        }
    }
}

if ( $settings_post_type_name['custom_post_type'] == get_post_type() &&  is_archive() && ! is_search() ) {

    if (is_page_template( WP_PLUGIN_DIR . '/' . $this->plugin_name . '/' . 'templates' . '/archive-' . 'post_type_name'. '.php' )) {
        
        $file = get_post_meta( 
            $post->ID, '_wp_page_template', true
        );

        // Just to be safe, we check if the file exist first
        if ( file_exists( $file ) ) {
            return $file;
        } else {
            //echo $file;
        }
    }
}