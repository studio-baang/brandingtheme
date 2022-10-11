<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php  get_template_part( 'templates/baang', (has_category('logo') ? 'logo' : 'single') ); ?>

<?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
<?php endwhile; endif; ?>
<footer class="footer footer--content-nav">
<?php get_template_part( 'templates/nav', 'below-single' ); ?>
</footer>
<?php get_footer(); ?>