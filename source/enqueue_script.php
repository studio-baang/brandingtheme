<?php

function baang_enqueue_client() {
        wp_enqueue_style( 'baangbranding-style-wp-blocks', get_template_directory_uri().'/source/css/wp-blocks.css' );
        wp_enqueue_style( 'monument-extended', content_url().'/fonts/MonumentExtended/monumentExtended.css' );
        wp_enqueue_style( 'baangbranding-style-global', get_template_directory_uri().'/source/css/global.css',array(), false, false );
        wp_enqueue_script( 'baangbranding-custom-block', get_template_directory_uri().'/source/js/app.js',array(), false, true );
        if(!is_admin( )) {
        	wp_enqueue_script( 'baangbranding-script-app', get_template_directory_uri().'/source/js/app.js',array(), false, true );
    }
};
add_action( 'wp_enqueue_scripts', 'baang_enqueue_client' );
