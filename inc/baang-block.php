<?php

function studio_baang_basics_article() {
    register_block_pattern(
        'studio-baang/post-composition',
        array(
            'title'       => __( '기본 글 형식', 'studio-baang' ),
            'categories' => array('studio-baang'),
            'content'     => '<!-- wp:group {"tagName":"section","className":"studio-baang-composition"} -->
            <section class="wp-block-group studio-baang-composition"><!-- wp:group {"className":"studio-baang-composition__title"} -->
            <div class="wp-block-group studio-baang-composition__title"><!-- wp:heading -->
            <h2>Page Test</h2>
            <!-- /wp:heading --></div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"studio-baang-composition__description"} -->
            <div class="wp-block-group studio-baang-composition__description"><!-- wp:paragraph -->
            <p>페이지 형식에서 글을 작성하는 중입니다.</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group --></section>
            <!-- /wp:group -->',
        )
    );
    register_block_pattern(
        'studio-baang/post-composition-float-both',
        array(
            'title'       => __( '균등 배치 형식', 'studio-baang' ),
            'categories' => array('studio-baang'),
            'content'     => '<!-- wp:group {"tagName":"section","className":"studio-baang-composition studio-baang-composition--float-both"} -->
            <section class="wp-block-group studio-baang-composition studio-baang-composition--float-both"><!-- wp:group {"className":"studio-baang-composition__title"} -->
            <div class="wp-block-group studio-baang-composition__title studio-baang-composition__title--float-both"><!-- wp:heading -->
            <h2>Page Test</h2>
            <!-- /wp:heading --></div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"studio-baang-composition__description"} -->
            <div class="wp-block-group studio-baang-composition__description studio-baang-composition__description--float-both"><!-- wp:paragraph -->
            <p>페이지 형식에서 글을 작성하는 중입니다.</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group --></section>
            <!-- /wp:group -->',
            )
    );
    register_block_pattern(
        'studio-baang/gallery',
        array(
            'title'       => __( '갤러리', 'studio-baang' ),
            'categories' => array('studio-baang'),
            'content'     => '<!-- wp:group -->
                            <div class="wp-block-group"><!-- wp:gallery {"columns":1,"imageCrop":false,"linkTo":"none","sizeSlug":"full","className":"studio-baang-gallery"} -->
                            <figure class="wp-block-gallery has-nested-images columns-1 studio-baang-gallery"></figure>
                            <!-- /wp:gallery --></div>
                            <!-- /wp:group -->',
        )
    );
        register_block_pattern(
        'studio-baang/variation',
        array(
            'title'       => __( '로고 바리에이션', 'studio-baang' ),
            'categories' => array('studio-baang'),
            'content'     => '<!-- wp:group {"className":"studio-baang-variation"} -->
            <div class="wp-block-group studio-baang-variation"><!-- wp:cover {"isDark":false} -->
            <div class="wp-block-cover is-light"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:image -->
            <figure class="wp-block-image"><img alt=""/></figure>
            <!-- /wp:image --></div></div>
            <!-- /wp:cover --></div>
            <!-- /wp:group -->
            ',
        )
    );
};
add_action( 'init', 'studio_baang_basics_article' );

function my_plugin_register_my_pattern_categories() {
  register_block_pattern_category(
    'studio-baang',
    array( 'label' => __( '스튜디오 바앙 로고 아카이브 사이트', 'studio-baang' ) )
);
};

add_action( 'init', 'my_plugin_register_my_pattern_categories' );

?>