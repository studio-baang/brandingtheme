<?php /* Template Name: sans-serif concept 01 */ ?>
<?php
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'contest-template01-css', get_template_directory_uri().'/css/contest-01.css' );
    wp_enqueue_script( 'contest-template01-js', get_template_directory_uri().'/js/contest-01.js',array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
$fields = get_field_objects();

$intro_main_text_color = $fields["intro-main-text-color"]["value"];
$intro_sub_text_color = $fields["intro-sub-text-color"]["value"];
$intro_background_color = $fields["intro-background-color"]["value"];
$intro_background_image = $fields["intro-background-image"]["value"];

$example_title_color = $fields["example-title-color"]["value"];
$example_background_color = $fields["example-background-color"]["value"];

$intro_card_image = $fields["intro-card-logo-image"]["value"];
$intro_card_color = $fields["intro-card-background-color"]["value"];
$intro_card_size = $fields["intro-card-background-size"]["value"];
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
        }
    </style>
    <?php var_dump($intro_card_image['url']);?>
    <main class="app for-design-circus">
        <section class="intro">
            <div class="intro_wrapper">
                <div class="intro_tit">
                    <h1 class="intro_main-tit"><strong><?php wp_title('')?></strong>
                        <br>logo design
                    </h1>
                    <span class="intro_sub-tit">오렌지랩 로고 컨셉 디자인</span>
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
            <!-- <article class="example detail_article">
                <h2 class="article_h2 example_h2" data-scroll-animate="bottom">example</h2>
                <div class="example_img-container">
                    <img class="example_img example_img__width50" src="./img/test_1.jpg" alt="" srcset="">
                    <img class="example_img example_img__width75 example_img__float-right" src="./img/test_2.jpg" alt=""
                        srcset="">
                    <img class="example_img example_img__width50" src="./img/test_2.jpg" alt="" srcset="">
                    <img class="example_img example_img__width50" src="./img/test_2.jpg" alt="" srcset="">
                    <img class="example_img example_img__width100" src="./img/test_2.jpg" alt="" srcset="">
                    <img class="example_img" src="./img/test_3.jpg" alt="" srcset="">
                </div>
            </article> -->
        </section>
    </main>
<?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>