<?php

function baang_enqueue_client() {
        wp_enqueue_style( 'baangbranding-style-wp-blocks', get_template_directory_uri().'/source/css/wp-blocks.css' );
        wp_enqueue_style( 'monument-extended', content_url().'/fonts/MonumentExtended/monumentExtended.css' );
        wp_enqueue_style( 'baangbranding-style-global', get_template_directory_uri().'/source/css/global.css',array(), false, false );
        if(!is_admin( )) {
        	wp_enqueue_script( 'baangbranding-script-app', get_template_directory_uri().'/source/js/app.js',array(), false, true );
    }
};
add_action( 'wp_enqueue_scripts', 'baang_enqueue_client' );

function baang_editor_script() {
    add_theme_support( 'editor-styles' );
	add_editor_style( get_template_directory_uri().'/source/css/editor-style.css' ); 
};
add_action('after_setup_theme', 'baang_editor_script');