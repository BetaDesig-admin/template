<?php
add_action("wp_enqueue_scripts", function () {
    wp_enqueue_style("Font", 'https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap');
    wp_enqueue_script("jquery", "https://code.jquery.com/jquery-3.5.1.js");
    wp_enqueue_style("SwiperCSS", 'https://unpkg.com/swiper@7/swiper-bundle.min.css');
    wp_enqueue_script("SwiperJS", 'https://unpkg.com/swiper@7/swiper-bundle.min.js');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_script("index", get_template_directory_uri() . "/js/index.js");
});

add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script("jquery", "https://code.jquery.com/jquery-3.5.1.js");
    wp_enqueue_style("Font", 'https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap');
    wp_enqueue_style("SwiperCSS", 'https://unpkg.com/swiper@7/swiper-bundle.min.css');
    wp_enqueue_script("SwiperJS", 'https://unpkg.com/swiper@7/swiper-bundle.min.js');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
}, 99);

//
//add_filter('block_editor_settings', function ($settings) {
//    unset($settings['styles'][0]);
//    return $settings;
//});