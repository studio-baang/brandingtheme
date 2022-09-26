<?php
 return array(
            'title'       => __( '기본 글 형식', 'studio-baang' ),
            'categories' => array('studio-baang'),
            'blockTypes' => array( 'core/paragraph', 'core/heading' ),
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
 );
