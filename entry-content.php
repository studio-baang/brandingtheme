<div class="entry-content" itemprop="mainEntityOfPage">
<?php if ( has_post_thumbnail() ) : ?>
<a href="<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); echo esc_url( $src[0] ); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?></a>
<?php endif; ?>
<meta itemprop="description" content="<?php echo esc_html( wp_strip_all_tags( get_the_excerpt(), true ) ); ?>" />
<?php 
$fields = get_fields();
if($fields) :?>
			<section class="studio-baang-cover">
                <?php
                if($fields["background-color"]) : ?>
                <span aria-hidden="true" class="studio-baang-cover__background-color <?php if($fields["background"]) { echo 'studio-baang-cover__background-color--with-image'; }; ?>" style="background-color: <?=$fields["background-color"]?>"></span>
                <?php endif; ?>

                <?php if($fields["background"]) : ?>
                <img  aria-hidden="true"  class="studio-baang-cover__image studio-baang-cover__image--cover" src="<?=$fields["background"]["url"]?>" alt="">
                <?php endif; ?>
                
                <?php if($fields["logo-image"]) : ?>
                <div class="studio-baang-cover__image studio-baang-cover__image--logo">
                    <img src="<?=$fields["logo-image"]["url"]?>" alt="<?=$fields["logo-image"]["description"]?>">
                </div>
                <?php endif; ?>

				<span class="studio-baang-cover__copyright">design by studio baang</span>
			</section>

<?php endif; ?>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</div>