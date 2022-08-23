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

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

if( function_exists('acf_add_local_field_group') ):

// Logo Contest page01 - Preference
acf_add_local_field_group(array(
	'key' => 'group_63049377de69e',
	'title' => 'Logo Contest page01 - Preference',
	'fields' => array(
		array(
			'key' => 'choice_font_style',
			'label' => '폰트 스타일 선택',
			'name' => 'font_style',
			'type' => 'radio',
			'instructions' => '폰트 스타일(고딕, 명조) 선택',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'sans-serif' => 'sans-serif',
				'serif' => 'serif',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
			'return_format' => 'label',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_630494c8c7682',
			'label' => '메인 영문 폰트',
			'name' => 'main_font_en',
			'type' => 'radio',
			'instructions' => '메인 영문 폰트 선택',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'MonumentExtended' => 'MonumentExtended',
				'PPEiko' => 'PPEiko',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_63049526c7683',
			'label' => '본문 한글 폰트',
			'name' => 'sub_font_kr',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'Noto Sans KR' => 'Noto Sans KR',
				'Noto Serif KR' => 'Noto Serif KR',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
			'return_format' => 'label',
			'save_other_choice' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page_contest-template-01.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

// Logo Contest page01 - Intro Option
acf_add_local_field_group(array(
	'key' => 'group_62f2178ac5aff',
	'title' => 'Logo Contest page01 - Intro Option',
	'fields' => array(
		array(
			'key' => 'sub_company_name',
			'label' => 'sub-company-name',
			'name' => 'sub-company-name',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'return_format' => 'string',
		),
		array(
			'key' => 'field_6304938bc7681',
			'label' => '사용 범위',
			'name' => 'use-scope',
			'type' => 'checkbox',
			'instructions' => '사용 범위 선택하기',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'everywhere' => 'Everywhere',
				'print' => 'Print',
				'web' => 'Web',
				'product' => 'Product',
				'signboard' => 'Signboard',
				'screen' => 'Screen',
			),
			'allow_custom' => 0,
			'default_value' => array(
			),
			'layout' => 'vertical',
			'toggle' => 0,
			'return_format' => 'label',
			'save_custom' => 0,
		),
		array(
			'key' => 'field_62f217a79b06e',
			'label' => 'intro-main-text-color',
			'name' => 'intro-main-text-color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'enable_opacity' => 0,
			'return_format' => 'string',
		),
		array(
			'key' => 'field_62f217cb9b06f',
			'label' => 'intro-sub-text-color',
			'name' => 'intro-sub-text-color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'enable_opacity' => 0,
			'return_format' => 'string',
		),
		array(
			'key' => 'field_62f217dc9b070',
			'label' => 'intro-background-color',
			'name' => 'intro-background-color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'enable_opacity' => 0,
			'return_format' => 'string',
		),
		array(
			'key' => 'field_62f217f09b071',
			'label' => 'intro-background-image',
			'name' => 'intro-background-image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => 1920,
			'min_height' => 1080,
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page_contest-template-01.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

acf_add_local_field_group(array(
	'key' => 'group_62f11225144fa',
	'title' => 'Logo Contest Page01 - Card Option',
	'fields' => array(
		array(
			'key' => 'field_62f112a84f22c',
			'label' => 'intro card logo image',
			'name' => 'intro-card-logo-image',
			'type' => 'image',
			'instructions' => '인트로 카드 로고 이미지',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_62f112fe4f22d',
			'label' => 'intro card background color',
			'name' => 'intro-card-background-color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'enable_opacity' => 0,
			'return_format' => 'string',
		),
		array(
			'key' => 'field_62f215c29db90',
			'label' => 'intro-card-background-size',
			'name' => 'intro-card-background-size',
			'type' => 'radio',
			'instructions' => 'choose background-size value;',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'contain' => 'contain',
				'cover' => 'cover',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page_contest-template-01.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

acf_add_local_field_group(array(
	'key' => 'group_62f21b42b7407',
	'title' => 'Logo Contest Page01 - Example Option',
	'fields' => array(
		array(
			'key' => 'field_62f21b540019f',
			'label' => 'example-title-color',
			'name' => 'example-title-color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#ffffff',
			'enable_opacity' => 0,
			'return_format' => 'string',
		),
		array(
			'key' => 'field_62f21b6d001a0',
			'label' => 'example-background-color',
			'name' => 'example-background-color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#222222',
			'enable_opacity' => 0,
			'return_format' => 'string',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page_contest-template-01.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

endif;		

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

add_action( 'wp_enqueue_scripts', 'baangbranding_enqueue' );
function baangbranding_enqueue() {
    wp_enqueue_style( 'baangbranding-style', get_stylesheet_uri() );
	wp_enqueue_style( 'baangbranding-style-global', get_template_directory_uri().'/css/global.css' );
    wp_enqueue_script( 'jquery' );
}


add_action( 'wp_footer', 'baangbranding_footer' );
function baangbranding_footer() {
?>
<script>
jQuery(document).ready(function($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
$("html").addClass("mobile");
}
if (deviceAgent.match(/(Android)/)) {
$("html").addClass("android");
$("html").addClass("mobile");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>
<?php
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