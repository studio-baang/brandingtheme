<?php
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

// post cover
acf_add_local_field_group(array(
	'key' => 'group_632b468aaef5',
	'title' => 'post cover',
	'fields' => array(
		array(
			'key' => 'field_632b46bca6460',
			'label' => 'logo image',
			'name' => 'logo-image',
			'type' => 'image',
			'instructions' => '커버 로고 이미지',
		),
		array(
			'key' => 'field_632b469ba645f',
			'label' => 'background',
			'name' => 'background',
			'type' => 'image',
			'instructions' => '커버 배경 이미지',
		),
				array(
			'key' => 'field_742c370ca5asf',
			'label' => 'background color',
			'name' => 'background-color',
			'type' => 'color_picker',
			'instructions' => '커버 배경 색상',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
"position" => "side",
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

// attach to front page
acf_add_local_field_group(array(
	'key' => 'group_145754dda3d4',
	'title' => 'in_front',
	'fields' => array(
		array(
			'key' => 'field_733c45cab2s32',
			'label' => 'in front',
			'name' => 'in-front',
			'type' => 'true_false',
			'instructions' => '전면 페이지 노출 여부',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	"position" => "side",
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

endif;		
?>