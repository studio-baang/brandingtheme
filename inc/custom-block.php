<?php 
function baang_custom_blocks() {
    wp_register_script( 'baang-color-chip', get_template_directory_uri().'/source/js/color-chip.js', array('wp-blocks','wp-i18n', 'wp-editor'),true);
    register_block_type( 'studio-baang/color-chip', array(
        'api_version' => 2,
        'editor_script' => 'baang-color-chip',
    ) );
};
add_action( 'init', 'baang_custom_blocks' );