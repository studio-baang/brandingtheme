<?php
 return array(
            'title'       => __( '기본 글 형식', 'studio-baang' ),
            'categories' => array('studio-baang'),
            'blockTypes' => array( 'core/paragraph', 'core/heading', 'core/group' ),
            'content'     => '<!-- wp:group {"tagName":"section","className":"studio-baang-composition"} -->
            <section class="wp-block-group studio-baang-composition"><!-- wp:group {"className":"studio-baang-composition__title"} -->
            <div class="wp-block-group studio-baang-composition__title"><!-- wp:heading -->
            <h2></h2>
            <!-- /wp:heading --></div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"studio-baang-composition__description"} -->
            <div class="wp-block-group studio-baang-composition__description"><!-- wp:paragraph -->
            <p></p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group --></section>
            <!-- /wp:group -->',
 );
