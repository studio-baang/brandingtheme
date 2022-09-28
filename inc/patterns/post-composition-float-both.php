<?php
return array(
            'title'       => __( '균등 배치 형식', 'studio-baang' ),
            'categories' => array('studio-baang'),
            'blockTypes' => array( 'core/paragraph', 'core/heading', 'core/group' ),
            'content'     => '<!-- wp:group {"tagName":"section","className":"studio-baang-composition studio-baang-composition--float-both"} -->
            <section class="wp-block-group studio-baang-composition studio-baang-composition--float-both"><!-- wp:group {"className":"studio-baang-composition__title"} -->
            <div class="wp-block-group studio-baang-composition__title studio-baang-composition__title--float-both"><!-- wp:heading -->
            <h2></h2>
            <!-- /wp:heading --></div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"studio-baang-composition__description"} -->
            <div class="wp-block-group studio-baang-composition__description studio-baang-composition__description--float-both"><!-- wp:paragraph -->
            <p></p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group --></section>
            <!-- /wp:group -->',
);
