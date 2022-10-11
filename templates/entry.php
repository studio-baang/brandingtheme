<article <?php post_class(); ?>>
<?php get_template_part( 'templates/entry', ( is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
</article>