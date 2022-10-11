<?php

function add_studio_baang_pattern() {
    remove_theme_support('core-block-patterns');

    $block_patterns = array(
        'post-composition',
		'post-composition-float-both',
        'gallery',
        'variation',
	);

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );
		register_block_pattern(
			'studio-baang/' . $block_pattern,
			require $pattern_file
		);
	}

      register_block_pattern_category(
            'studio-baang',
            array( 'label' => __( 'Studio-Baang-Patterns', 'studio-baang' ) )
        );
};

add_action( 'init', 'add_studio_baang_pattern', 9  );

?>