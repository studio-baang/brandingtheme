</main>
<?php get_sidebar(); ?>
</div>
<footer class="footer" role="contentinfo">
    <img src="<?php echo get_template_directory_uri(); ?>/img/logotype_white.png" alt="스듀디오 바앙" class="footer__logotype">
<div class="footer__copyright">
&copy; <?php echo esc_html( date_i18n( __( 'Y', 'baangbranding' ) ) ); ?> designed by <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>