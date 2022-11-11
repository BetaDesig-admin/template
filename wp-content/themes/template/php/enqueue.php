<?php
add_action("wp_enqueue_scripts", function () {
    wp_enqueue_style("SwiperCSS", get_template_directory_uri() . '/css/import/swiper-bundle.min.css');
    wp_enqueue_script("SwiperJS", get_template_directory_uri() . '/js/swiper-bundle.min.js');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_script("index", get_template_directory_uri() . "/js/index.js");
});

add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style("SwiperCSS", get_template_directory_uri() . '/css/import/swiper-bundle.min.css');
    wp_enqueue_script("SwiperJS", get_template_directory_uri() . '/js/swiper-bundle.min.js');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
}, 99);

require_once(__DIR__ . "/posttypes/posttypes.php");
