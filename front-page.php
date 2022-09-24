<?php 
    function wpdocs_front_page_scripts() {
        wp_enqueue_style( 'front-page-css', get_template_directory_uri().'/css/front-page.css' );
    // wp_enqueue_script( 'front-page-js', get_template_directory_uri().'/js/.js',array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'wpdocs_front_page_scripts'  );
?>
<?php get_header(); ?>
<article class="home">

</article>

<?php get_footer(); ?>