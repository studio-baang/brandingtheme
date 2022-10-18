<?php
add_action( 'after_setup_theme', 'baangbranding_setup' );
function baangbranding_setup() {
load_theme_textdomain( 'baangbranding', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
add_theme_support( 'woocommerce' );
global $content_width;

// add custom fields
include_once(get_stylesheet_directory().'/inc/custom-field.php');

// add custom patterns
include_once(get_stylesheet_directory().'/inc/custom-pattern.php');

// add custom block
include_once(get_stylesheet_directory().'/inc/custom-block.php');


if ( !isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'baangbranding' ) ) );
}
add_action( 'admin_notices', 'baangbranding_notice' );
function baangbranding_notice() {
$user_id = get_current_user_id();
$admin_url = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$param = ( count( $_GET ) ) ? '&' : '?';
if ( !get_user_meta( $user_id, 'baangbranding_notice_dismissed_7' ) && current_user_can( 'manage_options' ) )
echo '<div class="notice notice-info"><p><a href="' . esc_url( $admin_url ), esc_html( $param ) . 'dismiss" class="alignright" style="text-decoration:none"><big>' . esc_html__( 'Ⓧ', 'baangbranding' ) . '</big></a>' . wp_kses_post( __( '<big><strong>📝 Thank you for using baangbranding!</strong></big>', 'baangbranding' ) ) . '<br /><br /><a href="https://wordpress.org/support/theme/baangbranding/reviews/#new-post" class="button-primary" target="_blank">' . esc_html__( 'Review', 'baangbranding' ) . '</a> <a href="https://github.com/tidythemes/baangbranding/issues" class="button-primary" target="_blank">' . esc_html__( 'Feature Requests & Support', 'baangbranding' ) . '</a> <a href="https://calmestghost.com/donate" class="button-primary" target="_blank">' . esc_html__( 'Donate', 'baangbranding' ) . '</a></p></div>';
}
add_action( 'admin_init', 'baangbranding_notice_dismissed' );
function baangbranding_notice_dismissed() {
$user_id = get_current_user_id();
if ( isset( $_GET['dismiss'] ) )
add_user_meta( $user_id, 'baangbranding_notice_dismissed_7', 'true', true );
}


function change_default_jquery( ){
    wp_dequeue_script( 'jquery');
    wp_deregister_script( 'jquery');   
}
add_filter( 'wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX );

function baang_dequeue_blocks() {
	// remove defalut blocks style
 	wp_dequeue_style( 'wp-block-library' );
 	wp_dequeue_style( 'wp-block-library-theme' );
 	wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS

}
add_action( 'wp_enqueue_scripts', 'baang_dequeue_blocks' );

// add enqueue global.css, app.js
include_once(get_stylesheet_directory().'/source/enqueue_script.php');

// remove wp-container inline style

add_filter( 'block_type_metadata', 'my_remove_experimental_layout', 10, 1 );
function my_remove_experimental_layout( $metadata ) {
    if ( !empty($metadata['supports']['__experimentalLayout'])) {
        $metadata['supports']['__experimentalLayout'] = false;
    }
    return $metadata;
}

add_filter( 'document_title_separator', 'baangbranding_document_title_separator' );
function baangbranding_document_title_separator( $sep ) {
$sep = esc_html( '|' );
return $sep;
}
add_filter( 'the_title', 'baangbranding_title' );
function baangbranding_title( $title ) {
if ( $title == '' ) {
return esc_html( '...' );
} else {
return wp_kses_post( $title );
}
}
function baangbranding_schema_type() {
$schema = 'https://schema.org/';
if ( is_single() ) {
$type = "Article";
} elseif ( is_author() ) {
$type = 'ProfilePage';
} elseif ( is_search() ) {
$type = 'SearchResultsPage';
} else {
$type = 'WebPage';
}
echo 'itemscope itemtype="' . esc_url( $schema ) . esc_attr( $type ) . '"';
}
add_filter( 'nav_menu_link_attributes', 'baangbranding_schema_url', 10 );
function baangbranding_schema_url( $atts ) {
$atts['itemprop'] = 'url';
return $atts;
}
if ( !function_exists( 'baangbranding_wp_body_open' ) ) {
function baangbranding_wp_body_open() {
do_action( 'wp_body_open' );
}
}
add_action( 'wp_body_open', 'baangbranding_skip_link', 5 );
function baangbranding_skip_link() {
echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'baangbranding' ) . '</a>';
}
add_filter( 'the_content_more_link', 'baangbranding_read_more_link' );
function baangbranding_read_more_link() {
if ( !is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'baangbranding' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'excerpt_more', 'baangbranding_excerpt_read_more_link' );
function baangbranding_excerpt_read_more_link( $more ) {
if ( !is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'baangbranding' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'baangbranding_image_insert_override' );
function baangbranding_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
unset( $sizes['1536x1536'] );
unset( $sizes['2048x2048'] );
return $sizes;
}
add_action( 'widgets_init', 'baangbranding_widgets_init' );
function baangbranding_widgets_init() {
register_sidebar( array(
'name' => esc_html__( 'Sidebar Widget Area', 'baangbranding' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'wp_head', 'baangbranding_pingback_header' );
function baangbranding_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'baangbranding_enqueue_comment_reply_script' );
function baangbranding_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function baangbranding_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
}
add_filter( 'get_comments_number', 'baangbranding_comment_count', 0 );
function baangbranding_comment_count( $count ) {
if ( !is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}