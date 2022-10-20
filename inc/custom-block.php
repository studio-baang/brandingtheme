<?php 
function baang_custom_blocks() {
    $custom_blocks = array(
        'color-list',
        'color-gradient',
        'color-chip',
        'color-guide'
    );
    
    foreach($custom_blocks as $custom_block) {
        $bolck_file = get_template_directory_uri().'/source/js/blocks/'.$custom_block.'.js';
            wp_register_script( $custom_block, $bolck_file, array('wp-blocks','wp-i18n', 'wp-editor'),true);
            register_block_type( 'studio-baang/'.$custom_block, array(
                'api_version' => 2,
                'editor_script' => $custom_block,
        ) );
    }
};
add_action( 'init', 'baang_custom_blocks' );