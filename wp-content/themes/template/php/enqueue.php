<?php
add_action("wp_enqueue_scripts", function () {
    //wp_enqueue_style("Font", '');
    //wp_enqueue_script("jquery", "https://code.jquery.com/jquery-3.5.1.js");
    wp_enqueue_style("SwiperCSS", 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
    wp_enqueue_script("SwiperJS", 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_script("index", get_template_directory_uri() . "/js/index.js");
});

add_action('enqueue_block_editor_assets', function () {
    //wp_enqueue_style("Font", '');
    wp_enqueue_style("SwiperCSS", 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
    wp_enqueue_script("SwiperJS", 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
}, 99);

require_once(__DIR__ . "/posttypes/posttypes.php");
