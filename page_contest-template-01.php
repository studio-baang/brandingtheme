<?php /* Template Name: sans-serif concept 01 */ ?>
<?php
$fields = get_field_objects();

$main_font_en = $fields["main_font_en"]["value"];
$sub_font_kr = $fields["sub_font_kr"]["value"];

$sub_title = $fields["sub-company-name"]["value"];

$intro_main_text_color = $fields["intro-main-text-color"]["value"];
$intro_sub_text_color = $fields["intro-sub-text-color"]["value"];
$intro_background_color = $fields["intro-background-color"]["value"];
$intro_background_image = $fields["intro-background-image"]["value"];

$example_title_color = $fields["example-title-color"]["value"];
$example_background_color = $fields["example-background-color"]["value"];

$intro_card_image = $fields["intro-card-logo-image"]["value"];
$intro_card_color = $fields["intro-card-background-color"]["value"];
$intro_card_size = $fields["intro-card-background-size"]["value"];


function wpdocs_theme_contest_01_scripts() {
    if ($main_font_en = "MonumentExtended") {
        wp_enqueue_style( 'monument-extended', '/fonts/MonumentExtended/monumentExtended.css' );
    }
    if ($main_font_en = "PPEiko") {
        wp_enqueue_style( 'PPEiko', '/fonts/PPEiko/PPEiko.css' );
    }
    if ($sub_font_kr = 'Noto Serif KR') {
        wp_enqueue_style('noto-serif-kr', 'https://fonts.googleapis.com/css2?family=Noto+Serif+KR:wght@400;700&display=swap');  
    }
    wp_enqueue_style( 'contest-template01-css', get_template_directory_uri().'/css/contest-01.css' );
    wp_enqueue_script( 'contest-template01-js', get_template_directory_uri().'/js/contest-01.js',array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_contest_01_scripts' );
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <style>
        html {
            --intro-main-text-color: <?php echo $intro_main_text_color ?>;
            --intro-sub-text-color: <?php echo $intro_sub_text_color ?>;
            --intro-background-color: <?php echo $intro_background_color ?>;
            --intro-background-image: none; 

            --example-title-color: <?php echo $example_title_color ?>;
            --example-background-color: <?php echo $example_background_color?>;

            --intro-card-item-img: url(<?php echo $intro_card_image['url']?>);
            --intro-card-item-color: <?php echo $intro_card_color ?>;
            --intro-card-item-size: contain;

            --font-style: 'sans-serif';
            --main-font-en:  '<?php echo $main_font_en ?>';
            --sub-font-kr: '<?php echo $sub_font_kr ?>';
        }
    </style>
    <main class="app for-design-circus">
        <section class="intro">
            <div class="intro_wrapper">
                <div class="intro_tit">
                    <h1 class="intro_main-tit"><strong><?php wp_title('')?></strong>
                        <br>logo design
                    </h1>
                    <span class="intro_sub-tit"><?php echo $sub_title ?> 로고 컨셉 디자인</span>
                </div>
                <ul class="intro_bottom">
                    <li class="intro_option intro_option__type">Symbol + Logotype</li>
                    <li class="intro_option intro_option__useto">For all used</li>
                </ul>
            </div>
            <div class="intro_card"></div>
        </section>
        <section class="detail">
            <?php the_content(); ?>
        </section>
    </main>
<?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>