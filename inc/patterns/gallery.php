<?php 
return array(
            'title'       => __( '갤러리', 'studio-baang' ),
            'categories' => array('studio-baang'),
            'blockTypes' => array( 'core/gallery' ),
            'content'     => '<!-- wp:group -->
                            <div class="wp-block-group"><!-- wp:gallery {"columns":1,"imageCrop":false,"linkTo":"none","sizeSlug":"large","className":"studio-baang-gallery"} -->
                            <figure class="wp-block-gallery has-nested-images columns-1 studio-baang-gallery"></figure>
                            <!-- /wp:gallery --></div>
                            <!-- /wp:group -->',
);