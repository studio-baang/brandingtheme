<?php
    function baang_enqueue_client() {
        wp_enqueue_style( 'baangbranding-style-global', get_template_directory_uri().'/css/global.css',array(), false, false );
	    if(!is_admin( )) {
	    	wp_enqueue_script( 'baangbranding-script-app', get_template_directory_uri().'/js/app.js',array(), false, true );
	    }
    };

    add_action( 'wp_enqueue_scripts', 'baang_enqueue_client' );