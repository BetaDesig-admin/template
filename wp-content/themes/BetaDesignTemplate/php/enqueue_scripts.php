<?php

// Enqueue styles and scripts
add_action("wp_enqueue_scripts", function () {

    // Default Woocommerce CSS-templates for checkout
    if (class_exists('WooCommerce')) {
        add_filter('woocommerce_enqueue_styles', '__return_empty_array');

        if (is_checkout()) {
            // Make default checkout styles aswell.
        }
    }


    wp_enqueue_style("worksansFont", 'https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap');
    wp_enqueue_script("jquery", "https://code.jquery.com/jquery-3.5.1.js");
    wp_enqueue_style("SwiperCSS", 'https://unpkg.com/swiper@7/swiper-bundle.min.css');
    wp_enqueue_script("SwiperJS", 'https://unpkg.com/swiper@7/swiper-bundle.min.js');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_script("index", get_template_directory_uri() . "/scripts/index.js");

    // Removeing standard jquery
    // wp_deregister_script( 'jquery' );
    wp_deregister_script('wp-embed');
});


// Gutenberg scripts and styles
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script("jquery", "https://code.jquery.com/jquery-3.5.1.js");
    wp_enqueue_style("worksansFont", 'https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap');
    wp_enqueue_style("SwiperCSS", 'https://unpkg.com/swiper@7/swiper-bundle.min.css');
    wp_enqueue_script("SwiperJS", 'https://unpkg.com/swiper@7/swiper-bundle.min.js');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
}, 99);


// Disable gutenberg style on frontend
add_action('wp_print_styles', function () {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    if (class_exists('WooCommerce')) {
        wp_dequeue_style('wc-block-style');
    }
}, 100);


// Disable gutenberg style on backend
add_filter('block_editor_settings', function ($settings) {
    unset($settings['styles'][0]);
    return $settings;
});